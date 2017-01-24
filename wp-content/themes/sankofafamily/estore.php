<!DOCTYPE html>
<?php
/*
Template Name: sankofa-estore
*/
$current_user = wp_get_current_user();
include 'navbar.php';
include 'footer-rights.php';
$cookie_name = "sk_lan";
$cookie_value = "";
$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

if(!isset($_COOKIE[$cookie_name])) {
    if($lang == "zh") {
        $cookie_value = "zh";
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), '/', 'www.smfos.com.au'); // 86400 = 1 day
    }
    else {
        $cookie_value = "en";
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), '/', 'www.smfos.com.au'); // 86400 = 1 day
    }
} else {
    $cookie_value = $_COOKIE[$cookie_name];
} ?>
<html>
<head>
<?php if($cookie_value == "zh") { ?>
<title>Sankofa 家族办公室</title>
<?php } else { ?>
<title>Sankofa Multi-Family Offices</title>
<?php } ?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
<link rel="stylesheet" href="/css/w3.css">
<link rel="stylesheet" href="/css/font-awesome.min.css">
<link rel="stylesheet" href="/css/style.css">
<script src="/js/jquery.min.js"></script>
<script>
var hidden1=!1,hidden2=!1,hidden3=!1;setTimeout(function(){$(".estore-bg").length>0&&$(".estore-bg").remove()},4e3),$(function(){$(".estore-item1").click(function(){0==hidden1?($(".eitem1").animate({top:"-60px"}),$(".estore-item1-hidden").fadeIn(500),hidden2=!1,$(".eitem2").animate({top:"0"}),$(".estore-item2-hidden").fadeOut(500),hidden3=!1,$(".eitem3").animate({top:"0"}),$(".estore-item3-hidden").fadeOut(500),hidden1=!0):($(".eitem1").animate({top:"0"}),$(".estore-item1-hidden").fadeOut(500),hidden1=!1)}),$(".estore-item2").click(function(){0==hidden2?($(".eitem2").animate({top:"-60px"}),$(".estore-item2-hidden").fadeIn(500),hidden1=!1,$(".eitem1").animate({top:"0"}),$(".estore-item1-hidden").fadeOut(500),hidden3=!1,$(".eitem3").animate({top:"0"}),$(".estore-item3-hidden").fadeOut(500),hidden2=!0):($(".eitem2").animate({top:"0"}),$(".estore-item2-hidden").fadeOut(500),hidden2=!1)}),$(".estore-item3").click(function(){0==hidden3?($(".eitem3").animate({top:"-60px"}),$(".estore-item3-hidden").fadeIn(500),hidden1=!1,$(".eitem1").animate({top:"0"}),$(".estore-item1-hidden").fadeOut(500),hidden2=!1,$(".eitem2").animate({top:"0"}),$(".estore-item2-hidden").fadeOut(500),hidden3=!0):($(".eitem3").animate({top:"0"}),$(".estore-item3-hidden").fadeOut(500),hidden3=!1)})}),$(document).ready(function(){$(".estore-btn1").click(function(){$(".estore-dialog1").fadeIn(500)}),$(".estore-btn2").click(function(){$(".estore-dialog2").fadeIn(500)}),$(".estore-btn3").click(function(){$(".estore-dialog3").fadeIn(500)}),$(".estore-dialog-close").click(function(){$(".estore-dialog1").fadeOut(500),$(".estore-dialog2").fadeOut(500),$(".estore-dialog3").fadeOut(500)})});
</script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
</head>
<body>
<div class="estore-bg w3-display-container w3-animate-opacity w3-text-white">
  <div class="w3-display-bottomleft w3-padding-large">
    <h1 class="w3-jumbo w3-animate-bottom">Welcome to eStore</h1>
    <p class="w3-large w3-animate-bottom">Initializing...</p>
  </div>
</div>

