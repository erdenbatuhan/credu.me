<?php

class InputChecker {

    public function __construct() {

    }

    public function isLengthAcceptable($input, $lowerBound, $upperBound) {
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
        if(is_numeric($phoneNo) || preg_match('/\s/', $phoneNo))
            return true;
        
        return false;
    }

    /** ================ Protection against SQL injection ================ */
    public function getProtectedInput($input, $formUse = true) {
        $input = preg_replace("/(from|select|insert|delete|where|drop table|show tables|,|'|#|\*|--|\\\\)/i", "", $input);
        $input = trim($input);
        $input = strip_tags($input);

        if (!$formUse || !get_magic_quotes_gpc())
            $input = addslashes($input);

        return $input;
    }
}

?>
