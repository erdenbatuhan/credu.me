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
    <link href="../../includes/css/Chat.css" rel="stylesheet">

    <!-- ========== Javascript Part ========== !-->
    <script src="../../includes/Bootstrap/js/bootstrap.js"></script>
    <script src="../../includes/js/jquery-3.1.1.min.js"></script>
</head>
<?php
    include "../DatabaseConnection.php";
    include "ChatArea.php";

    $chatRoomName = $_GET['chatRoomName'];
    $pathToFolder = "./logs/" . $chatRoomName;
    $pathToLog = $pathToFolder . "/log.html";

    $user = 'S001352';
?>
<body id="ChatRoom">
    <div class="text-center">
        <h3>Chat Room: <?php echo $chatRoomName ?></h3>
        <hr>
    </div>
    <?php
    ?>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-xs-3 text-center" style="padding-right: 30px !important;">
                <h4> Students Registered </h4>
                <hr>
                <div id="RegisteredUsersArea"> <!-- USERS REGISTERED WILL BE DISPLAYED IN THIS DIVISION -->
                    <?php
                        $databaseConnection = new DatabaseConnection();
                        $chatArea = new ChatArea($databaseConnection, $chatRoomName);

                        $chatArea->fetchRegisteredUsers();

                        for($i = 0; $i < count($chatArea->getRegisteredUsers()); $i++) {
                            echo '<h5>' . $chatArea->getRegisteredUsers()[$i] . '</h5>';
                        }
                    ?>
                </div>
            </div>
            <div id="DisplayArea" class="col-xs-9">
                <br>
                <form name="message_form" action="">
                    <input name="message" type="text" id="message" size="63" />
                    <input name="send" type="submit" id="send" value="Send" />
                </form>
                <br>
                <div id="MessageArea"> <!-- MESSAGES WILL BE DISPLAYED IN THIS DIVISION -->
                    <?php
                        if (file_exists($pathToLog)) {
                            $fileStream = fopen($pathToLog, "r");
                            $contents = fread($fileStream, filesize($pathToLog));
                            fclose($fileStream);

                            echo $contents;
                        } else {
                            mkdir($pathToFolder, 0777, true);
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    var pathToLog = "<?php echo $pathToLog; ?>";
    var chatRoomName = "<?php echo $chatRoomName; ?>";
    var user = "<?php echo $user; ?>";

    setInterval(getMessagesSent, 500); // Call getMessagesSent every 500ms

    // Call reloadChats as soon as the page is loaded
    $(document).ready(function() {
        redirectIfChatRoomDoesNotExist();
        getMessagesSent();
    });

    function redirectIfChatRoomDoesNotExist() {
        if (chatRoomName == "")
            window.location.href = "../../";
    }

    // Handle the click
    $("#send").click(function() {
        if($("#message").val().length > 0) {
            $.post("PostMessage.php", {
                course_id: chatRoomName,
                sender_id: user,
                message: $("#message").val()
            });
        }

        $("#message").val("");
        getMessagesSent();

        return false;
    });

    // Load the chat log
    function getMessagesSent() {
        $.post("StoreMessagesSent.php", {
            pathToLog: pathToLog,
            chatRoomName: chatRoomName
        });

        $.ajax({
            url: pathToLog,
            cache: false,
            success: function(html) {
                $("#MessageArea").html(html);
            }
        });
    }
</script>
</html>