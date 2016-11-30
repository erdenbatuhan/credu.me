<?php

    include "DatabaseConnection.php";
    include "ChatRoom.php";

	$databaseConnection = new DatabaseConnection();
	$chatRoom = new ChatRoom($databaseConnection, 'BUS118');

    $chatRoom->fetchMessages();
	$chatRoom->printAll();
?>