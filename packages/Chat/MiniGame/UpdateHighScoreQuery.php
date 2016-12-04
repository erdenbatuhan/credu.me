<?php
    /* DB connection */
    $hostName = "localhost";
    $hostUser = "root";
    $hostPw = "admin";
    $dbName = "credume";

    $connection = new mysqli($hostName, $hostUser, $hostPw, $dbName);

    if (!$connection)
        die("Connection Failed!");
    /**/
    $profileId = "S001146";  /* TODO This will be changed */
    $bestScore = $_POST['bestScore'];

    $highScoreUpdateQuery = "UPDATE USERS SET HIGH_SCORE ='".$bestScore."'WHERE ID = '".$profileId."'";
    $highScoreUpdateQueryResult = mysqli_query($connection,$highScoreUpdateQuery);

    if(!$highScoreUpdateQueryResult){
        throw new Exception("High score update query error");
    }
    mysqli_fetch_assoc($highScoreUpdateQueryResult);
?>