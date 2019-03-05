<?php
include "../../connect.php";
include "../sessionAdmin.php";
$studNo = $_POST['studNoTxt'];
$name = $_POST['nameTxt'];
$email = $_POST['emailTxt'];
$username=$_POST['usernameTxt'];
$password = md5($_POST['passwordTxt']);

$sql = "INSERT INTO user(studNo,name,email,username,password,status) VALUES('$studNo','$name','$email','$username','$password',1)";
	$result = mysqli_query($con, $sql);
	if($result)
	{
			addLogs($con,$adminID, 'admin', 'Added new Student');
			 echo "<script>alert('Register Successful');
			window.location.href = 'student.php' </script>";	
	}
	else
	{
			echo "<script>alert('error');
			window.location.href = 'student.php' </script>";	
	}


?>