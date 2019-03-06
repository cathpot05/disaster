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

<section class="home-about-area pt-20" style="background: white">
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
                <a href="user_videos.php" class="primary-btn text-uppercase">Proceed to Videos</a>
            </div>
            <div class="col-lg-6 col-md-12 home-about-right no-padding">
                <img class="img-fluid" src="../../img/disaster4.jpg" alt="">
            </div>
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

<footer class="footer-area section-gap"></footer>
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
<!--<script type="text/javascript">

        $('#btnmodifyPass').click(function(){
            alert("test");
            /*var MD5 = function(d){result = M(V(Y(X(d),8*d.length)));return result.toLowerCase()};function M(d){for(var _,m="0123456789ABCDEF",f="",r=0;r<d.length;r++)_=d.charCodeAt(r),f+=m.charAt(_>>>4&15)+m.charAt(15&_);return f}function X(d){for(var _=Array(d.length>>2),m=0;m<_.length;m++)_[m]=0;for(m=0;m<8*d.length;m+=8)_[m>>5]|=(255&d.charCodeAt(m/8))<<m%32;return _}function V(d){for(var _="",m=0;m<32*d.length;m+=8)_+=String.fromCharCode(d[m>>5]>>>m%32&255);return _}function Y(d,_){d[_>>5]|=128<<_%32,d[14+(_+64>>>9<<4)]=_;for(var m=1732584193,f=-271733879,r=-1732584194,i=271733878,n=0;n<d.length;n+=16){var h=m,t=f,g=r,e=i;f=md5_ii(f=md5_ii(f=md5_ii(f=md5_ii(f=md5_hh(f=md5_hh(f=md5_hh(f=md5_hh(f=md5_gg(f=md5_gg(f=md5_gg(f=md5_gg(f=md5_ff(f=md5_ff(f=md5_ff(f=md5_ff(f,r=md5_ff(r,i=md5_ff(i,m=md5_ff(m,f,r,i,d[n+0],7,-680876936),f,r,d[n+1],12,-389564586),m,f,d[n+2],17,606105819),i,m,d[n+3],22,-1044525330),r=md5_ff(r,i=md5_ff(i,m=md5_ff(m,f,r,i,d[n+4],7,-176418897),f,r,d[n+5],12,1200080426),m,f,d[n+6],17,-1473231341),i,m,d[n+7],22,-45705983),r=md5_ff(r,i=md5_ff(i,m=md5_ff(m,f,r,i,d[n+8],7,1770035416),f,r,d[n+9],12,-1958414417),m,f,d[n+10],17,-42063),i,m,d[n+11],22,-1990404162),r=md5_ff(r,i=md5_ff(i,m=md5_ff(m,f,r,i,d[n+12],7,1804603682),f,r,d[n+13],12,-40341101),m,f,d[n+14],17,-1502002290),i,m,d[n+15],22,1236535329),r=md5_gg(r,i=md5_gg(i,m=md5_gg(m,f,r,i,d[n+1],5,-165796510),f,r,d[n+6],9,-1069501632),m,f,d[n+11],14,643717713),i,m,d[n+0],20,-373897302),r=md5_gg(r,i=md5_gg(i,m=md5_gg(m,f,r,i,d[n+5],5,-701558691),f,r,d[n+10],9,38016083),m,f,d[n+15],14,-660478335),i,m,d[n+4],20,-405537848),r=md5_gg(r,i=md5_gg(i,m=md5_gg(m,f,r,i,d[n+9],5,568446438),f,r,d[n+14],9,-1019803690),m,f,d[n+3],14,-187363961),i,m,d[n+8],20,1163531501),r=md5_gg(r,i=md5_gg(i,m=md5_gg(m,f,r,i,d[n+13],5,-1444681467),f,r,d[n+2],9,-51403784),m,f,d[n+7],14,1735328473),i,m,d[n+12],20,-1926607734),r=md5_hh(r,i=md5_hh(i,m=md5_hh(m,f,r,i,d[n+5],4,-378558),f,r,d[n+8],11,-2022574463),m,f,d[n+11],16,1839030562),i,m,d[n+14],23,-35309556),r=md5_hh(r,i=md5_hh(i,m=md5_hh(m,f,r,i,d[n+1],4,-1530992060),f,r,d[n+4],11,1272893353),m,f,d[n+7],16,-155497632),i,m,d[n+10],23,-1094730640),r=md5_hh(r,i=md5_hh(i,m=md5_hh(m,f,r,i,d[n+13],4,681279174),f,r,d[n+0],11,-358537222),m,f,d[n+3],16,-722521979),i,m,d[n+6],23,76029189),r=md5_hh(r,i=md5_hh(i,m=md5_hh(m,f,r,i,d[n+9],4,-640364487),f,r,d[n+12],11,-421815835),m,f,d[n+15],16,530742520),i,m,d[n+2],23,-995338651),r=md5_ii(r,i=md5_ii(i,m=md5_ii(m,f,r,i,d[n+0],6,-198630844),f,r,d[n+7],10,1126891415),m,f,d[n+14],15,-1416354905),i,m,d[n+5],21,-57434055),r=md5_ii(r,i=md5_ii(i,m=md5_ii(m,f,r,i,d[n+12],6,1700485571),f,r,d[n+3],10,-1894986606),m,f,d[n+10],15,-1051523),i,m,d[n+1],21,-2054922799),r=md5_ii(r,i=md5_ii(i,m=md5_ii(m,f,r,i,d[n+8],6,1873313359),f,r,d[n+15],10,-30611744),m,f,d[n+6],15,-1560198380),i,m,d[n+13],21,1309151649),r=md5_ii(r,i=md5_ii(i,m=md5_ii(m,f,r,i,d[n+4],6,-145523070),f,r,d[n+11],10,-1120210379),m,f,d[n+2],15,718787259),i,m,d[n+9],21,-343485551),m=safe_add(m,h),f=safe_add(f,t),r=safe_add(r,g),i=safe_add(i,e)}return Array(m,f,r,i)}function md5_cmn(d,_,m,f,r,i){return safe_add(bit_rol(safe_add(safe_add(_,d),safe_add(f,i)),r),m)}function md5_ff(d,_,m,f,r,i,n){return md5_cmn(_&m|~_&f,d,_,r,i,n)}function md5_gg(d,_,m,f,r,i,n){return md5_cmn(_&f|m&~f,d,_,r,i,n)}function md5_hh(d,_,m,f,r,i,n){return md5_cmn(_^m^f,d,_,r,i,n)}function md5_ii(d,_,m,f,r,i,n){return md5_cmn(m^(_|~f),d,_,r,i,n)}function safe_add(d,_){var m=(65535&d)+(65535&_);return(d>>16)+(_>>16)+(m>>16)<<16|65535&m}function bit_rol(d,_){return d<<_|d>>>32-_}*/
            //var pass = MD5($("input[name=txtPass]").val());
            //var pass1 = MD5($("input[name=txtConfirmPass]").val());
            var pass = $("input[name=txtPass]").val();
            var pass1 = $("input[name=txtConfirmPass]").val();
            if(pass == pass1){
                alert("Password match");

            }else{
                alert("Password did not match");
                $("#form_changepass").submit(function(e){
                    e.preventDefault();
                });
            }
        });
</script>-->
