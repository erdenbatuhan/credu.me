<!DOCTYPE html>
<html lang="en">
<head>
    <title> credu.me </title>
</head>
<body>
<?php

include "packages/DatabaseConnection.php";

$db = new DatabaseConnection();
$db->initiateConnection();
$connection = $db->getConnection();

$sql_query = "SELECT * FROM USERS";
$sql_result = mysqli_query($connection, $sql_query);

while ($row = mysqli_fetch_assoc($sql_result)) {
    echo $row["FIRST_NAME"] . " " . $row["LAST_NAME"] . "<br>";
}

$db->killConnection();
?>
</body>
</html>