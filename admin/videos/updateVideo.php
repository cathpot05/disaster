<?php
include "../../connect.php";
include "../sessionAdmin.php";
$video_id = $_GET['videoID'];
//check if record exist


?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="colorlib">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta charset="UTF-8">
    <title>User View</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <!--
    CSS
    ============================================= -->
    <link rel="stylesheet" href="../../css/linearicons.css">
    <link rel="stylesheet" href="../../css/font-awesome.min.css">
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/magnific-popup.css">
    <link rel="stylesheet" href="../../css/jquery-ui.css">
    <link rel="stylesheet" href="../../css/nice-select.css">
    <link rel="stylesheet" href="../../css/animate.min.css">
    <link rel="stylesheet" href="../../css/owl.carousel.css">
    <link rel="stylesheet" href="../../css/main.css">
</head>
<body>
<header id="header">
    <div class="header-top">
        <div class="container">
           
        </div>
    </div>
    <div class="container main-menu">
        <div class="row align-items-center justify-content-between d-flex">
            <div id="logo">
                <h3>Logo</h3>
            </div>
            <nav id="nav-menu-container">
              <nav id="nav-menu-container">
				        <ul class="nav-menu">
				          <li><a href="../dashboard/dashboard.php">Dashboard</a></li>
				          <li><a href="../videos/video.php">Videos</a></li>
				          <li><a href="../students/student.php">Students</a></li>
				          <li><a href="../reports/report.php">Reports</a></li>
				          <li><a href="../logs/log.php">Activity Logs</a></li>
				          <li class="menu-has-children"><a href=#>Account</a>
				            <ul>
				              <li><a href="../updateInfo/updateinfo.php">Update Info</a></li>
				              <li><a href="../changePassword/changePassword.php">Change Password</a></li>
							  <li><a href="../logoutSessionAdmin.php">Logout</a></li>
				            </ul>
				          </li>	
				        
				        </ul>
				      </nav><!-- #nav-menu-container -->

        </div>
    </div>
</header><!-- #header -->
<section class="about-banner relative">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                </h1>
            </div>
        </div>
    </div>
</section>
<?php
$sql1 = "Select * from video where id='$video_id'";
$result1 = mysqli_query($con, $sql1);
if(mysqli_num_rows($result1)>0)
{
    while($row1 = mysqli_fetch_array($result1)){
        $path = $row1['fileDir'];
        $video_title =$row1['name'];
        $desc = $row1['description'];
    }
}
?>
<section class="destinations-area pt-20">
<form action="updateVideoDetails.php?id=<?php echo $video_id; ?>" method=post enctype = "multipart/form-data">
    <h1 class="pb-10 d-flex justify-content-center"><b>  </b></h1>
    <div class="container">
	<input type="text" class="form-control" style="width:100%"  name="nameTxt" placeholder="Name " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Name '" value= "<?php echo $video_title;?>">
        <br><div class="row">
            <div class="map-wrap" style="width:100%; height: 445px; box-shadow: 0px 10px 30px 0px rgba(60, 64, 143, 0.3);">
                <embed style="width:100%; height: 400px; play="true" loop="false" menu="true" src="<?php echo $path; ?>">
				<input type="file" name="videoFile" >
				<input type="hidden" name="videoFile_tmp" value = "<?php echo $path; ?>" >
            </div>
			
				
			
        </div>
		
        <div class="row d-flex justify-content-center">
            <div class=" pb-20 pt-20 col-lg-8 text-center">
               <textarea class="form-control" rows=7 name="descriptionTxt" placeholder="Description" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Description'" required> 
				<?php echo $desc; ?>
				</textarea>
            </div>
        </div>
		 <button id="btn_submit" name="save_video" class="primary-btn text-uppercase text-center" style="float:right">SAVE VIDEO</button>
    </div>
	</form>
</section>
<br><br><br>

