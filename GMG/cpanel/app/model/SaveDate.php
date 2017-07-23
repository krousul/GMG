<?php
abstract class SaveDate {

  # class constants
  const dbConfigFile = 'local/settings.php';
  private $idColumnName = '' ;

  # class members
  static protected $db = null;
  static private $tableCache = array();

  # instance members
  private $tableName = null;
  private $columns = array();

  // To be overridden in extending classes
  protected $hasMany = array();
  protected $hasOne = array();
  protected $pointsTo = array();
  protected $observers = array();
  protected $validations = array();

  # mutable state
  private $objectId = null;

  private $isNew = true;
  private $isGhost = false;

  private $rowData = array();

  private $errors = array();

  # public methods

//   public function setIdColumName ($value){
//   	return $this->idColumnName = $value;
//   }
  
  # ---------------------------------------------------------------------------
  # Returns a new row if invalid or no id given, else the row with that id.
  # It always returns a valid RowContainer object.
  #
  public function __construct($id = null) {

     // initialize database connection
    if ( self::$db == null ) {
		self::$db = new Conexion();
    }

    // generar id de la tabla
    $this->idColumnName = 'id_'.get_class($this);
    // set table name (convert CamelCase to camel_case with underscores)
    $this->tableName = strtolower(get_class($this));
   
    // initialize and cache if not already done
    if ( !isset(self::$tableCache[$this->tableName]) ) {
      $this->initializeTableThenCache();
    }
   
    // set column objects from the cache
    $this->columns = self::$tableCache[$this->tableName]['columns'];

    // clear column constructors
    foreach ( array_keys($this->columns) as $aColumnName ) {
      unset($this->$aColumnName);
    }

    // load defaults, & if an id was given, try to overwrite with that object
    $this->loadWithDefaults();
    if ( $id ){
    	$this->loadWithId($id);
    }
  }

  # ---------------------------------------------------------------------------
  # Saves this row to database.  Gives true if save happened, otherwise false.
  #
  final public function save() {
    if ( $this->isGhost ) return false;
	
    if ( !$this->isSaveValid()) return false;
    // Checks have passed, this is a valid save.
    $this->signalEvent('beforeSave');
    if ( $this->isNew ) {      	   	
      $this->signalEvent('beforeInsert');     
      $successOnSave = $this->insert();
      $this->signalEvent('afterInsert');
    } else {
      $this->signalEvent('beforeUpdate');
      $successOnSave = $this->update();
      $this->signalEvent('afterUpdate');      
    }

    $this->signalEvent('afterSave');

    return $successOnSave;
  }

  # ---------------------------------------------------------------------------
  # Deletes this row from database.  True if delete happened, otherwise false.
  #
  final public function delete() {

    if ( $this->isGhost ) return false;
    if ( $this->isNew ) return false;

    if ( !$this->isDeleteValid() ) return false;

    // Checks have passed, this is a valid delete.
    $this->signalEvent('beforeDelete');

    $dQuery = sprintf('DELETE FROM %s WHERE %s = %d;'
                     , $this->tableName
                     , $this->idColumnName
                     , $this->objectId);    
    
    $dResult = self::$db->exec($dQuery);
    self::$db = null;

    $this->signalEvent('afterDelete'); 

    return true;
  }
  # ---------------------------------------------------------------------------
  # Creates a new copy of the selected record
  #
  final public function copyRow(){
	$this->isNew = true;
	$this->save();
  } 
  #-------------------------------------------------------------------------
  # Returns whether the object is new (requires insert or update)
  #
  final public function getIsNew() {

    return $this->isNew;
  }

  # ---------------------------------------------------------------------------
  # Returns the current row's id, or if unsaved then returns null
  #
  final public function getId() {
		return $this->isNew ? null : $this->objectId;
  }

  # ---------------------------------------------------------------------------
  # Adds errors to the current RowContainer
  #
    final public function addError($message, $columnName = false) {

	    $key = $columnName ? $columnName : 0;
	
	    $this->errors[$key][] = $message;
  	}

