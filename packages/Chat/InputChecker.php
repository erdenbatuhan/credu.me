<?php

class InputChecker {

    public function __construct() {

    }

    public function checkLength($input, $lowerBound, $upperBound) {
        if (strlen($input) >= $lowerBound && strlen($input) <= $upperBound) 
            return true;
        
        return false;
    }


    public function isEmail($email){
        if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) 
            return true;
        
        return false;
    }


    public function isPhoneNo($phoneNo){
        if(is_numeric($phoneNo) || preg_match('/\s/',$phoneNo))
            return true;
        
        return false;
    }
}

?>
