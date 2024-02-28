<?php
$dbHost = "localhost";
$dbName = "crud";
$username = "root";
$password = "";

$conn = mysqli_connect($dbHost, $username, $password, $dbName);
if (!$conn) {
    die("Something Went Wrong: " . mysqli_connect_error());
}
?>
