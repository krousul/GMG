<?php
#==============================================================================
# /lib/class/orm/IntegerColumn.php
#
# Models postgres integer columns.
#
#==============================================================================

include_once URL_DATATYPES.'Column.php';

# =============================================================================
class IntegerColumn extends Column {

  # instance members

	# overridden, this instance of property common to all columns
	protected $sqlType = 'integer';

	# properties special to this column type

  # uses constructor inherited from column

  # ---------------------------------------------------------------------------
  # Convert an internal value to storage format.
  #
	public function toStorage($anInteger) {
	
    return is_null($anInteger) ? 'NULL' : (integer) $anInteger;
	}

  # ---------------------------------------------------------------------------
  # Convert a storage value to internal format.
  #
	public function fromStorage($aValue) {

    return is_null($aValue) ? null : (integer) $aValue;
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

    if ( !is_int($rowValues[$this->name]) ) {
      if ( !ctype_digit($rowValues[$this->name]) ) {
        $aRowContainer->addError('not an integer', $this->name);
      }
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