<?php
include "../../connect.php";
include "../sessionUser.php";
$userId = $_SESSION['userID'];
$scoreCounter = 0;
if(isset($_POST['exam_submit'])){
    foreach($_POST['choice_q'] as $question => $answer){
        //echo "Question Num: ". $question." User Answer: ".$answer." ";
        echo $sql = "Select B.id, A.videoID from evaluation A
            INNER JOIN evaluation_choices B ON A.id = B.evaluationID
            where A.id='$question' AND B.isCorrect = 1";
        $result = mysqli_query($con, $sql);
        if(mysqli_num_rows($result)>0)
        {
            while($row = mysqli_fetch_array($result)){
                //echo "Right Answer:" .$row['id']. "<br>";
                $videoId =  $row['videoID'];
                if($row['id']== $answer){
                    $scoreCounter++;
                }
            }
        }
    }
    //echo "Score is: ".$scoreCounter;
    echo $check = "Select * from user_certificates where userID='$userId' AND videoID = '$videoId'";
    $result1 = mysqli_query($con, $check);
    if(mysqli_num_rows($result1)>0)
    {
         while($row1 = mysqli_fetch_array($result1)){
             $user_cert_ID = $row1['id'];
             $currentScore = $row1['scoreStatus'];
         }
        $date = date("Y-m-d H:i:s");
        echo $user_sql = "INSERT INTO user_certificates_detail (userCertID, score, dateCreated)
            VALUES('$user_cert_ID','$scoreCounter', '$date')";
        if(mysqli_query($con, $user_sql)){
            //echo "Records inserted successfully.";
        } else{
            echo "ERROR: Could not able to execute $user_sql. " . mysqli_error($con);
        }
    }

    if($scoreCounter > $currentScore){
        echo $user_sql1 = "UPDATE user_certificates
                  SET scoreStatus = $scoreCounter
                  WHERE userId = '$userId' AND videoID = '$videoId'";
        if(mysqli_query($con, $user_sql1)){
            echo "Records updated successfully.";
        } else{
            echo "ERROR: Could not able to execute $user_sql. " . mysqli_error($con);
        }
    }
    header('Location:user_videos.php');
}
?>