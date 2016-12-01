<!DOCTYPE html>
<html lang="tr">
<head>
    <title> Chat | credu.me </title>
    <?php include ("~" . $_SERVER['DOCUMENT_ROOT'] . "/credu.me/head.php"); ?>
</head>
<?php
    include "DatabaseConnection.php";
    include "ChatRoom.php";
?>
<body id="chat-index">
<?php
    $databaseConnection = new DatabaseConnection();
    $chatRoom = new ChatRoom($databaseConnection, 'BUS158');

    $chatRoom->fetchMessages();
?>
<div class="jumbotron chatron">
        <?php for($i = 0; $i < count($chatRoom->getMessages()); $i++) { ?>
            <h5><?php echo $chatRoom->getSenders()[$i] ?> at (<?php echo $chatRoom->getDates()[$i] ?>)</h5>
            <p><?php echo $chatRoom->getMessages()[$i] ?></p>
        <?php } ?>
</div>
</body>
</html>