<hr>
<section  class="price-area pt-20 pb-20">
<h1 style="text-align:center">Exam</h1>
<br>
    <form class="form-wrap" action="checkUserAnswer.php" method="POST">
        <div class="container" style="width:90%; box-shadow: 0px 10px 30px 0px rgba(60, 64, 143, 0.3);">
            <div class="row d-flex justify-content-center">
                <div class="menu-content col-lg-8">
                </div>
            </div>
            <div class="row">
                <?php
                $sql2 = "SELECT A.id, A.question
                    FROM evaluation A
                    INNER JOIN video B ON A.videoID = B.id
                    WHERE A.videoID ='$video_id'";
                $result2 = mysqli_query($con, $sql2);
                if(mysqli_num_rows($result2)>0)
                {
                    while($row2 = mysqli_fetch_array($result2)){
                        $evalId = $row2['id'];
                        ?>
                        <div class="col-lg-12">
                            <div class="single-price">
                                <h4 class="text-uppercase">
								<input type="text" class="form-control" name="question_<?php echo $row2['id']; ?>" value="<?php echo $row2['question']?>"></h4>
                                <ul class="price-list">
                                    <?php
                                    $sql3 = "SELECT B.id, B.choice
                                        FROM evaluation A
                                        INNER JOIN evaluation_choices B ON A.id = B.evaluationID
                                        WHERE A.id = '$evalId'";
                                    $result3 = mysqli_query($con, $sql3);
                                    if(mysqli_num_rows($result3)>0)
                                    {
                                        while($row3 = mysqli_fetch_array($result3)){
                                            ?>
                                            <li class="d-flex justify-content-between align-items-center">
                                                <label class="text-uppercase">
												<input type="text" class="form-control" name="question_<?php echo $row2['id']; ?>_choice_<?php echo $row3['id']; ?>" value="<?php echo $row3['choice'] ?>">
                                                </label>
                                            </li>
                                        <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>

                    <?php
                    }
                }
                ?>
            </div>
			
        </div>
		<br>
		<div class="container">
		<button id="btn_submit" name="save_exam" class="primary-btn text-uppercase text-center" style="float: right">SAVE EXAM</button>
		</div><br><br>
            
		
                
        
    </form>
</section>



<section id="exam_collapse" class="price-area pt-20 pb-20">
    <form class="form-wrap" action="checkUserAnswer.php" method="POST">
        <div class="container" style="width:100%; box-shadow: 0px 10px 30px 0px rgba(60, 64, 143, 0.3);">
            <div class="row d-flex justify-content-center">
                <div class="menu-content col-lg-8">
                </div>
            </div>
            <div class="row">
                <?php
                $sql2 = "SELECT A.id, A.question
                    FROM evaluation A
                    INNER JOIN video B ON A.videoID = B.id
                    WHERE A.videoID ='$video_id'
                    ORDER BY RAND()";
                $result2 = mysqli_query($con, $sql2);
                if(mysqli_num_rows($result2)>0)
                {
                    while($row2 = mysqli_fetch_array($result2)){
                        $evalId = $row2['id'];
                        ?>
                        <div class="col-lg-12">
                            <div class="single-price">
                                <h4 class="text-uppercase"><?php echo $row2['question']?></h4>
                                <ul class="price-list">
                                    <?php
                                    $sql3 = "SELECT B.id, B.choice
                                        FROM evaluation A
                                        INNER JOIN evaluation_choices B ON A.id = B.evaluationID
                                        WHERE A.id = '$evalId'
                                        ORDER BY RAND()";
                                    $result3 = mysqli_query($con, $sql3);
                                    if(mysqli_num_rows($result3)>0)
                                    {
                                        while($row3 = mysqli_fetch_array($result3)){
                                            ?>
                                            <li class="d-flex justify-content-between align-items-center">
                                                <label class="text-uppercase">
                                                    <input style="height: 16px; width: 16px" type="radio" name="choice_q[<?php echo $evalId ?>]" value="<?php echo $row3['id'] ?>"> <?php echo $row3['choice'] ?>
                                                </label>
                                            </li>
                                        <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>

                    <?php
                    }
                }
                ?>
            </div>
            <div class="row d-flex justify-content-center">
                <button id="btn_submit" name="exam_submit" class="primary-btn text-uppercase text-center">SUBMIT</button>
            </div>
        </div>
    </form>
</section>
<footer class="footer-area section-gap pt-20"></footer>



<script src="../../js/vendor/jquery-2.2.4.min.js"></script>
<script src="../../js/popper.min.js"></script>
<script src="../../js/vendor/bootstrap.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
<script src="../../js/jquery-ui.js"></script>
<script src="../../js/easing.min.js"></script>
<script src="../../js/hoverIntent.js"></script>
<script src="../../js/superfish.min.js"></script>
<script src="../../js/jquery.ajaxchimp.min.js"></script>
<script src="../../js/jquery.magnific-popup.min.js"></script>
<script src="../../js/jquery.nice-select.min.js"></script>
<script src="../../js/owl.carousel.min.js"></script>
<script src="../../js/mail-script.js"></script>
<script src="../../js/main.js"></script>
</body>
</html>
<script>
    $('#btn_view_exam').click(function(){
        $('#exam_collapse').slideToggle('slow');
    });
	
	function changeElement()
</script>