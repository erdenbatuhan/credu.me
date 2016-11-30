<?php

    include "DatabaseConnection.php";
    include "ChatRoom.php";

	$databaseConnection = new DatabaseConnection();
	$chatRoom = new ChatRoom($databaseConnection, 'BUS158');

    $chatRoom->fetchMessages();
	$chatRoom->printMessages();
?>