<?php
    $hostName = "localhost";
    $hostUser = "root";
    $hostPassword = "";
    $database = "credu.me";

    $connection = new mysqli($hostName, $hostUser, $hostPassword, $database);

    if (!$connection)
        die("Connection Failed!");

    $sql_query = "SELECT ID FROM COURSES";
    $sql_result = mysqli_query($connection, $sql_query);

    while ($row =  mysqli_fetch_assoc($sql_result)) {
        if (!file_exists('ChatRoom/' . $row['ID'])) {
            mkdir('ChatRoom/' . $row['ID'], 0777, true);
            mkdir('ChatRoom/' . $row['ID'] . '/logs', 0777, true);

            $fp = fopen('ChatRoom/' . $row['ID'] . '/logs/log.html', 'a');
            fwrite($fp, 'Empty');
            fclose($fp);
        }
    }

    mysqli_close($connection);
?>