<?php
session_start();
echo $adminID = $_SESSION['userID'];
unset($_SESSION['userID']);
header('location:../login.php');
?>