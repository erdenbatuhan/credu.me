<!DOCTYPE html>
<html lang="tr">
<head>
    <title> Chat | credu.me </title>

    <!-- ========== META Part ========== !-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible">
    <meta name="description" content="index">
    <meta name="author" content="beobe">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ========== CSS Part ========== !-->
    <link href="../../includes/Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../includes/Font-Awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../../includes/css/Chatron.css" rel="stylesheet">

    <!-- ========== Javascript Part ========== !-->
    <script src="../../includes/Bootstrap/js/bootstrap.js"></script>
    <script src="../../includes/js/jquery-3.1.1.min.js"></script>
</head>
<?php
    include "DatabaseConnection.php";
    include "User.php";
    include "ChatRoom.php";
?>
<body id="chat-index">
<?php
    $databaseConnection = new DatabaseConnection();
    $chatRoom = new ChatRoom($databaseConnection, 'BUS158');

    /** @var User */
    $user = $chatRoom->getSenders()[1];
    $user->printUserInfo();
?>
<br><br><br>
<div class="container">
    <?php for($i = 0; $i < count($chatRoom->getMessages()); $i++) { ?>
        <div class="jumbotron chatron">
            <i><?php echo $chatRoom->getTimeDiff($chatRoom->getDates()[$i]) ?>..</i>
            <h5><?php /** @var User */ echo $chatRoom->getSenders()[$i]->getFullName() ?></h5>
            <p><?php echo $chatRoom->getMessages()[$i] ?></p>
        </div>
        <br>
    <?php } ?>
</div>
</body>
</html>