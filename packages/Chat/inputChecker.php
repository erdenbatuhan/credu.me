<?php


class inputChecker
{


    public function __construct() {

    }


    public function checkLenght($string, $a, $b) {

        if (strlen($string) >= $a && strlen($string) <=  b ) return true;
        else return false;
    }


    public function checkEmail($email){

        if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) return true;
        else return false;
    }


    public function checkPhoneNumber($phoneNumber){

        if(is_numeric($phoneNumber) || preg_match('/\s/',$phoneNumber)) return true;
        else return false;
    }


}