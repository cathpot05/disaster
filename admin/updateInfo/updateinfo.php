<?php
include "../../connect.php";
include "../sessionAdmin.php";
$userId = $_SESSION['adminID'];
$id = $_GET['id'];
$name = $_POST['nameTxt'];
$email = $_POST['emailTxt'];
$username=$_POST['usernameTxt'];

echo $sql = "Update admin SET name = '$name', email = '$email', username = '$username' WHERE id = '$userId' ";
$result = mysqli_query($con, $sql);
if($result)
{
    addLogs($con,$userId, 'user', 'Updated Student Information');
    echo "<script>alert('Update Successful');
			window.location.href = '../dashboard/dashboard.php' </script>";
}
else
{
    echo "<script>alert('error');
			window.location.href = '../dashboard/dashboard.php' </script>";
}


?>