<?php
include "../../connect.php";
include "../sessionAdmin.php";
$videoID = $_GET['videoID'];
$questionID = $_GET['questionID'];
$questionTxt = $_POST['questionTxt'];
$choiceCounter = $_POST['choiceCounter'];
$choiceAnswer = $_POST['choiceAnswer'];

$sql = "Update evaluation SET question = '$questionTxt' where id = $questionID ";
$result = mysqli_query($con, $sql);

for($i=0; $i<$choiceCounter; $i++)
{
	
    $choiceID = $_POST['choiceID_'.$i];
    $choiceTxt = $_POST['choiceTxt_'.$i];
	if($choiceAnswer == $choiceID)
	{
		$sql = "Update evaluation_choices SET  choice= '$choiceTxt', isCorrect=1 where id = $choiceID ";
	}
	else
	{
		$sql = "Update evaluation_choices SET  choice= '$choiceTxt', isCorrect=0 where id = $choiceID ";
	}
    $result = mysqli_query($con, $sql);

}



if($result)
{
    addLogs($con,$adminID, 'admin', 'Updated Student Information');
  echo "<script>alert('Update Successful');
			window.location.href = 'updateVideo.php?videoID=$videoID' </script>";
}
else
{
    echo "<script>alert('error');
			window.location.href = 'updateVideo.php?videoID=$videoID' </script>";
}


?>