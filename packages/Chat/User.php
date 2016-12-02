<?php

class User {

    /** @var DatabaseConnection */
    private $databaseConnection = null;

    private $userId = null;
    private $firstName = null;
    private $lastName = null;
    private $username = null;
    private $email = null;
    private $phoneNumber = null;
    private $universityName = null;
    private $friends = null;
    private $coursesTaken = null;

    public function __construct($databaseConnection, $userId) {
        $this->databaseConnection = $databaseConnection;
        $this->userId = $userId;

        $this->friends = array();
        $this->coursesTaken = array();
    }

    public function addFriend($username) {

    }

    public function removeFriend($username) {

    }

    public function joinChatRoom($chatRoomId) {

    }
}

?>