<!-- Navbar (sit on top) -->
<div class="estore-bg2 w3-top">
<ul class="w3-navbar" id="myNavbar">
<?php
$new_cookie_value = $cookie_value . "_estore";
echo navMenu($new_cookie_value);
if ( $current_user->exists() ) {
    navMenuLogin(1,$current_user->user_login);
} else {
    navMenuLogin(1,$cookie_value);
}
?>
</ul>
    
<div class="estore-content w3-content w3-container w3-text-dark-grey sankofa-product-box">
<div class="w3-row w3-center"><br>
<div class="w3-third eitem1">
<a href="#" class="estore-item1"><img src="/images/estore-icon1.png" style="width:45%;margin-bottom:10px" class="w3-circle w3-hover-opacity w3-hover-shadow estore-icon1"></a>
<h5>Trust Setup Service</h5>
<div class="estore-item1-hidden w3-white w3-card-2 w3-padding" style="border-radius:4px;opacity:.8"><h4>AU$5000</h4><p>Online Consulting Service for setting up a Discretionary Trust.</p>
<button class="estore-btn1 w3-padding" style="margin-bottom:10px">More details</button></div>
</div>

<div class="w3-third eitem2">
<a href="#" class="estore-item2"><img src="/images/estore-icon2.png" style="width:45%;margin-bottom:10px" class="w3-circle w3-hover-opacity w3-hover-shadow estore-icon2"></a>
<h5>Business Study Service</h5>
<div class="estore-item2-hidden w3-white w3-card-2 w3-padding" style="border-radius:4px;opacity:.8"><h4>AU$5000</h4><p>Online Consulting Services for people who are interest in visiting Australia for business purposes.</p>
<button class="estore-btn2 w3-padding" style="margin-bottom:10px">More details</button></div>
</div>

<div class="w3-third eitem3">
<a href="#" class="estore-item3"><img src="/images/estore-icon3.png" style="width:45%;margin-bottom:10px" class="w3-circle w3-hover-opacity w3-hover-shadow estore-icon3"></a>
<h5>Expression of Interest</h5>
<div class="estore-item3-hidden w3-white w3-card-2 w3-padding" style="border-radius:4px;opacity:.8"><h4>AU$5000</h4><p>Taking your EOI as your deposit in advance for securing your privilege of our consulting services.</p>
<button class="estore-btn3 w3-padding" style="margin-bottom:10px">More details</button></div>
</div>

</div>
</div>

<div class="estore-dialog1">
<div class="estore-dialog-content1">
<img src="/images/estore-icon1c.png" style="width:20%;margin-top:3%" class="w3-circle estore-icon">
<a href="#" class="estore-dialog-close w3-hover-opacity"><img src="/images/close.png" style="width:25px"></a>
<div class="estore-dialog-text">
<h4>Trust Setup Service</h4>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
</div>
<div class="w3-center">
<button class="estore-btn1c w3-padding">Add to cart</button>
</div>
</div>
</div>

<div class="estore-dialog2">
<div class="estore-dialog-content2">
<img src="/images/estore-icon2c.png" style="width:20%;margin-top:3%" class="w3-circle estore-icon">
<a href="#" class="estore-dialog-close w3-hover-opacity"><img src="/images/close.png" style="width:25px"></a>
<div class="estore-dialog-text">
<h4>Business Study Service</h4>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
</div>
<div class="w3-center">
<button class="estore-btn2c w3-padding">Add to cart</button>
</div>
</div>
</div>
    
<div class="estore-dialog3">
<div class="estore-dialog-content3">
<img src="/images/estore-icon3c.png" style="width:20%;margin-top:3%" class="w3-circle estore-icon">
<a href="#" class="estore-dialog-close w3-hover-opacity"><img src="/images/close.png" style="width:25px"></a>
<div class="estore-dialog-text">
<h4>Expression of Interest</h4>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
</div>
<div class="w3-center">
<button class="estore-btn3c w3-padding">Add to cart</button>
</div>
</div>
</div>

<!-- Footer -->
<?php returnRights(2,"",""); ?>
</div>
</body>
</html>