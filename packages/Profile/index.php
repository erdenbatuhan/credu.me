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
    $courseList = array();
    $userInfo = array();

    /* Get the query results and store them in arrays - FriendList and CoursesTaken */
    $userInfoQuery = "SELECT * FROM USERS WHERE ID ='".$profileId."'";
    $userInfoQueryResult = mysqli_query($connection,$userInfoQuery);
    $friendQuery = "SELECT SECOND_USER_ID FROM FRIENDSHIP WHERE FIRST_USER_ID ='".$profileId."'";;
    $friendQueryResult = mysqli_query($connection, $friendQuery);
    $courseQuery = "SELECT COURSE_ID FROM COURSESTAKEN WHERE USER_ID ='".$profileId."'";;
    $courseQueryResult = mysqli_query($connection, $courseQuery);

    if(!$userInfoQueryResult){
        throw new Exception("User Query error");
    }

    if(!$friendQueryResult){
        throw new Exception("Friend List Query error ");
    }

    if(!$courseQueryResult){
        throw new Exception("Course query error");
    }


    while ($row = mysqli_fetch_assoc($friendQueryResult)){
        array_push($friendList,$row["SECOND_USER_ID"]);
    }

    while ($row = mysqli_fetch_assoc($courseQueryResult)){
        array_push($courseList,$row["COURSE_ID"]);
    }

    echo("Friends: "."<br/>");
    foreach($friendList as $key => $value){
        echo $key.":".$value."<br/>";
    }
    echo("Courses: "."<br/>");
    foreach($courseList as $key => $value){
    echo $key.":".$value."<br/>";
}
    mysqli_close($connection);
    /**/
?>
