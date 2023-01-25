<?php

$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "phpproject01";

// mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
// try {
//   $mysqli = new mysqli($serverName, $dbUsername, $dbPassword, $dbName);
//   $mysqli->set_charset("utf8mb4");
// } catch (Exception $e) {
//   error_log($e->getMessage());
//   exit('Error connecting to database');
// }

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
