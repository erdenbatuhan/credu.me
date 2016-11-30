<!DOCTYPE html>
<html lang="tr">

<head>
    <?php include "head.php"; ?>
    <title> Chat | credu.me </title>
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