<?php
include "../../connect.php";
include "../sessionAdmin.php";
$userId = $_SESSION['adminID'];
$pass = md5($_POST['txtPass']);
$confirmPass = md5($_POST['txtConfirmPass']);

if($pass == $confirmPass){

    echo $sql = "Update admin SET password = '$pass' WHERE id = '$userId' ";
    $result = mysqli_query($con, $sql);
    if($result)
    {
        addLogs($con,$userId, 'user', 'Change Admin Password');
        echo "<script>alert('Password updated successfully');
                window.location.href = '../dashboard/dashboard.php' </script>";
    }
    else
    {
        echo "<script>alert('error');
                window.location.href = '../dashboard/dashboard.php' </script>";
    }
}else{
    echo "<script>alert('ERROR! PASSWORD DID NOT MATCH');
    window.location.href = '../dashboard/dashboard.php' </script>";
}


?>