<?php

class User {
    /** @var DatabaseConnection */
    private $databaseConnection = null;

    private $userId = null;
    private $firstName = null;
    private $lastName = null;
    private $email = null;
    private $password = null;
    private $phoneNumber = null;
    private $universityName = null;
    private $friends = null;
    private $coursesTaken = null;

    public function __construct($databaseConnection, $userId) {
        $this->databaseConnection = $databaseConnection;
        $this->userId = $userId;

        $this->friends = array();
        $this->coursesTaken = array();

        $this->fetchData();
    }

    private function fetchData() {
        $this->databaseConnection->initiateConnection();
        $connection = $this->databaseConnection->getConnection();

        $sql_query = "SELECT * FROM Users JOIN Universities 
                      ON Users.UNIVERSITY_ID = Universities.ID
                      WHERE Users.ID = '" . $this->userId . "'";
        $sql_result = mysqli_query($connection, $sql_query);

        while ($row = mysqli_fetch_assoc($sql_result)) {
            $this->firstName = $row['FIRST_NAME'];
            $this->lastName = $row['LAST_NAME'];
            $this->email = $row['EMAIL'];
            $this->password = $row['PASSWORD'];
            $this->phoneNumber = $row['PHONE_NO'];
            $this->universityName = $row['NAME'];
        }

        $this->databaseConnection->killConnection();
    }

    public function printUserInfo() {
        echo 'ID:              ' . $this->userId          . '<br>' .
             'First Name:      ' . $this->firstName       . '<br>' .
             'Last Name:       ' . $this->lastName        . '<br>' .
             'Email:           ' . $this->email           . '<br>' .
             'Password:        ' . $this->password        . '<br>' .
             'Phone Number:    ' . $this->phoneNumber     . '<br>' .
             'University Name: ' . $this->universityName  . '<br>' ;

    }

    public function getFullName() {
        return $this->firstName . ' ' . $this->lastName;
    }

    public function addFriend($username) {

    }

    public function removeFriend($username) {

    }

    public function joinChatRoom($chatRoomId) {

    }
}

?>