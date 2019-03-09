<?php
include "../../connect.php";
include "../sessionAdmin.php";
$userId = $_SESSION['adminID'];
?>

	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Disaster Prevention</title>

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
				        <h3>LOGO</h3>
				      </div>
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
				          <li><a href="../dashboard/dashboard.php">Dashboard</a></li>
				          <li><a href="../videos/video.php">Videos</a></li>
				          <li><a href="../students/student.php">Students</a></li>
				          <li><a href="../reports/report.php">Reports</a></li>
				          <li><a href="../logs/log.php">Activity Logs</a></li>
				          <li class="menu-has-children"><a href="">Account</a>
				            <ul>
				              <li><a href="#" data-toggle="modal" data-target="#editProfileModal" onclick="changeID(<?php echo $userId; ?>, 'edit_prof')">Update Info</a></li>
				              <li><a href="#" data-toggle="modal" data-target="#changePasswordModal" onclick="changeID(<?php echo $userId; ?>, 'changePass')">Change Password</a></li>
							  <li><a href="../logoutSessionAdmin.php">Logout</a></li>
				            </ul>
				          </li>	
				        
				        </ul>
				      </nav><!-- #nav-menu-container -->					      		  
					</div>
				</div>
			</header><!-- #header -->

			<!-- start banner Area -->
			<!-- Start top-category-widget Area -->
			<section class="relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->				  

			<section class="top-category-widget-area pt-100 pb-90">
				<div class="container">
				<h1>Dashboard</h1>
				<hr>
				<br>
					<div class="row">		
						<div class="col-lg-4">
							
							<div class="single-cat-widget">
								<div class="content relative">
									<div class="overlay overlay-bg"></div>
									<a href="../videos/video.php"  style="color: inherit; text-decoration: inherit; ">
								      <div class="thumb">
								  		 <img class="content-image img-fluid d-block mx-auto" src="../../img/animated_video3.jpg" alt="">
								  	  </div>
								      <div class="content-details">
								       
										   <h4 class="content-title mx-auto text-uppercase">Animated Video</h4>
										   <span></span>								        
										   <p>Upload and Manage videos and exams</p>
								      </div>
									  </a>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-cat-widget">
								<div class="content relative">
									<div class="overlay overlay-bg"></div>
									<a href="../students/student.php"  style="color: inherit; text-decoration: inherit; "> 
								      <div class="thumb">
								  		 <img class="content-image img-fluid d-block mx-auto" src="../../img/student3.jpg" alt="">
								  	  </div>
								      <div class="content-details">
									    
								        <h4 class="content-title mx-auto text-uppercase">Student Info</h4>
								        <span></span>								        
								        <p>View student scores and details</p>
										
								      </div>
								    </a>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-cat-widget">
								<div class="content relative">
									<div class="overlay overlay-bg"></div>
									 <a href="../reports/report.php"  style="color: inherit; text-decoration: inherit; "> 
								      <div class="thumb">
								  		 <img class="content-image img-fluid d-block mx-auto" src="../../img/report2.jpg" alt="">
								  	  </div>
								      <div class="content-details">
									  
								        <h4 class="content-title mx-auto text-uppercase">Chart and Reports</h4>
								        <span></span>
								        <p>View and Print multiple reports</p>
										
								      </div>
									  </a>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-cat-widget">
								<div class="content relative">
									<div class="overlay overlay-bg"></div>
								    <a href="../logs/log.php"  style="color: inherit; text-decoration: inherit; "> 
								      <div class="thumb">
								  		 <img class="content-image img-fluid d-block mx-auto" src="../../img/report.jpg" alt="">
								  	  </div>
								      <div class="content-details">
									   
								        <h4 class="content-title mx-auto text-uppercase">Activity Logs</h4>
								        <span></span>
								        <p>Track account activities</p>
										
								      </div>
								    </a>
								</div>
							</div>
						</div>							
					</div>
				</div>	
			</section>
			<br>

			<br><br>

            <div class="modal animated zoomIn" id="editProfileModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h3 style="text-align:center">Edit Profile</h3>
                            <button type="button" class="close" data-dismiss="modal">×</button>
                        </div>
                        <div class="modal-body" id="editProfile">
                            <form class="form-horizontal" action="../updateInfo/updateinfo.php" method=post >
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


			<footer class="footer-area">
				<div class="container">

					
				</div>
			</footer>
			<!-- End top-category-widget Area -->
			<!-- End footer Area -->	

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
        var url = '../students/changeID.php?id='+newID+'&actiontype='+type;
        xhr.open('GET', url, false);
        xhr.onreadystatechange = function () {
            if(type==='edit_prof')
            {
                document.getElementById("editProfile").innerHTML = xhr.responseText;
            }
            else if(type==='changePass')
            {
                document.getElementById("changePassForm").innerHTML = xhr.responseText;
            }
        }
        xhr.send();
        return false;
    }

</script>