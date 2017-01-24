<!DOCTYPE html>
<?php
/*
Template Name: sankofa-portal
*/
$current_user = wp_get_current_user();

if ( is_user_logged_in() ):

include 'sf-passwd.php';

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

include 'calendar.php';
$calendar = new Calendar();
?>
<html>
<title>Sankofa CRM</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/css/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="/css/font-awesome.min.css">
<link rel="stylesheet" href="/css/bootstrap.min.css">
<link rel="stylesheet" href="/css/style.css">
<link rel="stylesheet" href="/css/calendar.css">
<script src="/js/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $('.hidden').fadeIn(500).removeClass('hidden');
});
</script>
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
  <a href="/client_group" onclick="w3_close()" class="w3-padding w3-hover-text-light-grey">客户群管理</a>
  <a href="<?php echo wp_logout_url( home_url() ); ?>" onclick="w3_close()" class="w3-padding w3-hover-text-light-grey">登出</a>
   
</nav>

<!-- Overlay effect when opening sidenav on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px">

<!-- Header -->
<header class="w3-container w3-right-align crm-title-padding">
    <h3>欢迎您回来, <b><?php echo $current_user->user_login ?></b>!</h3>
</header>

<!-- Grid -->
<div class="w3-row">

<!-- MAIN -->
<div class="w3-col l8 s12">
<?php if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) { ?>
  <div class="w3-margin crm-box hidden">
    <div class="w3-container">
      <h4><b>Personal Infomation</b></h4>
    </div>
    <div class="w3-container">
        <table style="padding:10px;font-size:14px">
        <tbody>
        <tr>
        <td>Ref ID:</td>
        <td class="w3-opacity"><?php echo $row["ref_id"] ?></td>
        <td>电子邮件:</td>
        <td class="w3-opacity"><?php echo $row["user_email"] ?></td>
        </tr>
        <tr>
        <td>用户名:</td>
        <td class="w3-opacity"><?php echo $row["user_login"] ?></td>
        <td>联系电话:</td>
        <td class="w3-opacity"><?php echo $row["mobile_no"] ?></td>
        </tr>
        <tr>
        <td>姓名:</td>
        <td class="w3-opacity"><?php echo $row["user_name"] ?></td>
        <td>微信号:</td>
        <td class="w3-opacity"><?php echo $row["wechat_id"] ?></td>
        </tr>
        <tr>
        <td>职位:</td>
        <td class="w3-opacity"><?php echo $row["job_desc"] ?></td>
        <td>上级:</td>
        <td class="w3-opacity"><?php echo $row["ref_id_upper"] ?></td>
        </tr>
        </tbody>
        </table>
      <div class="w3-row">
        <div class="w3-col m8 s12">
        <p><button class="crm-box-btn w3-padding">更改个人资料</button></p>
        </div>
      </div>
    </div>
  </div>
<?php } } else { ?>
    <div class="w3-margin crm-box-error hidden">
    <div class="w3-container">
      <h4><b>Personal Infomation</b></h4>
    </div>
    <div class="w3-container">
    <div class="w3-center">
    <p>数据加载失败，请联系管理员!</p>
    <hr>
    <p><button class="crm-box-error-btn w3-padding">联系系统管理员</button></p>
    </div>
    </div>
  </div>
<?php } ?>
<hr>
<div class="w3-margin crm-box-bonus hidden">
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
 <?php if ($result2->num_rows > 0) {
    while($row2 = $result2->fetch_assoc()) { ?>
  <div class="w3-margin crm-box-bonus hidden">
    <div class="w3-container">
    <h4><b>Bonus</b></h4>
    </div>
    <div class="w3-container">
        <p>Balance: <strong>AU$<?php echo $row2["balance"] ?></strong></p>
    </div>
  </div>
<?php } } else { ?>
<div class="w3-margin crm-box-error hidden">
    <div class="w3-container">
    <h4><b>Bonus</b></h4>
    </div>
    <div class="w3-container">
        <div class="w3-center">
        <p>数据加载失败，请联系管理员!</p>
        <hr>
        <p><button class="crm-box-error-btn w3-padding">联系系统管理员</button></p>
        </div>
    </div>
  </div>
<?php } ?>
<hr>
<div class="w3-margin crm-box-search hidden">
    <div class="w3-container">
    <form method="post" action="/">
    <div class="w3-text-white w3-opacity">
        <div style="float:left;padding-top:7px"><i class="glyphicon glyphicon-search"></i></div><div style="float:left"><input class="w3-input crm-search-input" type="text" name="search_value" placeholder="CRM 数据库搜索"></div>
    </div>
    </form>
    </div>
  </div>
<hr>
  <div class="w3-margin crm-box-calendar hidden">
    <div class="w3-container">
    <h4><b>Calendar</b></h4>
    </div>
    <div class="w3-container crm-box-white">
    <?php echo $calendar->show(); ?>
    </div>
  </div>
  
<!-- END Sidebar -->
</div>
    
<!-- END GRID -->
</div>

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