<?php
/*
Template Name: sankofa-portal
*/
$current_user = wp_get_current_user();

if ( is_user_logged_in() ):
?>
<!DOCTYPE html>
<html>
<title>Sankofa 家族办公室</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/css/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="/css/font-awesome.min.css">
<link rel="stylesheet" href="/css/style.css">
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
  <a href="#portfolio" onclick="w3_close()" class="w3-padding w3-text-green w3-hover-text-light-grey">编辑个人资料</a>
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
    
<!-- Navbar (sit on top) -->
<div class="w3-top">
  <ul class="w3-navbar" id="myNavbar">
    <li><a href="/" class="w3-padding-large w3-text-dark-grey">首页</a></li>
      <li><a href="/services" class="w3-padding-large w3-text-dark-grey">产品信息</a></li>
      <li><a href="#" class="w3-padding-large w3-text-dark-grey">什么是家族办公室</a></li>
      <li><a href="/#our-team" class="w3-padding-large w3-text-dark-grey">团队介绍</a></li>
      <li><a href="/#sankofa-contact" class="w3-padding-large w3-text-dark-grey">联系我们</a></li>
  </ul>
</div>
<!-- Footer -->
<div class="footer-text w3-round-large w3-hover-black">
<p><img src="/images/warning.png"> Disclaimer: Any general advice in this material does not take into account you or your client‘s personal objectives, financial situation and needs. Please seek advice from a financial adviser or broker and read the relevant IM before making a decision in relation to any investment. In the event of any inconsistency or misinterpretation between the marketing material and SMFOs Pty Ltd.</p>
</div>

<footer class="w3-padding-12 w3-transparent">
    <a href="http://www.sankofafund.com.au"><img src="/images/logo_black.png"></a>
    <p class="w3-left-align">© 2016 <strong>SMFOs Pty Ltd</strong> (ACN 613532835), All rights reserved.</p>
</footer>
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
<script src="/js/index.js"></script>
<script src="/js/back.to.top.js"></script>
</body>
</html>
<?php
else: 
header( 'Location: /wp-admin' ) ;
endif;
?>