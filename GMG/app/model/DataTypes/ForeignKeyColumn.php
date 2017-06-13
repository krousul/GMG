<?php
#==============================================================================
# /lib/class/orm/ForeignKeyColumn.php
#
# Models postgres foreign key columns within restricted ORM.
#
#==============================================================================

include_once URL_DATATYPES.'Column.php';

# =============================================================================
class ForeignKeyColumn extends Column {

  # instance members

    # overridden, this instance of property common to all columns
    protected $sqlType = 'integer';

    # properties special to this column type

    // always points to primary key field
    public $targetTable = null;

  # ---------------------------------------------------------------------------
  # Constructor
  #
    public function __construct($name, $default, $optionList = array()) {

    parent::__construct($name, $default, $optionList);

    if ( !isset($optionList['targetTable']) || $optionList['targetTable'] == '' ) {
      throw new Exception('targetTable not set');
    } else {
      $this->targetTable = $optionList['targetTable'];
    }
    }

  # ---------------------------------------------------------------------------
  # Convert an internal value to storage format.
  #
	public function toStorage($anObject) {
		if ( ( is_null($anObject) ) || ( $anObject == '0') ) return 'NULL';
		if (is_object($anObject)) $return = is_null($anObject->getId()) ? 'NULL' : $anObject->getId();
		if (is_int($anObject)) $return = $anObject;
		
		return $return;
		
    }

  # ---------------------------------------------------------------------------
  # Convert a storage value to internal format.
  #
	public function fromStorage($aForeignKey) {
		return $aForeignKey;
    }
  # ---------------------------------------------------------------------------
  # Convert internal row value to external format
  #
    public function toOutside($aValue) {

    	return $aValue;
    }

  # ---------------------------------------------------------------------------
  # Convert an external value to internal row format
  #
    public function fromOutside($anObject) {

      //if ( ! (is_null($anObject) || is_object($anObject) ) ) {
      //  throw new Exception('Assigning a non-object to a foreign key slot');
      //}

    return $anObject;
    }

  # ---------------------------------------------------------------------------
  # Get the sql to use on table creation
  #
    public function getAddColumnSql() {

      $nullToken = $this->canBeNull ? 'NULL' : 'NOT NULL';
      return $this->name . ' ' . $this->sqlType . ' ' . $nullToken . ' REFERENCES ' . $this->targetTable;
    }

  # ---------------------------------------------------------------------------
  # Do save validations for this column format & value.  Expected to set errors
  # on the RowContainer that called it.
  #
    public function runSaveValidations(SaveDate $aRowContainer, $rowValues) {

		parent::runSaveValidations($aRowContainer, $rowValues);

		//validate referential integrity
		if ( !is_null($rowValues[$this->name]) ) {
			//do a find by id
		}
	}

  # ---------------------------------------------------------------------------
  # Do delete validations for this column format & value.  Expected to set errors
  # on the RowContainer that called it.
  #
    public function runDeleteValidations(SaveDate $aRowContainer, $rowValues) {

      // skip
    }
}
?>