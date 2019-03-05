<?php
session_start();
include "../connect.php";
echo $userID = $_SESSION['userID'];
addLogs($con,$userID, 'user', 'Logged out');
unset($_SESSION['userID']);
header('location:../login.php');
?>