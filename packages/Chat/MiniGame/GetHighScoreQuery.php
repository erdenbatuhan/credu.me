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
    $profileId = "S001146"; /* TODO This will be changed */
    $highScore;

    $highScoreQuery = "SELECT HIGH_SCORE FROM USERS WHERE ID = '".$profileId."'";
    $highScoreQueryResult = mysqli_query($connection,$highScoreQuery);

    if(!$highScoreQueryResult){
        throw new Exception("High score query error");
    }

    while($row = mysqli_fetch_assoc($highScoreQueryResult)){
        $highScore = $row["HIGH_SCORE"];
        echo json_encode($highScore);
    }
?>