<?php
    /* DB connection */
    $hostName = "localhost";
    $hostUser = "root";
    $hostPw = "juventus";
    $dbName = "credume";

    $connection = new mysqli($hostName, $hostUser, $hostPw, $dbName);

    /**/
    $profileId = "S001146"; /* $_GET['id'] */
    $friendList = array();

    $friendQuery = "SELECT second_user_id FROM FRIENDSHIP";
    $friendQueryResult = mysqli_query($connection, $friendQuery);

    if(!$friendQueryResult){
        throw new Exception("Database error ");
    }

    while ($row = mysqli_fetch_assoc($friendQueryResult)){
        echo($row["second_user_id"]);
        echo("bn");
    }
    mysqli_close($connection);

?>
