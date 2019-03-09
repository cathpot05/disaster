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
				          <li class="menu-has-children"><a href=#>Account</a>
				            <ul>
                                <li><a href="#" data-toggle="modal" data-target="#editProfileModal" onclick="changeIDprofile(<?php echo $userId; ?>, 'edit_prof')">Update Info</a></li>
                                <li><a href="#" data-toggle="modal" data-target="#changePasswordModal" onclick="changeIDprofile(<?php echo $userId; ?>, 'changePass')">Change Password</a></li>
							  <li><a href="../logoutSessionAdmin.php">Logout</a></li>
				            </ul>
				          </li>	
				        
				        </ul>
				      </nav><!-- #nav-menu-container -->					      		  
					</div>
				</div>
			</header><!-- #header -->

			<!-- start banner Area -->
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

			<!-- Start top-category-widget Area -->
			
			<!-- Start top-category-widget Area -->
			<section class="popular-destination-area section-gap pt-5 pb-0">
				<div class="container">
					<div class="row">
						<div class="col-lg-6">
							<h1>Activity Logs</h1>
						</div>
					</div>
				<hr>
				</div>	
			</section>
			<section class="destinations-area section-gap pt-0">
				<div class="container">					
					<div class="row">
						<div class="col-lg-12">						
							<table width=100% class="table table-bordered" style="background-color: white">
								<thead>
									<tr>
										<th width=5% >ID</th>
										<th width=30%>NAME</th>
										<th width=50%>DESCRIPTION</th>
										<th width=15%>TIME</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$sql = "SELECT *, 
											(CASE
												WHEN (A.userType = 'admin')
											THEN 
												(SELECT Z.name FROM admin Z WHERE Z.id = A.userID)
											ELSE
												(SELECT Z.name FROM user Z WHERE Z.id = A.userID)
											 END
											)As 'name'
										FROM `logs` A";
									$result = mysqli_query($con, $sql);
									while($row = mysqli_fetch_array($result)){
									?>
									<tr>
										<td><?php echo $row['id']; ?></td>
										<td><?php echo $row['name']; ?></td>
										<td><?php echo $row['description']; ?></td>
										<td><center><?php echo date('m/d/Y',strtotime($row['dateCreated']))."<br>".date('h:i:s a',strtotime($row['dateCreated']));?></center></td>
									</tr>
									
									<?php
									}
									
									?>
								</tbody>
							</table>
							
						</div>
					</div>
				</div>	
			</section>

			<br><br>

            <div class="modal animated zoomIn" id="editProfileModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h3 style="text-align:center">Edit Profile</h3>
                            <button type="button" class="close" data-dismiss="modal">×</button>
                        </div>
                        <div class="modal-body" id="editProfile">

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
    function changeIDprofile(newID,type){
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

    function validateForm() {
        var pass = document.forms["changePassForm"]["txtPass"].value;
        var pass1 = document.forms["changePassForm"]["txtConfirmPass"].value;
        if (pass != pass1) {
            alert("Password did not match");
            return false;
        }
    }
</script>