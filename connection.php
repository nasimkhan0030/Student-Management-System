<?php
$hostname = 'localhost';
$username = 'root';
$password = "";
$dbname = 'student_management';
$conn = new mysqli($hostname, $username, $password, $dbname);
if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
}
?>