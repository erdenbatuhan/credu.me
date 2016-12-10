<?php

    include "../DatabaseConnection.php";

    $databaseConnection = new DatabaseConnection();
    $databaseConnection->initiateConnection();
    $connection = $databaseConnection->getConnection();

    $course_id = $_POST['course_id'];
    $sender_id = $_POST['sender_id'];
    $message = $_POST['message'];

    $sql_query = "INSERT INTO MESSAGES VALUES (0, '" . $course_id . "', '" . $sender_id . "', SYSDATE(), '" . $message . "')";
    $sql_result = mysqli_query($connection, $sql_query);

    mysqli_fetch_assoc($sql_result);

    $databaseConnection->killConnection();

?>