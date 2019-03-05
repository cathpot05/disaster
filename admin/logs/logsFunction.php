<?php
function addLogs($id,$userType,$description)
{
	$sql = "INSERT INTO logs(userID,userType,description) VALUES($userID,'userType','$description')";
	$result = mysqli_query($con, $sql);
}

?>