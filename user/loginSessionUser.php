<?php
session_start();
$id=$_GET['id'];
if(isset($_GET['id']))
{
	$_SESSION['userID'] = $id;
	header('Location:dashboard/index.php');
}
else
{
	header('Location:../login.php');
}
?>