<?php

class Login {
    /** @var DatabaseConnection */
    private $databaseConnection = null;
    /** @var InputChecker */
    private $inputChecker = null;
    /** @var null */
    private $latestError = null;

    public function __construct($databaseConnection, $inputChecker) {
        $this->databaseConnection = $databaseConnection;
        $this->inputChecker = $inputChecker;
    }

    public function login($email, $password) {
        $this->databaseConnection->initiateConnection();
        $connection = $this->databaseConnection->getConnection();

        $email = $this->inputChecker->getProtectedInput($email);
        $password = $this->inputChecker->getProtectedInput($password);

        $sql_query   = "SELECT * FROM USERS WHERE EMAIL = '" . $email . "'";
        $sql_result  = mysqli_query($connection, $sql_query);
        $num_of_rows = mysqli_num_rows($sql_result);

        $this->checkLogin($email, $password, $num_of_rows, $sql_result);
        $this->databaseConnection->killConnection();
    }

    private function checkLogin($email, $password, $num_of_rows, $sql_result) {
        if (!$email || !$password) {
            $this->latestError = "Email or password cannot be empty..";
        } else {
            if ($num_of_rows) {
                $row = mysqli_fetch_assoc($sql_result);

                if (!strcmp($password, $row["PASSWORD"])) {
                    $this->processLogin($row);
                } else {
                    $this->latestError = "Password that you typed is wrong..";
                }
            } else {
                $this->latestError = "Email that you typed is wrong..";
            }
        }
    }

    public function getLatestError() {
        return $this->latestError;
    }

    private function processLogin($row) {
        echo "Login succeeded!";
    }
}