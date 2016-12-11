<?php

class User {
    /** @var DatabaseConnection */
    private $databaseConnection = null;
    /** @var null */
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

        $this->fetchUserInformation();
    }

    private function fetchUserInformation() {
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

    public function fetchFriends() {
        $this->friends = array();

        $this->databaseConnection->initiateConnection();
        $connection = $this->databaseConnection->getConnection();

        $sql_query = "SELECT SECOND_USER_ID FROM FRIENDSHIP JOIN USERS 
                      ON FRIENDSHIP.SECOND_USER_ID = USERS.ID WHERE FIRST_USER_ID = '" . $this->userId . "' 
                      ORDER BY FIRST_NAME, LAST_NAME";
        $sql_result = mysqli_query($connection, $sql_query);

        while ($row = mysqli_fetch_assoc($sql_result))
            $this->friends[] = new User($this->databaseConnection, $row['SECOND_USER_ID']);

        $this->databaseConnection->killConnection();
    }

    public function fetchCoursesTaken() {
        $this->coursesTaken = array();

        $this->databaseConnection->initiateConnection();
        $connection = $this->databaseConnection->getConnection();

        $sql_query = "SELECT COURSE_ID FROM COURSESTAKEN WHERE USER_ID ='" . $this->userId . "' ORDER BY COURSE_ID";
        $sql_result = mysqli_query($connection, $sql_query);

        while ($row = mysqli_fetch_assoc($sql_result))
            $this->coursesTaken[] = $row['COURSE_ID'];

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

    public function getMessageFrom($userId) {
        $this->databaseConnection->initiateConnection();
        $connection = $this->databaseConnection->getConnection();

        $sql_query = "SELECT MESSAGE FROM Friendship 
                      WHERE FIRST_USER_ID = '" . $userId . "' AND SECOND_USER_ID = '" . $this->userId . "'";
        $sql_result = mysqli_query($connection, $sql_query);

        $row = mysqli_fetch_assoc($sql_result);
        $message = $row['MESSAGE'];

        $this->databaseConnection->killConnection();
        return $message;
    }

    public function addFriend($username) {

    }

    public function removeFriend($username) {

    }

    public function joinChatRoom($chatRoomId) {

    }

    public function getFullName() {
        return $this->firstName . ' ' . $this->lastName;
    }

    public function getFriends() {
        return $this->friends;
    }

    public function getCoursesTaken() {
        return $this->coursesTaken;
    }
}

?>