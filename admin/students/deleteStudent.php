<?php
include "../../connect.php";
include "../sessionAdmin.php";
$id = $_GET['id'];
//$sql = "DELETE FROM user where id='$id'";
$sql = "Update user Set status=0 where id = $id";
$result = mysqli_query($con, $sql);
if($result)
{
	addLogs($con,$adminID, 'admin', 'Deleted a student.');
	 echo "<script>alert('Delete Successful');
			window.location.href = 'student.php' </script>";
}
else
{
	echo "<script>alert('error');
			window.location.href = 'student.php' </script>";
	
}
?>