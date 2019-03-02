<?php
session_start();
echo $adminID = $_SESSION['adminID'];
unset($_SESSION['adminID']);
header('location:../login.php');
?>