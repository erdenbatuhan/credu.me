<?php
    /* DB connection */
    $hostName = "localhost";
    $hostUser = "root";
    $hostPw = "juventus";
    $dbName = "credume";

    $connection = new mysqli($hostName, $hostUser, $hostPw, $dbName);

    if (!$connection)
        die("Connection Failed!");
    /**/
    $profileId = "S001146"; /* $_GET['id'] */
    $friendList = array();

    $friendQuery = "SELECT second_user_id FROM FRIENDSHIP WHERE FIRST_USER_ID = '".$profileId."'";;
    $friendQueryResult = $connection -> query($friendQuery);
    if(!$friendQueryResult){
        throw new Exception("Database error ");
    }
    while ($row = $friendQueryResult -> fetch_assoc()){
        echo($row);
        array_push($friendList,$friendQueryResult);
    }
?>