  # ---------------------------------------------------------------------------
  # Reports whether the row has errors
  #
    final public function hasErrors() {

   		return !empty($this->errors);
  	}

  # ---------------------------------------------------------------------------
  # Returns the errors array
  #
    final public function getErrors() {

    	return $this->errors;
 	 }
  # ---------------------------------------------------------------------------
  # Returns columns as an array
  #
    final public function getColumns() {
		foreach($this->columns as $key => $value)
			$columnArray[] = $key; 
    	return $columnArray;
  	}

  # ---------------------------------------------------------------------------
  # Passes data to a column for formatting before release
  #
    final public function __get($columnName) {

	    if ( array_key_exists($columnName, $this->columns) ) {
	      return $this->columns[$columnName]->toOutside($this->rowData[$columnName]);
	    } else if ( array_key_exists($columnName, $this->hasMany) ) {
	      $childTable = $this->hasMany[$columnName][0];
	      $childForeignKey = $this->hasMany[$columnName][1];
	      return $this->getHasManyFrom($childTable, $childForeignKey);
	    } else if ( array_key_exists($columnName, $this->hasOne) ) {
	      $childTable = $this->hasOne[$columnName][0];
	      $childForeignKey = $this->hasOne[$columnName][1];
	      return $this->getHasOneFrom($childTable, $childForeignKey);
	    } else if ( array_key_exists($columnName, $this->pointsTo) ) {
	      $childTable = $this->pointsTo[$columnName][0];
	      $childCondition = $this->pointsTo[$columnName][1];
	      return $this->getPointsToFrom($childTable, $columnName, $childCondition);
	
	    } else {
	      throw new Exception('Fetch from unknown column');
	    }
 	}

  # ---------------------------------------------------------------------------
  # For complicated call protocols with arguments
  #
    final public function __call($columnName, $arguments) {
		
	    if ( array_key_exists($columnName, $this->columns) ) {
	      return $this->columns[$columnName]->toOutside($this->rowData[$columnName]);
	    } else if ( array_key_exists($columnName, $this->hasMany) ) {
	      // arg 0 :: sort field
	      $childTable = $this->hasMany[$columnName][0];
	      $childForeignKey = $this->hasMany[$columnName][1];
	      return $this->getHasManyFrom($childTable, $childForeignKey, $arguments[0]);
	    } else if ( array_key_exists($columnName, $this->hasOne) ) {
	      $childTable = $this->hasOne[$columnName][0];
	      $childForeignKey = $this->hasOne[$columnName][1];
	      return $this->getHasOneFrom($childTable, $childForeignKey);
	    } else if ( array_key_exists($columnName, $this->pointsTo) ) {
	      $childTable = $this->pointsTo[$columnName][0];
	      $childCondition = $this->pointsTo[$columnName][1];
	      return $this->getPointsToFrom($childTable, $columnName, $childCondition);
	
	    } else {
	      throw new Exception('Call to unknown column');
	    }
  	}

  # ---------------------------------------------------------------------------
  # Passes received data through column for formatting
  #
    final public function __set($columnName, $aValue) {
	    if ( array_key_exists($columnName, $this->columns) ) {
	    	$this->rowData[$columnName] = $this->columns[$columnName]->fromOutside($aValue);
	    } else {
	    	throw new Exception('Write to unknown column');
	    }
  	}

  # ---------------------------------------------------------------------------
  # Sets all columns from an array with matching keys
  #
    public function setFromArray(array $theArray) {
		foreach ( $theArray as $arrayKey => $aValue ) {
	      if ( array_key_exists($arrayKey, $this->columns) ) {
			if(get_class( $this->columns[$arrayKey]) != 'ForeignKeyColumn')
				$this->$arrayKey = $aValue;
	      	}
	    }
  	}
  
