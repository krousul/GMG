<?php
#==============================================================================
# /lib/class/orm/TimeStampColumn.php
#
# Models postgres timestamptz columns.
#
#==============================================================================

include_once URL_DATATYPES.'Column.php';

# =============================================================================
class TimeStampColumn extends Column {

  # instance members

	# overridden, this instance of property common to all columns
	protected $sqlType = 'timestamptz';

  # ---------------------------------------------------------------------------
  # Constructor
  #
	public function __construct($name, $default, $optionList = array()) {

    	parent::__construct($name, $default, $optionList);

	}

  # ---------------------------------------------------------------------------
  # Convert an internal value to storage format.
  #
	public function toStorage($aString) {

    	return is_null($aString) ? 'NULL' : $aString;
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
		if ( ( is_null($aTimeStamp) ) || ( $aTimeStamp == 0) )return 0;
	 	if (!is_numeric($aTimeStamp))
			$timestamp = 0;
		$format['day'] 		= date("d", $aTimeStamp);
		$format['month'] 	= date("m", $aTimeStamp);
		$format['year'] 	= date("Y", $aTimeStamp);
		$format['hour'] 	= date("G", $aTimeStamp);
		$format['minutes'] 	= date("i", $aTimeStamp);
		$format['seconds'] 	= date("s", $aTimeStamp);
		$format['stamp']	= $aTimeStamp;
		return $format;
	}

  # ---------------------------------------------------------------------------
  # Convert an external value to internal row format
  #
	public function fromOutside($aValue) {
		if ( is_int($aValue) ) return $aValue;
		if ( ( $aValue == '' ) || ( $aValue == 0 ) || ( is_array($aValue) ) ) return 0;
			$hours = $minutes = $seconds = '0';
			list($day, $month, $year, $hours, $minutes, $seconds) = preg_split("[-|\s|\.|:]", $aValue);
			$returnValue = mktime($hours, $minutes, $seconds, $month  ,$day , $year);
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

	  //$patternString = '/^([123456789][[:digit:]]{3})-(0[1-9]|1[012])-(0[1-9]|[12][[:digit:]]|3[01])( (0[0-9]|1[0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])(.[[:digit:]]{1,6})?([+-][[:digit:]]{2})?)?$/';
	  //if ( ! preg_match($patternString, $rowValues[$this->name], $subDate) || ! checkdate($subDate[2], $subDate[3], $subDate[1]) ) {
	  //  $aRowContainer->addError('not a valid timestamp', $this->name);
	  //}
	  	if ( !is_numeric($rowValues[$this->name]) )
			$aRowContainer->addError('not a valid timestamp', $this->name);
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