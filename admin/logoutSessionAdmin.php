<?php
session_start();
include "../connect.php";
echo $adminID = $_SESSION['adminID'];
addLogs($con,$adminID, 'admin', 'Logged out');
unset($_SESSION['adminID']);
header('location:../login.php');
?>