<?php
include "../../connect.php";
include "../sessionAdmin.php";
$id = $_GET['id'];
$sql = "DELETE FROM user where id='$id'";
echo $sql = "Update video Set status=0 where id = $id";
$result = mysqli_query($con, $sql);
if($result)
{
	addLogs($con,$adminID, 'admin', 'Deleted a video.');
	 echo "<script>alert('Delete Successful');
			window.location.href = 'video.php' </script>";
}
else
{
	echo "<script>alert('error');
			window.location.href = 'video.php' </script>";
	
}
?>