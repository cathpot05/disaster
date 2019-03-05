<?php
$host="localhost";
$user="root";
$password="";
$con=mysqli_connect($host,$user,$password,"disasterdb");

function addLogs($con,$id,$userType,$description)
{
	$sql = "INSERT INTO logs(userID,userType,description) VALUES($id,'$userType','$description')";
	$result = mysqli_query($con, $sql);
}

?>