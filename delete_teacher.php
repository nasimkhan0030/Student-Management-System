<?php
require('connection.php');
session_start();
$user_first_name = $_SESSION['user_first_name'];
$user_last_name = $_SESSION['user_last_name'];
$user_id = $_SESSION['user_id'];
$email = $_SESSION['email'];
$user_type = $_SESSION['user_type'];
if ($user_type == 'admin') {
?>

<?php 
if (isset($_GET['id'])) {
    $getid = $_GET['id'];
    $sql6 = "DELETE FROM users   WHERE user_id = $getid";
    $query6 = $conn->query($sql6);
    if ($conn->query($sql6) == TRUE) {
        header('location:list_of_teacher.php');
    } else {
        echo "Error occur.";
    }
}
?>

<?php
} else {
    header('location:login.php');
}
?>