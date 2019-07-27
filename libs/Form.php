<?php
require('Form/Validator.php');
class Form {
    /** @var array $_postData - Zbiera wszystkie pola formularza */
    private $_postData = [];

    /** @var array $_currentItem - Ostatnio dodany element formularza */
    private $_currentItem = null;

    private $_val = [];

    public function __construct()
    {
        $this->_val = new Validator();
    }

    public function post($field){
        $this->_postData[$field] = $_POST[$field];
        $this->_currentItem = $field;
        return $this;
    }

    public function fetch($fieldName = false) {
        if($fieldName==true) {
            return isset($this->_postData[$fieldName]) ? $this->_postData[$fieldName] : false;
        } else {
            return isset($this->_postData) ? $this->_postData : false;
        }
    }

    /**
     * val - Function to validate the Form
     */
    public function val($typeOfValidator,$arg=null){
        if($arg==null) {
            $this->_val->{$typeOfValidator}($this->_postData[$this->_currentItem],$this->_currentItem);
        } else {
            $this->_val->{$typeOfValidator}($this->_postData[$this->_currentItem],$this->_currentItem,$arg);
        }
        return $this;
    }

    public function getLastPost() {
        return $this->_postData[$this->_currentItem];
    }

    public function submit() {
        return $this->_val->submitValidation();
    }
}