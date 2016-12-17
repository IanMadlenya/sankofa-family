<?php
/*
Template Name: sankofa-crm-client
*/
$current_user = wp_get_current_user();

if ( is_user_logged_in() ):

$servername = "localhost";
$username = "root";
$password = "Sankofa809";
$dbname = "sankofa-family";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM sf_crm_info WHERE user_login = '$current_user->user_login'";
$result = $conn->query($sql);

$sql2 = "SELECT * FROM sf_crm_bonus WHERE ref_id = ( SELECT ref_id FROM sf_crm_info WHERE user_login = '$current_user->user_login')";
$result2 = $conn->query($sql2);
?>
<!DOCTYPE html>
<html>
<title>Sankofa CRM</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/css/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="/css/font-awesome.min.css">
<link rel="stylesheet" href="/css/style.css">
<link rel="stylesheet" href="/css/calendar.css">
<style>
.w3-sidenav {font-family: "Raleway", sans-serif}
.w3-sidenav a,.w3-sidenav h4 {font-weight:bold}
</style>
<body class="w3-light-grey w3-content" style="max-width:1600px">

<!-- Sidenav/menu -->
<nav class="w3-sidenav w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidenav"><br>
  <div class="w3-container">
    <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding" title="close menu">
      <i class="fa fa-remove"></i>
    </a>
    <img src="<?php echo get_avatar_url ( $current_user->user_email, 300 ); ?>" style="width:45%;" class="w3-round"><br><br>
    <h4 class="w3-padding-0"><b><?php echo $current_user->user_login ?></b></h4>
    <p class="w3-text-grey"><?php echo $current_user->user_email ?></p>
  </div>
  <a href="/portal" onclick="w3_close()" class="w3-padding crm-text-blue w3-hover-text-light-grey">主页</a>
  <a href="/class" onclick="w3_close()" class="w3-padding w3-hover-text-light-grey">微信课堂登记</a>
<?php if ( array_shift( $current_user->roles ) == "administrator" ): ?>
<a href="/class-view" onclick="w3_close()" class="w3-padding w3-hover-text-light-grey">微信课堂登记数据</a>
<?php endif; ?>
  <a href="<?php echo wp_logout_url( home_url() ); ?>" onclick="w3_close()" class="w3-padding w3-hover-text-light-grey">登出</a>
   
</nav>

<!-- Overlay effect when opening sidenav on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px">

<!-- Header -->
<header class="w3-container w3-right-align crm-title-padding">
    <h3>客户群管理</h3>
</header>

<!-- Grid -->
<div class="w3-row">

<!-- MAIN -->
<div class="w3-col l8 s12">
<?php if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) { ?>
  <div class="w3-margin crm-box">
    <div class="w3-container">
      <h4><b>新建客户群</b></h4>
    </div>
    <div class="w3-container">
        <table style="padding:10px;font-size:14px">
        <tbody>
        <tr>
        <td>客户群编号:</td>
        <td class="w3-opacity"><input class="w3-input" type="text" name="job"></td>
        <td>责任经理:</td>
        <td class="w3-opacity"><input class="w3-input" type="text" name="job"></td>
        </tr>
        <tr>
        <td>后台客服:</td>
        <td class="w3-opacity"><input class="w3-input" type="text" name="job"></td>
        <td>渠道编号:</td>
        <td class="w3-opacity"><input class="w3-input" type="text" name="job"></td>
        </tr>
        <tr>
        <td>上级:</td>
        <td class="w3-opacity"><input class="w3-input" type="text" name="job"></td>
        <td>城市:</td>
        <td class="w3-opacity"><input class="w3-input" type="text" name="job"></td>
        </tr>
        <tr>
        <td>地址:</td>
        <td class="w3-opacity"><input class="w3-input" type="text" name="job"></td>
        <td>邮编:</td>
        <td class="w3-opacity"><input class="w3-input" type="text" name="job"></td>
        </tr>
        </tbody>
        </table>
      <div class="w3-row">
        <div class="w3-col m8 s12">
        <p><button class="crm-box-btn w3-padding">添加进数据库</button></p>
        </div>
      </div>
    </div>
  </div>
<?php } } else { ?>
    <div class="w3-margin crm-box-error">
    <div class="w3-container">
      <h4><b>新建客户群</b></h4>
    </div>
    <div class="w3-container">
    <div class="w3-center">
    <p>您没有足够的权限进行此操作！</p>
    <hr>
    <p><button class="crm-box-error-btn w3-padding">联系系统管理员</button></p>
    </div>
    </div>
  </div>
<?php } ?>
<hr>
<div class="w3-margin crm-box-bonus">
    <div class="w3-container">
      <h4><b>Graph</b></h4>
    </div>
    <div class="w3-container">
    <p>testing</p>
    </div>
  </div>
    
<!-- END MAIN -->
</div>

<!-- Sidebar -->
<div class="w3-col l4">
<div class="w3-margin crm-box">
    <div class="w3-container">
    <h4><b>Search</b></h4>
    </div>
    <div class="w3-container">
        <p>testing</p>
    </div>
  </div>
  
<!-- END Sidebar -->
</div>

<!-- END GRID -->
</div>

<a href="#0" class="cd-top">Top</a>

<!-- End page content -->
</div>

<script>
// Script to open and close sidenav
function w3_open() {
    document.getElementById("mySidenav").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidenav").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}

// Change style of navbar on scroll
window.onscroll = function() {myFunction()};
function myFunction() {
    var navbar = document.getElementById("myNavbar");
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        navbar.className = "w3-navbar" + " w3-card-2" + " w3-animate-top" + " w3-black";
    } else {
        navbar.className = navbar.className.replace(" w3-card-2 w3-animate-top w3-black", "");
    }
}
</script>
<script src="/js/back.to.top.js"></script>
</body>
</html>
<?php
else: 
header( 'Location: /wp-admin' ) ;
endif;
?>