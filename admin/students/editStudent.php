<?php
include "../../connect.php";
include "../sessionAdmin.php";
$id = $_GET['id'];
$studNo = $_POST['studNoTxt'];
$name = $_POST['nameTxt'];
$email = $_POST['emailTxt'];
$username=$_POST['usernameTxt'];
$password = md5($_POST['passwordTxt']);

$sql = "Update user SET studNo = '$studNo', name = '$name', email = '$email', username = '$username', password = '$password' where id = $id ";
	$result = mysqli_query($con, $sql);
	if($result)
	{
			addLogs($con,$adminID, 'admin', 'Updated Student Information');
			 echo "<script>alert('Update Successful');
			window.location.href = 'student.php' </script>";	
	}
	else
	{
			echo "<script>alert('error');
			window.location.href = 'student.php' </script>";	
	}


?>