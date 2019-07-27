<?php

class Validator {
    public $error = [];

    function __construct()
    {
        
    }

    public function minlength($data, $key, $arg) {
        if(strlen($data) < $arg) array_push($this->error,"[$key] Podana wartość jest za krótka (min. $arg znaki)<br>");
    }

    public function maxlength($data, $key, $arg) {
        if(strlen($data) > $arg) array_push($this->error,"[$key] Podana wartość jest za długa (max. $arg znaki)<br>");
    }

    public function compare($data,$key,$arg=null) {
        if(strcmp($data,$arg)!=0) array_push($this->error,"[$key] Podane wartości różnią się od siebie<br>");
    }

    public function matches($data,$key,$preg_match) {
        if(preg_match($preg_match,$data)!=1) array_push($this->error,"[$key] Nieprawidłowa składnia<br>");
    }


    public function submitValidation() {
        if(empty($this->error)) return true;
        else return $this->error;
    }
}