<?php

const TIME_DIFF = 1; // Time difference in hours

class ChatRoom {
    /** @var DatabaseConnection */
    private $databaseConnection = null;

    private $course_id = null;
    private $senders = null;
    private $dates = null;
    private $messages = null;

    public function __construct($databaseConnection, $course_id) {
        $this->databaseConnection = $databaseConnection;
        $this->course_id = $course_id;

        $this->senders = array();
        $this->dates = array();
        $this->messages = array();

        $this->fetchMessages();
    }

    private function fetchMessages() {
        $this->databaseConnection->initiateConnection();
        $connection = $this->databaseConnection->getConnection();

        $sql_query = "SELECT * FROM MESSAGES WHERE COURSE_ID = '" . $this->course_id . "'";
        $sql_result = mysqli_query($connection, $sql_query);

        while ($row = mysqli_fetch_assoc($sql_result)) {
            $this->senders[] = new User($this->databaseConnection, $row['SENDER_ID']);
            $this->dates[] = $row['DATE'];
            $this->messages[] = $row['MESSAGE'];
        }

        $this->databaseConnection->killConnection();
    }

    public function getTimeDiff($date) {
        $messageTime = strtotime($date);
        $currentTime = strtotime(date('Y-m-d H:i:s', strtotime('+' . TIME_DIFF . 'hour')));

        $timeDiffInSeconds = $currentTime - $messageTime;
        $timeDiffInMinutes = $timeDiffInSeconds / 60;
        $timeDiffInHours = $timeDiffInSeconds / 3600;

        return $this->getTimeDiffWithMessage($timeDiffInMinutes, $timeDiffInHours);
    }

    private function getTimeDiffWithMessage($timeDiffInMinutes, $timeDiffInHours) {
        if (floor($timeDiffInMinutes) < 1)
            return 'less than a minute ago';
        else if (floor($timeDiffInMinutes) == 1)
            return 'a minute ago';
        else if (floor($timeDiffInMinutes) < 60)
            return floor($timeDiffInMinutes) . ' minutes ago';
        else if (floor($timeDiffInMinutes) < 120)
            return 'an hour ago';
        else
            return floor($timeDiffInHours) . ' hours ago';
    }

    public function getSenders() {
        return $this->senders;
    }

    public function getDates() {
        return $this->dates;
    }

    public function getMessages() {
        return $this->messages;
    }
}

?>