<?php
#==============================================================================
# /lib/class/orm/StringColumn.php
#
# Models postgres varchar columns.
#
#==============================================================================

include_once URL_DATATYPES.'Column.php';

# =============================================================================
class StringColumn extends Column {

  # instance members

	# overridden, this instance of property common to all columns
	protected $sqlType = 'varchar';

	# properties special to this column type

	// size of 0 means unlimited length string
	protected $size = 0;
	protected $canBeEmpty = true;

  # ---------------------------------------------------------------------------
  # Constructor
  #
	public function __construct($name, $default, $optionList = array()) {

    parent::__construct($name, $default, $optionList);

    if ( isset($optionList['size']) && is_int($optionList['size']) ) {
      $this->size = $optionList['size'];
    }

    if ( isset($optionList['notEmpty']) ) $this->canBeEmpty = false;
	}

  # ---------------------------------------------------------------------------
  # Convert an internal value to storage format.
  #
	public function toStorage($aString) {
		return is_null($aString) ? 'NULL' : '\'' . $aString . '\'';
	}

  # ---------------------------------------------------------------------------
  # Convert a storage value to internal format.
  #
	public function fromStorage($aValue) {
		return $aValue;
	}

  # ---------------------------------------------------------------------------
  # Convert internal row value to external format
  #
	public function toOutside($aValue) {
		return stripcslashes($aValue);
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

	  $sizeToken = $this->size ? "($this->size)" : '';
	  $nullToken = $this->canBeNull ? 'NULL' : 'NOT NULL';
	  return $this->name . ' ' . $this->sqlType . $sizeToken . ' ' . $nullToken;
	}

  # ---------------------------------------------------------------------------
  # Do save validations for this column format & value.  Expected to set errors
  # on the RowContainer that called it.
  #
	public function runSaveValidations(SaveDate $aRowContainer, $rowValues) {

	  parent::runSaveValidations($aRowContainer, $rowValues);

	  // validate size
	  if ( $this->size > 0 && $this->size < strlen($rowValues[$this->name]) ) {
	    $aRowContainer->addError('length exceeded', $this->name);
	  }

	  // validate not empty
	  if ( !$this->canBeEmpty && trim($rowValues[$this->name]) == '' ) {
	    $aRowContainer->addError('cannot be blank', $this->name);
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