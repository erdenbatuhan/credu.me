<?php
    const MAX_AMOUNT_OF_MESSAGES = 100; // Maximum amount of messages to be displayed
?>
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

    $chatRoomName = $_GET['chatRoomName'];
?>
<body id="ChatRoom" style="background-color: whitesmoke;">
<div class="text-center">
    <h3 style="color: green;">Chat Room: <?php echo $chatRoomName ?></h3>
    <hr>
</div>
<?php
    $databaseConnection = new DatabaseConnection();
    $chatRoom = new ChatRoom($databaseConnection, $chatRoomName);

    /** Test Case for accessing a User in a ChatRoom, and printing its information */
    /** @var User */
    /** $user = $chatRoom->getSenders()[0]; */
    /** $user->printUserInfo(); */
?>
<br>
<div id="ChatArea" class="container">
    <div class="row">
        <div class="col-xs-3 text-center">
            <h4 style="color: green;"> Students in chatroom </h4>
            <hr>
            <!-- DUMP VALUES -->
            <?php for($i = 0; $i < 10; $i++) { ?>
                <h5><?php /** @var User */ echo $chatRoom->getSenders()[0]->getFullName() ?></h5>
            <?php } ?>
            <!-- .DUMP VALUES -->
        </div>
        <div id="DisplayArea" class="col-xs-9">
            <br>
            <?php
            $upperBound = count($chatRoom->getMessages()) - 1;
            $lowerBound = count($chatRoom->getMessages()) - MAX_AMOUNT_OF_MESSAGES;

            for($i = $upperBound; $i >= 0 && $i >= $lowerBound; $i--) { ?>
                <i><?php echo $chatRoom->getTimeDiff($chatRoom->getDates()[$i]) ?>..</i>
                <h5><?php /** @var User */ echo $chatRoom->getSenders()[$i]->getFullName() ?></h5>
                <p><?php echo $chatRoom->getMessages()[$i] ?></p>
                <br>
            <?php } ?>
        </div>
    </div>
</div>
</body>
</html>