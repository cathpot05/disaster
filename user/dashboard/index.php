<?php
/**
 * Created by PhpStorm.
 * User: PB7N0062
 * Date: 3/2/19
 * Time: 2:36 PM
 */

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

    <body style="display: block">
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
            <div class="container main-menu">
                <div class="row align-items-center justify-content-between d-flex">
                    <div id="logo">
                        <h3>Logo</h3>
<!--                        <a href="#"><img src="#" alt="" title="" /></a>-->
                    </div>
                    <nav id="nav-menu-container">
                        <ul class="nav-menu">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Evaluation History</a></li>
                            <!--<li class="menu-has-children"><a href="">Pages</a>
                                <ul>
                                    <li><a href="#">Elements</a></li>
                                    <li class="menu-has-children"><a href="">Level 2 </a>
                                        <ul>
                                            <li><a href="#">Item One</a></li>
                                            <li><a href="#">Item Two</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>-->
                            <li class="menu-has-children"><a href="#">Account Settings</a>
                                <ul>
                                    <li><a href="#">Modify Account Details</a></li>
                                    <li><a href="#">Change Password</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav><!-- #nav-menu-container -->
                </div>
            </div>
        </header><!-- #header -->

        <section class="home-about-area">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-end">
                    <div class="col-lg-6 col-md-12 home-about-left">
                        <h1>
                            Did not find your Package? <br>
                            Feel free to ask us. <br>
                            We‘ll make it for you
                        </h1>
                        <p>
                            inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach. inappropriate behavior is often laughed.
                        </p>
                        <a href="#" class="primary-btn text-uppercase">request custom price</a>
                    </div>
                    <div class="col-lg-6 col-md-12 home-about-right no-padding">
                        <img class="img-fluid" src="../../img/hotels/about-img.jpg" alt="">
                    </div>
                </div>
            </div>
        </section>

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
