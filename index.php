<!DOCTYPE html>
<html lang="tr">
<head>
    <title> credu.me </title>
    <?php "head.php"; ?>
</head>
<body id="chat-index">
<br><br><br>
<div class="jumbotron container">
    <?php

    include "packages/DatabaseConnection.php";

    $db = new DatabaseConnection();
    $db->initiateConnection();
    $connection = $db->getConnection();

    $sql_query = "SELECT * FROM USERS";
    $sql_result = mysqli_query($connection, $sql_query);
    $c = mysqli_num_rows($sql_result);
    echo $c;

    while ($row = mysqli_fetch_assoc($sql_result)) {
        echo $row["FIRST_NAME"] . " " . $row["LAST_NAME"] . "<br>";
    }

    $db->killConnection();
    ?>
</div>
</body>
</html>