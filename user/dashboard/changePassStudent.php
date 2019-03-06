<?php
include "../../connect.php";
include "../sessionUser.php";
$userId = $_SESSION['userID'];
$pass = md5($_POST['txtPass']);
$confirmPass = md5($_POST['txtConfirmPass']);

if($pass == $confirmPass){

    echo $sql = "Update user SET password = '$pass' WHERE id = '$userId' ";
        $result = mysqli_query($con, $sql);
        if($result)
        {
                addLogs($con,$userId, 'user', 'Change Student Password');
                 echo "<script>alert('Password updated successfully');
                window.location.href = 'index.php' </script>";
        }
        else
        {
                echo "<script>alert('error');
                window.location.href = 'index.php' </script>";
        }
}else{
    echo "<script>alert('ERROR! PASSWORD DID NOT MATCH');
    window.location.href = 'index.php' </script>";
}


?>