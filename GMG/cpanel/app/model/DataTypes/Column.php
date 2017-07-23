<?php
#==============================================================================
# /lib/class/orm/Column.php
#
# Describes behaviour of each column type available in a table
#
# Deals with validation, formatting and searching.
#
#==============================================================================

include_once URL_MODEL.'SaveDate.php';

# =============================================================================
abstract class Column {

  # instance members

	protected $name = '';
  protected $default = null;

	protected $label = '';
	protected $note = '';

	protected $canBeNull = false;
	protected $canBeUpdated = true;

	# to be overridden by extending classes
	protected $sqlType = '';


  # ---------------------------------------------------------------------------
  # Constructor
  #
	public function __construct($name, $default, $optionList = array()) {

		$this->name = $name;
		$this->default = $default;
		
		if ( isset($optionList['label']) && is_string($optionList['label']) ) {
		  $this->label = $optionList['label'];
		} else {
		  $this->label = ucwords(str_replace('_', ' ', strtolower($name)));
		}
		
		if ( isset($optionList['note']) ) $this->note = $optionList['note'];
		if ( isset($optionList['allowNull']) ) $this->canBeNull = true;
		if ( isset($optionList['writeOnce']) ) $this->canBeUpdated = false;
	}

  # ---------------------------------------------------------------------------
  # Get the column name
  #
	final public function getName() {

    return $this->name;
	}

  # ---------------------------------------------------------------------------
  # Get the column label
  #
	final public function getLabel() {

    return $this->label;
	}

  # ---------------------------------------------------------------------------
  # Get the column note
  #
	final public function getNote() {

    return $this->note;
	}

  # ---------------------------------------------------------------------------
  # Get the column default
  #
	final public function getDefault() {

    return $this->default;
	}

  # ---------------------------------------------------------------------------
  # Get update permission status
  #
	final public function getCanBeUpdated() {

    return $this->canBeUpdated;
	}

  # ---------------------------------------------------------------------------
  # Get null status
  #
	final public function getCanBeNull() {

    return $this->canBeNull;
	}

  # ---------------------------------------------------------------------------
  # Convert an internal value to storage format.
  #
	public function toStorage($aValue) {

    return is_null($aValue) ? 'NULL' : $aValue;
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
	abstract public function getAddColumnSql();

  # ---------------------------------------------------------------------------
  # Do save validations for this column format & value.  Expected to set errors
  # on the RowContainer that called it.
  #
	public function runSaveValidations(SaveDate $aRowContainer, $rowValues) {

	  // validate nullity
	  if ( !$this->canBeNull  && is_null($rowValues[$this->name]) ) {
	    $aRowContainer->addError('not null', $this->name);
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