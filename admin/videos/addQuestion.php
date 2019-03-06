<?php
include "../../connect.php";
include "../sessionAdmin.php";
$id = $_GET['videoID'];
$question = $_POST['questionTxt'];

$sql = "INSERT INTO evaluation(videoID,question) VALUES($id,'$question')";
	$result = mysqli_query($con, $sql);
	if($result)
	{
			addLogs($con,$adminID, 'admin', 'Added new question');
			 echo "<script>alert('Successful');
			window.location.href = 'updateVideo.php?videoID=$id' </script>";	
	}
	else
	{
			echo "<script>alert('error');
			window.location.href = 'updateVideo.php?videoID=$id' </script>";	
	}


?>