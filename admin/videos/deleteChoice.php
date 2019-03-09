<?php
include "../../connect.php";
include "../sessionAdmin.php";
$videoID = $_GET['videoID'];
$choiceID = $_GET['choiceID'];
//$sql = "DELETE FROM user where id='$id'";
$sql = "Update evaluation_choices Set status=0 where id = $choiceID";
$result = mysqli_query($con, $sql);
if($result)
{
	addLogs($con,$adminID, 'admin', 'Deleted a option from a question.');
	 echo "<script>alert('Delete Successful');
			window.location.href = 'updateVideo.php?videoID=".$videoID."' </script>";
}
else
{
	echo "<script>alert('error');
			window.location.href = 'updateVideo.php?videoID=".$videoID."' </script>";
	
}
?>