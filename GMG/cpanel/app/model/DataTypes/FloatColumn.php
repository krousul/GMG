<?php
#==============================================================================
# /lib/class/orm/FloatColumn.php
#
# Models postgres float columns.
#
#==============================================================================

include_once URL_DATATYPES.'Column.php';

# =============================================================================
class FloatColumn extends Column {

  # instance members

	# overridden, this instance of property common to all columns
	protected $sqlType = 'float';

	# properties special to this column type

  # uses constructor inherited from column

  # ---------------------------------------------------------------------------
  # Convert an internal value to storage format.
  #
	public function toStorage($aFloat) {

    return is_null($aFloat) ? 'NULL' : (float) $aFloat;
	}

  # ---------------------------------------------------------------------------
  # Convert a storage value to internal format.
  #
	public function fromStorage($aValue) {

    return (float) $aValue;
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
	public function fromOutside($aValue) {

    return $aValue;
	}

  # ---------------------------------------------------------------------------
  # Get the sql to use on table creation
  #
	public function getAddColumnSql() {

	  $nullToken = $this->canBeNull ? 'NULL' : 'NOT NULL';
	  return $this->name . ' ' . $this->sqlType . ' ' . $nullToken;
	}

  # ---------------------------------------------------------------------------
  # Do save validations for this column format & value.  Expected to set errors
  # on the RowContainer that called it.
  #
	public function runSaveValidations(SaveDate $aRowContainer, $rowValues) {

	  parent::runSaveValidations($aRowContainer, $rowValues);

    // verify format
    if ( is_null($rowValues[$this->name]) ) return;

    if ( !is_numeric($rowValues[$this->name]) ) {
      $aRowContainer->addError('not a float', $this->name);
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