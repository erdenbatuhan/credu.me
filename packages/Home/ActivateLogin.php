<?php
    session_start();

    include "../DatabaseConnection.php";
    include "../User.php";
    include "Login.php";

    $databaseConnection = new DatabaseConnection();
    $login = new Login($databaseConnection);

    $email = $_POST['email'];
    $password = $_POST['password'];

    $login->login($email, $password);

    if (!$login->getLatestError())
        $_SESSION['loggedUserId'] = $login->getLoggedUserId();
    else
        echo $login->getLatestError();
?>