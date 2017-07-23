<?php
#==============================================================================
# /lib/class/orm/TimeStampColumn.php
#
# Models postgres timestamptz columns.
#
#==============================================================================

include_once URL_DATATYPES.'Column.php';

# =============================================================================
class DateColumn extends Column {

  # instance members

	# overridden, this instance of property common to all columns
	protected $sqlType = 'date';

	# properties special to this column type
	protected $dateOnly = false;

  # ---------------------------------------------------------------------------
  # Constructor
  #
	public function __construct($name, $default, $optionList = array()) {

    parent::__construct($name, $default, $optionList);

    if ( isset($optionList['dateOnly']) ) {
      $this->dateOnly = true;
    }
	}

  # ---------------------------------------------------------------------------
  # Convert an internal value to storage format.
  #
	public function toStorage($aString) {

    return is_null($aString) ? 'NULL' : (('now' == $aString) ? '\'CURRENT_TIMESTAMP\'' : '\'' . pg_escape_string($aString) . '\'');
	}

  # ---------------------------------------------------------------------------
  # Convert a storage value to internal format.
  #
	public function fromStorage($aValue) {

	  if ( $aValue == '' ) return null;

    return (string) $aValue;
	}

  # ---------------------------------------------------------------------------
  # Convert internal row value to external format
  #
	public function toOutside($aTimeStamp) {

	 	if ( is_null($aTimeStamp) ) return null;

    $dateOnly = substr($aTimeStamp, 0, 10);
	 	$dateParts = explode('-', $dateOnly);
	 	$returnTimeStamp = $dateParts[2] . '-' . $dateParts[1] . '-' . $dateParts[0];

	 	if ( ! $this->dateOnly ) {
	 	  $returnTimeStamp = $returnTimeStamp . substr($aTimeStamp, 10);
	 	}

    return $returnTimeStamp;
	}

  # ---------------------------------------------------------------------------
  # Convert an external value to internal row format
  #
	public function fromOutside($aValue) {

	  if ( $aValue == '' ) return null;

   	$dateOnly = substr($aValue, 0, 10);
	 	$dateParts = explode('-', $dateOnly);
	 	$returnValue = $dateParts[2] . '-' . $dateParts[1] . '-' . $dateParts[0];

	 	if ( ! $this->dateOnly ) {
	 	  $returnValue = $returnValue . substr($aValue, 10);
	 	}

    return $returnValue;
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

	  $patternString = '/^([123456789][[:digit:]]{3})-(0[1-9]|1[012])-(0[1-9]|[12][[:digit:]]|3[01])( (0[0-9]|1[0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])(.[[:digit:]]{1,6})?([+-][[:digit:]]{2})?)?$/';
	  if ( ! preg_match($patternString, $rowValues[$this->name], $subDate) || ! checkdate($subDate[2], $subDate[3], $subDate[1]) ) {
	    $aRowContainer->addError('not a valid timestamp', $this->name);
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