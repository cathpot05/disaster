<?php
include "../../connect.php";
include "../sessionUser.php";
$userId = $_SESSION['userID'];
$id = $_GET['id'];
$studNo = $_POST['studNoTxt'];
$name = $_POST['nameTxt'];
$email = $_POST['emailTxt'];
$username=$_POST['usernameTxt'];

echo $sql = "Update user SET studNo = '$studNo', name = '$name', email = '$email', username = '$username' WHERE id = '$userId' ";
	$result = mysqli_query($con, $sql);
	if($result)
	{
			addLogs($con,$userId, 'user', 'Updated Student Information');
			 echo "<script>alert('Update Successful');
			window.location.href = 'index.php' </script>";
	}
	else
	{
			echo "<script>alert('error');
			window.location.href = 'index.php' </script>";
	}


?>