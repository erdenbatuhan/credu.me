<!DOCTYPE html>
<html lang="tr">

<head>
    <title> Chat | credu.me </title>
    <?php include ('../../head.php'); ?>
</head>
<?php
    include "DatabaseConnection.php";
    include "ChatRoom.php";
?>
<body id="index">
<?php
    $databaseConnection = new DatabaseConnection();
    $chatRoom = new ChatRoom($databaseConnection, 'BUS158');

    $chatRoom->fetchMessages();
    $chatRoom->printMessages();
?>
</body>
</html>