<?php
include "../../connect.php";
include "../sessionUser.php";
$userId = $_SESSION['userID'];
$sql = "Select * from user where id='$userId'";
$result = mysqli_query($con, $sql);
if(mysqli_num_rows($result)>0)
{
    while($row = mysqli_fetch_array($result)){
        $name = $row['username'];
    }
}
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
            <div class="row align-items-center">
                <div class="col-lg-6 col-sm-6 col-6 header-top-left">
                </div>
                <div class="col-lg-6 col-sm-6 col-6 header-top-right">
                    <ul>
                        <li><a href="#">Welcome <?php echo strtoupper($name); ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container main-menu">
        <div class="row align-items-center justify-content-between d-flex">
            <div id="logo">
                <h3>Logo</h3>
            </div>
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li><a href="index.php">Dashboard</a></li>
                    <li><a href="user_videos.php">Videos</a></li>
                    <li><a href="evaluation.php">Evaluation History</a></li>
                    <li class="menu-has-children"><a href="#">Account Settings</a>
                        <ul>
                            <li>
                                <a href="#" data-toggle="modal" data-target="#editStudentModal" onclick="changeID(<?php echo $userId; ?>, 'edit')">Modify Account Details</a>
                            </li>
                            <li><a href="#" data-toggle="modal" data-target="#changePasswordModal" onclick="changeID(<?php echo $userId; ?>, 'changePass')">Change Password</a></li>
                            <li><a href="../logoutSessionUser.php">Log out</a></li>
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

<section class="price-area pt-20">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10">History of taken exam</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            $sql2 = "SELECT B.score, C.name, B.dateCreated,
                        (SELECT COUNT(id) FROM evaluation WHERE videoID = A.videoID) AS 'question_count'
                    FROM user_certificates A
                    INNER JOIN user_certificates_detail B ON A.id = B.userCertID
                    INNER JOIN video C ON A.videoID = C.id
                    WHERE A.userID = '$userId'";
            $result2 = mysqli_query($con, $sql2);
            if(mysqli_num_rows($result2)>0)
            {
                while($row2 = mysqli_fetch_array($result2)){
                $score = $row2['score'];
                $title = $row2['name'];
                $taken = $row2['dateCreated'];
                $q_total = $row2['question_count'];
                if($score >= ($q_total/2)){
                 $color = "text-success";
                 $status = "PASSED";
                }else{
                 $color = "text-danger";
                  $status = "FAILED";
                }
            ?>
            <div class="col-lg-4">
                <div class="single-price">
                    <h4 class="<?php echo $color; ?>" style="font-size: 30px"><?php echo $status; ?></h4>
                    <ul class="price-list">
                        <li class="d-flex justify-content-between align-items-center">
                            <span class="font-weight-bold">Video</span>
                            <span><?php echo $title; ?></span>
                        </li>
                        <li class="d-flex justify-content-between align-items-center">
                            <span class="font-weight-bold">Score</span>
                            <span><?php echo $score ."/" .$q_total; ?></span>
                        </li>
                        <li class="d-flex justify-content-between align-items-center">
                            <span class="font-weight-bold">Date Taken</span>
                            <span><?php echo $taken; ?></span>
                        </li>
                    </ul>
                </div>
            </div>
            <?php
            }
            }
            ?>
        </div>
    </div>
</section>
<div class="modal animated zoomIn" id="editStudentModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h3 style="text-align:center">Edit Student</h3>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body" id="editStudentForm">
                <form class="form-horizontal" action="editStudent.php" method=post >
                    <input type="text" class="form-control"  name="studNoTxt" placeholder="Student No." onfocus="this.placeholder = ''" onblur="this.placeholder = 'Student No. '"><br>
                    <input type="text" class="form-control" name="nameTxt" placeholder="Name " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Name '"><br>
                    <input type="text" class="form-control" name="emailTxt" placeholder="Email Address " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address '"><br>
                    <input type="text" class="form-control" name="usernameTxt" placeholder="Username " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username '"><br>
                    <button type="submit" name="registerSubmit" class="genric-btn info text-uppercase form-control">Save</button>
                </form>
            </div>

        </div>
    </div>
</div>

<div class="modal animated zoomIn" id="changePasswordModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h3 style="text-align:center">Change Password</h3>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body" id="changePassForm">

            </div>

        </div>
    </div>
</div>

<footer class="footer-area section-gap pt-20"></footer>
<!-- End price Area -->
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
<script type="text/javascript">
    function changeID(newID,type){
        var xhr;
        if (window.XMLHttpRequest) xhr = new XMLHttpRequest(); // all browsers
        else xhr = new ActiveXObject("Microsoft.XMLHTTP"); 	// for IE
        var url = 'changeID.php?id='+newID+'&actiontype='+type;
        xhr.open('GET', url, false);
        xhr.onreadystatechange = function () {
            if(type==='edit')
            {
                document.getElementById("editStudentForm").innerHTML = xhr.responseText;
            }
            else if(type==='changePass')
            {
                document.getElementById("changePassForm").innerHTML = xhr.responseText;
            }
        }
        xhr.send();
        // ajax stop
        return false;
    }

    /*function checkPassFunction(){
     alert("test");
     var pass = $("input[name=txtPass]").val();
     var pass1 = $("input[name=txtConfirmPass]").val();
     }*/

</script>