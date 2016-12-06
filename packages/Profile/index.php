<?php

    include "../DatabaseConnection.php";
    include "../User.php";

    $databaseConnection = new DatabaseConnection();
    $user = new User($databaseConnection, $_GET['id']);

    $user->fetchFriends();
    $user->fetchCoursesTaken();

    $user->printUserInfo();

    echo "<br>";

    /** ----- PRINTING FRIENDS ----- */
    for($i = 0; $i < count($user->getFriends()); $i++)
        echo $user->getFriends()[$i]->getFullName() . "<br>";

    echo "<br>";

    /** ----- PRINTING COURSES TAKEN ----- */
    for($i = 0; $i < count($user->getCoursesTaken()); $i++)
        echo $user->getCoursesTaken()[$i] . "<br>";

    $databaseConnection->killConnection();

?>
