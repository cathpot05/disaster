<?php
include "../../connect.php";
include "../sessionAdmin.php";

$name = $_POST['nameTxt'];
$description = $_POST['descriptionTxt'];
$fileDir = "../../video/".$_FILES['videoFile']['name'];
$thumbnail = "../../video/thumbnail/".$_FILES['thumbnailFile']['name'];

   $video_size = $_FILES['videoFile']['size'];
   $thumbnail_size = $_FILES['thumbnailFile']['size'];
   
   $video_tmp = $_FILES['videoFile']['tmp_name'];
   $thumbnail_tmp = $_FILES['thumbnailFile']['tmp_name'];
   
   if(!is_dir("../../video/")) {
		mkdir("../../video/");
	}
	if(!is_dir("../../video/thumbnail/")) {
		mkdir("../../video/thumbnail/");
	}
    if($video_size > 2097152 || $thumbnail_size > 2097152) {
      $errors[]='File size must be excately 2 MB';
   }

   if(empty($errors)==true) {
      move_uploaded_file($video_tmp,$fileDir);
	  move_uploaded_file($thumbnail_tmp,$thumbnail);
      echo "alert(success)";
	  
	  echo $sql = "INSERT INTO video(name,description,fileDir,thumbnail) VALUES('$name','$description','$fileDir','$thumbnail')";
	 $result = mysqli_query($con, $sql);
	  

   }else{
      print_r($errors);
   }


header("Location:video.php");
?>