  /**
   * Converts to array.
   *
   * Builds array containing all public properties and their values.�
   *
   * @return array Array holding public properties.
   */
    public function convertToArray()
    {
        $arrayForm = array();
        foreach ( array_keys($this->columns) as $aProperty ) {
            if ( is_object($this->$aProperty) ) {
                $arrayForm[$aProperty] = $this->$aProperty->getId();
            } else {
                $arrayForm[$aProperty] = $this->$aProperty;
            }
        }
        return $arrayForm;
    }

# ---------------------------------------------------------------------------
#  
# internal methods
#  
# ---------------------------------------------------------------------------

  # ---------------------------------------------------------------------------
  # Builds columns, checks class against database and caches schema.
  #
    final protected function initializeTableThenCache() {

	    // build columns from public field definitions
	    $reflector = new ReflectionClass(get_class($this));
	    $members = $reflector->getProperties();
	
 	    
	    $publicSelfMembers = array();
	    foreach ( $members as $aMember ) {
	      if ( $aMember->isPublic() && ! $aMember->isStatic() ) {
	        $publicSelfMembers[$aMember->getName()] = $aMember->getValue($this);
	      }
   		}
   		
    $columns = array();
    foreach ( $publicSelfMembers as $name => $constructor) {
      if ( $name != $this->idColumnName ) {
      	if ( is_array($constructor) ) {
      		$columnClass = ucfirst($constructor[0]) . 'Column';
      		
      		include_once URL_MODEL."DataTypes/{$columnClass}.php";
      		$columnDefault = $constructor[1];
      		$optionList = $constructor[2];
      		$newColumn = new $columnClass($name, $columnDefault, $optionList);
      	} else if ( is_string($constructor) ) {
      		include_once URL_MODEL.'DataTypes/StringColumn.php';
      		$newColumn = new StringColumn($name, $constructor);
      	} else if ( is_bool($constructor) ) {
      		include_once URL_MODEL.'lib/class/orm/BooleanColumn.php';
      		$newColumn = new BooleanColumn($name, $constructor);
      	} else if ( is_float($constructor) ) {
      		include_once URL_MODEL.'lib/class/orm/FloatColumn.php';
      		$newColumn = new FloatColumn($name, $constructor);
      	} else if ( is_int($constructor) ) {
      		include_once URL_MODEL.'lib/class/orm/IntegerColumn.php';
      		$newColumn = new IntegerColumn($name, $constructor);
      	} else {
      		throw new Exception('Error during column initialization');
      	}
        $columns[$name] = $newColumn;
      }
    }
    	//  cache the columns
    	self::$tableCache[$this->tableName]['columns'] = $columns;
    }

  # ---------------------------------------------------------------------------
  # Fills object row data with default values for each column
  #
    final protected function loadWithDefaults() {

      foreach ( $this->columns as $columnName => $aColumn ) {
        $this->rowData[$columnName] = $aColumn->getDefault();
      }
    }

  # ---------------------------------------------------------------------------
  # Fills object with data pulled for a given id
  #
    final protected function loadWithId($id) {
	    $sQuery = sprintf('SELECT %s FROM %s WHERE %s = %d;'
	                    , implode(', ', array_keys($this->columns))
	                    , $this->tableName
	                    , $this->idColumnName
	                    , $id);
	    $sResult = self::$db->prepare("$sQuery");
	    $sResult->execute();
	    
	    $rowCount = $sResult->rowCount();
	    if ( $rowCount == 1 ) {

			$resultHandle = $sResult->fetch(PDO::FETCH_ASSOC);
			$this->assignFromStorage($resultHandle, $id);
	      	$this->objectId = $id;
	      	$this->isNew = false;
	    }
	    $sResult = null;
    }

  # ---------------------------------------------------------------------------
  # Returns array of objects matching given conditions
  #
  final protected function getObjects($whereClause = null, $joinClause = null, $orderClause = null, $limitClause = null) {

    $sQuery = sprintf('SELECT %s FROM %s '
                     , implode(', ', array_merge(array_keys($this->columns), array($this->idColumnName."_".$this->tableName)))
                     , $this->tableName);
    if( !is_null($joinClause) ) $sQuery .= " $joinClause ";
    if( !is_null($whereClause) ) $sQuery .= " WHERE $whereClause ";
    if( !is_null($orderClause) ) $sQuery .= " ORDER BY $orderClause ";
    if( !is_null($limitClause) ) $sQuery .= " LIMIT $limitClause ";
    $sQuery .= ';';

    $sResult = self::$db->exec($sQuery);

    $recoveredObjects = array();

    $className = get_class($this);
    while( $sResult->rowCount() ) {

      $anObject = new $className();
      $anObject->assignFromStorage($sResult);

      $recoveredObjects[$anObject->getId()] = $anObject;
    }
    $sResult->close();

    return $recoveredObjects;
  }

