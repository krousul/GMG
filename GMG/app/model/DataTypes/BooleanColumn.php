<?php
#==============================================================================
# /lib/class/orm/BooleanColumn.php
#
# Models postgres boolean columns.
#
#==============================================================================

include_once URL_DATATYPES.'Column.php';

# =============================================================================
class BooleanColumn extends Column {

  # instance members

	# overridden, this instance of property common to all columns
	protected $sqlType = 'boolean';

	# properties special to this column type


  # Uses inherited constructor from column

  # ---------------------------------------------------------------------------
  # Convert an internal value to storage format.
  #
	public function toStorage($aBoolean) {

    return is_null($aBoolean) ? 'NULL' : ($aBoolean ? 'TRUE' : 'FALSE');
	}

  # ---------------------------------------------------------------------------
  # Convert a storage value to internal format.
  #
	public function fromStorage($aValue) {

    return $aValue == 't' ? true : false;
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

    return (boolean) $aValue;
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