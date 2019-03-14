<?php
include "../../connect.php";
include "../sessionAdmin.php";

$startDate = $_POST['startDateTxt'];
$endDate = $_POST['endDateTxt'];

$sql = "INSERT INTO schedule (startDate,endDate) VALUES('$startDate','$endDate')";

	$result = mysqli_query($con, $sql);
	if($result)
	{
			addLogs($con,$adminID, 'admin', 'Added new schedule');
			 echo "<script>alert('Successful');
			window.location.href = 'video.php' </script>";	
	}
	else
	{
			echo "<script>alert('error');
			window.location.href = 'video.php' </script>";	
	}


?>