  # ---------------------------------------------------------------------------
  # Return array of child objects from a given table
  #
  final protected function getHasManyFrom($childTable, $foreignKey, $orderFieldName = null) {

    $whereClause = $foreignKey . '=' . (is_null($this->objectId) ? 0 : $this->objectId);

    //$childTable = str_replace(' ', '', ucwords(str_replace('_', ' ', $childTable)));
    $childTable = str_replace(' ', '', ucwords($childTable));

    $childToGetChildren = new $childTable();

    $arrayOfChildren = $childToGetChildren->getObjects($whereClause, null, $orderFieldName);

    return $arrayOfChildren;
  }

  # ---------------------------------------------------------------------------
  # Return single child object from the given table
  #
  final protected function getHasOneFrom($childTable, $foreignKey) {

    $whereClause = $foreignKey . '=' . (is_null($this->objectId) ? 0 : $this->objectId);
    $limitClause = '1';

    $childToGetChildren = new $childTable();

    $oneChildInArray = $childToGetChildren->getObjects($whereClause, null, null, $limitClause);

    return array_pop($oneChildInArray);
  }

  # ---------------------------------------------------------------------------
  # Return single object from a pointed to table
  #
  final protected function getPointsToFrom($childTable, $pointerColumn, $condition) {

    $whereClause = $this->idColumnName . '=' . $this->rowData[$pointerColumn];
    $whereClause .= ' AND ' . $condition;
    $limitClause = '1';

    $childToGetChildren = new $childTable();

    $oneChildInArray = $childToGetChildren->getObjects($whereClause, null, null, $limitClause);

    return array_pop($oneChildInArray);
  }

  # ---------------------------------------------------------------------------
  # Dado un query del resultado, asigna los resultados a un objeto.
  #
    final public function assignFromStorage($resultHandle, $id) {
    	
	    foreach( $this->columns as $aColumnName => $aColumn ) {
	      $this->rowData[$aColumnName] = $aColumn->fromStorage($resultHandle[$aColumnName]);
	    }
	    $this->objectId = $id;
	    $this->isNew = false;
    }

  # ---------------------------------------------------------------------------
  # Inserta nuevo registro en la base de datos, returns true/false on success/failure
  #
    final protected function insert() {

      $insertData = array();
      foreach ( $this->columns as $columnName => $aColumn ) {
        $insertData[$columnName] = $aColumn->toStorage($this->rowData[$columnName]);
      }
      
      
      $iQuery = sprintf('INSERT INTO %s (%s) VALUES (%s);'
                       , $this->tableName
                       , implode(', ', array_keys($insertData))
                       , implode(', ', array_values($insertData)));

      $iResult = self::$db->exec("$iQuery");
		
      self::$db = null;
      
      $this->isNew = false;
      return true;
    }
  # ---------------------------------------------------------------------------
  # Updates a record, returns true/false on success/failure
  #
    final protected function update() {
      $updateClause = array();
      foreach ( $this->columns as $columnName => $aColumn ) {
        if ( $aColumn->getCanBeUpdated() ) {
          $updateClause[] = $columnName . ' = ' . $aColumn->toStorage($this->rowData[$columnName]);
        }
      }
      if ( empty($updateClause) ) return true;
      
      $uQuery = sprintf('UPDATE %s SET %s WHERE %s = %d;'
                       , $this->tableName
                       , implode(', ', $updateClause)
                       , $this->idColumnName
                       , $this->objectId);
                
      $uResult = self::$db->exec("$uQuery");

      self::$db = null;
		
      return true;
    }

