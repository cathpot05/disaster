<?php
include "../../connect.php";
include "../sessionAdmin.php";
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
						<h1>Animated videos</h1>
					</div>
					<div class="col-lg-6">
					<a href="#" class="genric-btn info circle" style="float:right; margin-right: 20px;"  data-toggle="modal" data-target="#uploadModal" >Set Schedule</a>
					<a href="#" class="genric-btn info circle" style="float:right; margin-right: 20px;"  data-toggle="modal" data-target="#uploadModal" >Upload Video</a>
					
					
					</div>
				</div>
				<hr>
				</div>	
			</section>
				<section class="destinations-area section-gap pt-0">
				<div class="container">					
					<div class="row">
					<?php
					$sql = "Select *from video where status=1";
					$result = mysqli_query($con, $sql);
					while($row = mysqli_fetch_array($result)){
					?>
						<div class="col-lg-4">
							<div class="single-destinations">
								<div class="thumb">
									<img src="<?php echo $row['thumbnail']; ?>" alt="">
								</div>
								<div class="details">
									<h4 style="font-weight: bold; text-align:center"><?php echo $row['name']; ?></h4>
									<p>
										<?php echo $row['description']; ?>
									</p>
									<ul class="package-list">
										<li class="d-flex justify-content-between align-items-center">
											<span>Passed</span>
											<span>0</span>
										</li>
										<li class="d-flex justify-content-between align-items-center">
											<span>Failed</span>
											<span>0</span>
										</li>
										<li class="d-flex justify-content-between align-items-center">
											<span>Questions</span>
											<span>3</span>
										</li>
										<li class="d-flex justify-content-between align-items-center">
											<a href="updateVideo.php?videoID=<?php echo $row['id']; ?>" class="genric-btn info circle" style="float:right; margin-right: 20px; width:100%"  >Update</a>
					
										</li>
										<li class="d-flex justify-content-between align-items-center">
											<a href="#" class="genric-btn danger circle" style="float:right; margin-right: 20px; width:100%"  data-toggle="modal" data-target="#deleteVideoModal" onclick="changeID(<?php echo $row['id']; ?>, 'delete')" >Delete</a>
					
										</li>													
									</ul>
								</div>
							</div>
						</div>
					<?php
					}
					?>
					</div>
				</div>	
			</section>
			
			<div class="modal animated zoomIn" id="uploadModal">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<form class="form-horizontal" action="addVideo.php" method=post id="uploadForm"  enctype = "multipart/form-data"> 
							<div class="modal-header">
							<h3 style="text-align:center">Upload Video</h3>
								<button type="button" class="close" data-dismiss="modal">×</button>
							</div>
							<div class="modal-body">
								<input type="text" class="form-control"  name="nameTxt" placeholder="Name " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Name '"><br>
								<textarea class="form-control" name="descriptionTxt" placeholder="Description" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Description'" required></textarea>
								<br>Thumbnail
								<input type="file"  class="form-control" name="thumbnailFile"> 
								<br>
								Video
								<input type="file"  class="form-control" name="videoFile">
								<br>
								<button type="submit" class="btn btn-primary"  style="width:100%" name="residentSubmit">Save</button>
								
							</div>
						</form>
					</div>
				</div>
			</div>
			
			
		<div class="modal animated zoomIn" id="deleteVideoModal">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<form class="form-horizontal" action="deleteVideo.php" method=post id="deleteVideoForm"> 
							<div class="modal-header">
							<h3 style="text-align:center">Delete Video</h3>
								<button type="button" class="close" data-dismiss="modal">×</button>
							</div>
							<div class="modal-body">
								<p>Are you sure you want to delete this video</p>	
								<br>
								<button type="submit" class="btn btn-primary" style="width:45%" name="residentSubmit">Yes</button>
								<button class="btn btn-default" data-dismiss="modal" style="width:45%; float: right">Cancel</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<br><br>
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
							 document.getElementById("deleteVideoForm").action = "deleteVideo.php?id="+xhr.responseText+"";
						 }					 
					}
					xhr.send();
					// ajax stop
					return false;
			}
			</script>
			
		</body>
	</html>