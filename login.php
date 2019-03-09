	<?php
include "connect.php";

if(isset($_POST['loginSubmit']))
{
	$username=$_POST['usernameTxt'];
	$password = md5($_POST['passwordTxt']);
	$sql = "Select *from admin where username='$username' AND password='$password'";
		$result = mysqli_query($con, $sql);
		if(mysqli_num_rows($result)>0)
		{
			while($row = mysqli_fetch_array($result)){
				addLogs($con,$row['id'], 'admin', 'Logged in');
				header("Location:admin/loginSessionAdmin.php?id=".$row['id']);
				
			}
		}
		else
		{
			$sql = "Select *from user where username='$username' AND password='$password'";
			$result = mysqli_query($con, $sql);
			if(mysqli_num_rows($result)>0)
			{
				while($row = mysqli_fetch_array($result)){
					addLogs($con,$row['id'], 'user', 'Logged in');
					header("Location:user/loginSessionUser.php?id=".$row['id']);
					
				}
			}
			else{
				echo "<script>alert('Incorrect username or password');
				window.location.href = 'login.php' </script>";	
			}
		}
}
else if(isset($_POST['registerSubmit']))
{
	$studNo = $_POST['studNoTxt'];
	$name = $_POST['nameTxt'];
	$email = $_POST['emailTxt'];
	$username=$_POST['usernameTxt'];
	$password = md5($_POST['passwordTxt']);
	$sql = "INSERT INTO user(studNo,name,email,username,password,status) VALUES('$studNo','$name','$email','$username','$password',1)";
		$result = mysqli_query($con, $sql);
		if($result)
		{
				 "<script>alert('Register Successful');
				window.location.href = 'login.php' </script>";	
		}
		else
		{
				echo "<script>alert('error');
				window.location.href = 'login.php' </script>";	
		}
	
}

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
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/jquery-ui.css">				
			<link rel="stylesheet" href="css/nice-select.css">							
			<link rel="stylesheet" href="css/animate.min.css">
			<link rel="stylesheet" href="css/owl.carousel.css">				
			<link rel="stylesheet" href="css/main.css">

		</head>

		<body>	
			<header id="header">
				<div class="header-top">
					
				</div>
				<div class="container main-menu">
					<div class="row align-items-center justify-content-between d-flex">
				      <div id="logo">
						<h3>Logo</h3>
				      </div>
				     				      		  
					</div>
				</div>
			</header><!-- #header -->
			
			<!-- start banner Area -->
			<section class="banner-area relative">
				<div class="overlay overlay-bg"></div>				
				<div class="container">
					<div class="row fullscreen align-items-center justify-content-between">
						<div class="col-lg-6 col-md-6 banner-left">
							<h6 class="text-white">Be ready, Be prepared </h6>
							<h1 class="text-white">Disaster Prevention</h1>
							<p class="text-white">
								" There's no harm in hoping for the best as long as you're prepared for the worst. "  — Stephen King
							</p>
							<a href="#" class="primary-btn text-uppercase">Learn More</a>
						</div>
						<div class="col-lg-4 col-md-6 banner-right">
							<ul class="nav nav-tabs" id="myTab" role="tablist">
							  <li class="nav-item">
							    <a class="nav-link active" id="flight-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">Login</a>
							  </li>
							  <li class="nav-item">
							    <a class="nav-link" id="hotel-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Register</a>
							  </li>
							 
							</ul>
							<div class="tab-content" id="myTabContent">
							  <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
								<form class="form-wrap" name="loginForm" action="login.php" method="post">
									<input type="text" required class="form-control" name="usernameTxt" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username '">
									<input type="password" required class="form-control" name="passwordTxt" placeholder="Password " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password '">
									<button type="submit" name="loginSubmit" class="primary-btn text-uppercase" >Login</button>									
								</form>
							  </div>
							  <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
								<form class="form-wrap" action="login.php" method="post">
									<input type="text" required class="form-control" name="studNoTxt" placeholder="Student No. " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Student No. '">
									<input type="text" required class="form-control" name="nameTxt" placeholder="Name " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Name '">
									<input type="email" required class="form-control" name="emailTxt" placeholder="Email Address " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address '">
									<input type="text" required class="form-control" name="usernameTxt" placeholder="Username " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username '">
									<input type="password" class="form-control" name="passwordTxt" placeholder="Password " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password '">		
									<button type="submit" name="registerSubmit" class="primary-btn text-uppercase" >Register</button>									
								</form>							  	
							  </div>
							 
							</div>
						</div>
					</div>
				</div>					
			</section>
			<!-- End banner Area -->

			<!-- End footer Area -->	
<footer class="footer-area">
				<div class="container">

					
				</div>
			</footer>
			<script src="js/vendor/jquery-2.2.4.min.js"></script>
			<script src="js/popper.min.js"></script>
			<script src="js/vendor/bootstrap.min.js"></script>			
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>		
 			<script src="js/jquery-ui.js"></script>					
  			<script src="js/easing.min.js"></script>			
			<script src="js/hoverIntent.js"></script>
			<script src="js/superfish.min.js"></script>	
			<script src="js/jquery.ajaxchimp.min.js"></script>
			<script src="js/jquery.magnific-popup.min.js"></script>						
			<script src="js/jquery.nice-select.min.js"></script>					
			<script src="js/owl.carousel.min.js"></script>							
			<script src="js/mail-script.js"></script>	
			<script src="js/main.js"></script>	
		</body>
	</html>
    <script type="text/javascript">

    </script>