  # ---------------------------------------------------------------------------
  # Runs save validation sequence (could be insert or update).
  #
    final protected function isSaveValid() {

        $this->clearErrors();
        
        $this->signalEvent('beforeSaveValidation');

        if ( $this->isNew ) {        	
            $this->signalEvent('beforeInsertValidation');
        } else {
        		$this->signalEvent('beforeUpdateValidation');
        }

        $this->runSaveValidations();

        // validateSave may be overridden with custom validations
        $this->validateSave();

        if ( $this->isNew ) {        	
            $this->signalEvent('afterInsertValidation');
        } else {
            $this->signalEvent('afterUpdateValidation');
        }
				
        $this->signalEvent('afterSaveValidation');
        
        return !$this->hasErrors();
        
    }

  # ---------------------------------------------------------------------------
  # Runs delete validation sequence.
  #
    final protected function isDeleteValid() {

        $this->clearErrors();

        $this->signalEvent('beforeDeleteValidation');

        $this->runDeleteValidations();

        // validateSave may be overridden with custom validations
        $this->validateDelete();

        $this->signalEvent('afterDeleteValidation');

        return !$this->hasErrors();
    }

  # ---------------------------------------------------------------------------
  # Calls validation for each column, and runs everything in $validations
  #
    final protected function runSaveValidations() {

      // run validations per column
      foreach ( $this->columns as $aColumn ) {
          $aColumn->runSaveValidations($this, $this->rowData);
        }

        // run validations at the table level
        foreach ( $this->validations as $aValidation ) {
          throw new Exception('whoa');
        }
    }

  # ---------------------------------------------------------------------------
  # Calls validation for each column, and runs everything in $validations
  #
    final protected function runDeleteValidations() {

      // run validations per column
      foreach ( $this->columns as $aColumn ) {
          $aColumn->runDeleteValidations($this, $this->rowData);
        }

        // run validations at the table level
        foreach ( $this->validations as $aValidation ) {
          throw new Exception('whoa');
        }
    }

  # ---------------------------------------------------------------------------
  # Call an event hook method on itself, then columns, then observers.
  # Columns and observers must implement hooks that take a RowContainer.
  #
    final protected function signalEvent($event) {
		
      // call hooks on the current RowContainer itself
        if ( method_exists($this, $event) ) $this->{$event}();

        // call hooks on each of its columns
        foreach ( $this->columns as $aColumn ) {
          if ( method_exists($aColumn, $event) ) {
                $aColumn->{$event}($this);
            }
        }

        // call hooks on each observer registered with this RowContainer.
        foreach ( $this->observers as $anObserver ) {
          if ( method_exists($anObserver, $event) ) {
                $anObserver->{$event}($this);
            }
        }
    }
  #----------------------------------------------------------------------------

  #----------------------------------------------------------------------------
  # ---------------------------------------------------------------------------
  # Remove all errors
  #
    final protected function clearErrors() {

    $this->errors = array();
  }

  # ---------------------------------------------------------------------------
  # Validation event hooks which can be overridden by extending classes.
  #
  protected function beforeSaveValidation() {}
  protected function beforeInsertValidation() {}
  protected function beforeUpdateValidation() {}
  protected function afterInsertValidation() {}
  protected function afterUpdateValidation() {}
  protected function afterSaveValidation() {}
  protected function beforeDeleteValidation() {}
  protected function afterDeleteValidation() {}

  # ---------------------------------------------------------------------------
  # Validation methods which may be overridden.  Not expected to return a value.
  # Must do its work by setting errors.
  #
  protected function validateSave() {}
  protected function validateDelete() {}

  # ---------------------------------------------------------------------------
  # Lifecycle event hooks which can be overridden by extending classes.
  #
  protected function beforeSave() {}
  protected function beforeInsert() {}
  protected function beforeUpdate() {}
  protected function afterInsert() {}
  protected function afterUpdate() {}
  protected function afterSave() {}
  protected function beforeDelete() {}
  protected function afterDelete() {}
}
?>