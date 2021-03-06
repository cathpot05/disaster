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
			<link rel="stylesheet" href="../../css/animate.css">
			<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
			<!-- End banner Area -->				  

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
			<!-- Start top-category-widget Area -->
			<section class="popular-destination-area section-gap pt-5 pb-0">
				<div class="container">
						<div class="row">
					<div class="col-lg-6">
						<h1 class="mb-10">Student Information</h1>
					</div>
					<div class="col-lg-6">
					<a href="#" class="genric-btn info circle" style="float:right"  data-toggle="modal" data-target="#addStudentModal" >
						<i class="fa fa-print" aria-hidden="true"></i> &nbsp;Print
					</a>
					<a href="#" class="genric-btn info circle" style="float:right; margin-right: 20px;"  data-toggle="modal" data-target="#addStudentModal" >ADD STUDENT</a>
					
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
										<th width=20%>Student No.</th>
										<th width=30%>Name</th>
										<th width=35%>Email</th>
										<th width=10%>Actions</th>
									</tr>
								</thead>
								<tbody>
									<?php
							
									$sql = "Select *from user where status=1";
									$result = mysqli_query($con, $sql);
									while($row = mysqli_fetch_array($result)){
									?>
									<tr>
										<td><?php echo $row['id']; ?></td>
										<td><?php echo $row['studNo']; ?></td>
										<td><?php echo $row['name']; ?></td>
										<td><?php echo $row['email']; ?></td>
										<td class="center">
											<a class="btn btn-info" href="#" data-toggle="modal" data-target="#editStudentModal" onclick="changeID(<?php echo $row['id']; ?>, 'edit')">
												<i class="fa fa-edit" aria-hidden="true"></i>
											</a>
											<a class="btn btn-danger" href="#" data-toggle="modal" data-target="#deleteStudentModal" onclick="changeID(<?php echo $row['id']; ?>, 'delete')">
												<i class="fa fa-trash" aria-hidden="true"></i>
											</a>
										</td>
									</tr>
									
									<?php
									}
									
									?>
								</tbody>
							</table>
							<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
						</div>
					</div>
				</div>	
			</section>
			
			
			<div class="modal animated zoomIn" id="addStudentModal">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<form class="form-horizontal" action="addStudent.php" method=post id=""> 
							<div class="modal-header">
							<h3 style="text-align:center">Add Student</h3>
								<button type="button" class="close" data-dismiss="modal">×</button>
							</div>
							<div class="modal-body">
								<form class="form-wrap" action="addStudent.php" method="post">
									<input type="text" required class="form-control"  name="studNoTxt" placeholder="Student No." onfocus="this.placeholder = ''" onblur="this.placeholder = 'Student No. '"><br>
									<input type="text" required class="form-control" name="nameTxt" placeholder="Name " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Name '"><br>
									<input type="email" required class="form-control" name="emailTxt" placeholder="Email Address " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address '"><br>
									<input type="text" required class="form-control" name="usernameTxt" placeholder="Username " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password '"><br>
									<input type="password" required class="form-control" name="passwordTxt" placeholder="Password " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password '"><br><br>
									<button type="submit" name="registerSubmit" class="genric-btn info text-uppercase form-control">Save</button>						
								</form>		
							</div>
						</form>
					</div>
				</div>
			</div>
			
			<div class="modal animated zoomIn" id="editStudentModal">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						
							<div class="modal-header">
							<h3 style="text-align:center">Edit Student</h3>
								<button type="button" class="close" data-dismiss="modal">×</button>
							</div>
							<div class="modal-body" id="editStudentForm">
								<form class="form-horizontal" action="editStudent.php" method=post > 
									<input type="text" required class="form-control"  name="studNoTxt" placeholder="Student No." onfocus="this.placeholder = ''" onblur="this.placeholder = 'Student No. '"><br>
									<input type="text" required class="form-control" name="nameTxt" placeholder="Name " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Name '"><br>
									<input type="email" required class="form-control" name="emailTxt" placeholder="Email Address " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address '"><br>
									<input type="text" required class="form-control" name="usernameTxt" placeholder="Username " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username '"><br>
									<input type="password" required class="form-control" name="passwordTxt" placeholder="Password " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password '"><br>
									<button type="submit" name="registerSubmit" class="genric-btn info text-uppercase form-control">Save</button>							
								</form>
							</div>
						
					</div>
				</div>
			</div>
		
		<div class="modal animated zoomIn" id="deleteStudentModal">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<form class="form-horizontal" action="deleteStudent.php" method=post id="deleteStudentForm"> 
							<div class="modal-header">
							<h3 style="text-align:center">Delete Student</h3>
								<button type="button" class="close" data-dismiss="modal">×</button>
							</div>
							<div class="modal-body">
								<p>Are you sure you want to delete this student</p>	
								<br>
								<button type="submit" class="btn btn-primary" style="width:45%" name="residentSubmit">Yes</button>
								<button class="btn btn-default" data-dismiss="modal" style="width:45%; float: right">Cancel</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			
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
				else if(type==='delete')
				  {
					 document.getElementById("deleteStudentForm").action = "deleteStudent.php?id="+xhr.responseText+"";
				 }
                else if(type==='edit_prof')
                {
                    document.getElementById("editProfile").innerHTML = xhr.responseText;
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

    function validateForm() {
        var pass = document.forms["changePassForm"]["txtPass"].value;
        var pass1 = document.forms["changePassForm"]["txtConfirmPass"].value;
        if (pass != pass1) {
            alert("Password did not match");
            return false;
        }
    }
	</script>
		</body>
	</html>
	
	