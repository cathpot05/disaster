<?php
include "../../connect.php";
include "../sessionAdmin.php";
$id = $_GET['questionID'];
$videoID = $_GET['videoID'];
$choice = $_POST['choiceTxt'];

$sql = "INSERT INTO evaluation_choices(evaluationID,choice) VALUES($id,'$choice')";
	$result = mysqli_query($con, $sql);
	if($result)
	{
			addLogs($con,$adminID, 'admin', 'Added new question');
			 echo "<script>alert('Successful');
			window.location.href = 'updateVideo.php?videoID=$videoID' </script>";	
	}
	else
	{
			echo "<script>alert('error');
			window.location.href = 'updateVideo.php?videoID=$videoID' </script>";	
	}


?>