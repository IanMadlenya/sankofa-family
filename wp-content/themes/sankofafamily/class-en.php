<!DOCTYPE html>
<?php
/*
Template Name: sankofa-class-en
*/
include 'disclaimer.php';
$cookie_name = "sk_lan";
$cookie_value = "";

if(!isset($_COOKIE[$cookie_name])) {
    $cookie_value = "en";
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), '/', 'www.smfos.com.au'); // 86400 = 1 day
} else {
    $cookie_value = $_COOKIE[$cookie_name];
    $var = $_GET['set'];
    if($cookie_value == "zh") {
        if($var == "en") {
            $cookie_value = "en";
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), '/', 'www.smfos.com.au'); // 86400 = 1 day
            header( 'Location: /class-en' );
        } else {
            header( 'Location: /class' );
        }
    } else { ?>
<html>
<head>
<title>Sankofa Multi-Family Offices</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
<link rel="stylesheet" href="/css/w3.css">
<link rel="stylesheet" href="/css/font-awesome.min.css">
<link rel="stylesheet" href="/css/style.css">
<script src="/js/jquery.min.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
</head>
<body>
    
<!-- Navbar (sit on top) -->
<div class="w3-top">
  <ul class="w3-navbar" id="myNavbar">
    <li><a href="/en" class="w3-padding-large w3-text-light-grey">Home</a></li>
      <li><a href="/services-en" class="w3-padding-large w3-text-light-grey">Products</a></li>
      <li><a href="#" class="w3-padding-large w3-text-light-grey">Definition of MFOs</a></li>
      <li><a href="/our-team-en" class="w3-padding-large w3-text-light-grey">Our team</a></li>
      <li><a href="/en#sankofa-contact" class="w3-padding-large w3-text-light-grey">Contact us</a></li>
    <li class="w3-hide-small w3-right">
      <a href="/class?set=zh" class="w3-padding-large w3-hover-green w3-text-light-grey">中文</a>
    </li>
  </ul>
</div>
    
<!-- Slideshow -->
<div class="w3-display-container w3-wide sankofa-product-preview w3-opacity2">
<img src="http://www.smfos.com.au/images/sydney1.jpg">
<div class="w3-display-bottomleft w3-text-white w3-container w3-padding-32 w3-hide-small">
<span class="w3-black w3-padding-large w3-animate-bottom w3-xlarge w3-text-light-grey">Sign Up WeChat Class</span>
</div>
</div>

<div class="w3-content w3-container w3-text-dark-grey sankofa-product-box" style="max-width:1100px;margin-top:80px;margin-bottom:80px">
<!-- Content -->
<form class="w3-container" method="post" action="/wp-content/themes/sankofafamily/insert.php">
<h3>Personal Information</h3>
  <p><input class="w3-input" type="text" name="clientname">
      <label class="w3-label w3-text-dark-grey">NAME (*required)</label></p>
  <p><input class="w3-input" type="text" name="mobile">
    <label class="w3-label w3-text-dark-grey">PHONE (*required)</label></p>
  <p><input class="w3-input" type="text" name="email">
    <label class="w3-label w3-text-dark-grey">E-MAIL (*required)</label></p>
    <p><input class="w3-input" type="text" name="wechatid">
    <label class="w3-label w3-text-dark-grey">WECHAT ID (*required)</label></p>
  <p><input class="w3-input" type="text" name="job">
    <label class="w3-label w3-text-dark-grey">OCCUPATION</label></p>
<p><input class="w3-radio" type="radio" name="gender" value="1" checked>
<label class="w3-text-dark-grey">MALE</label></p>
    <p><input class="w3-radio" type="radio" name="gender" value="0">
<label class="w3-text-dark-grey">FEMALE</label></p>
<br>
<h3>Topics of Interest</h3>
<div class="w3-half">
<p><input class="w3-check" type="checkbox" name="familytrust" value="yes" checked="checked">
<label class="w3-text-dark-grey">Family Trust</label></p>
<p><input class="w3-check" type="checkbox" name="immi" value="yes" checked="checked">
<label class="w3-text-dark-grey">Immigration</label></p>
<p><input class="w3-check" type="checkbox" name="study" value="yes" checked="checked">
<label class="w3-text-dark-grey">Overseas Studies</label></p>
<p><input class="w3-check" type="checkbox" name="property" value="yes" checked="checked">
<label class="w3-text-dark-grey">Overseas Properties</label></p>
</div>
<div class="w3-half">
<p><input class="w3-check" type="checkbox" name="forex" value="yes" checked="checked">
<label class="w3-text-dark-grey">Foreign Exchange</label></p>
<p><input class="w3-check" type="checkbox" name="trustfund" value="yes" checked="checked">
<label class="w3-text-dark-grey">Fund Investment</label></p>
<p><input class="w3-check" type="checkbox" name="cooperate" value="yes" checked="checked">
<label class="w3-text-dark-grey">Our Business Partners</label></p>
<p><input class="w3-check" type="checkbox" name="others" value="yes" checked="checked">
<label class="w3-text-dark-grey">Others</label></p>
</div>
<p><input type="submit" class="w3-btn w3-hover-light-grey w3-section w3-left" value="Submit"></p>
</form>

<!-- Below Box -->
</div>
<div class="w3-content w3-container w3-text-dark-grey sankofa-product-box" style="max-width:1100px;margin-top:80px;margin-bottom:80px">

<table class="w3-center w3-text-dark-grey">
<tr>
<td><img src="http://www.smfos.com.au/images/verified-text-paper.png" style="width:90px"></td>
<td class="w3-border-left w3-border-right"><img src="http://www.smfos.com.au/images/customer-service.png" style="width:90px"></td>
<td><img src="http://www.smfos.com.au/images/cloud-computing.png" style="width:90px"></td>
</tr>
<tr>
<td class="table-heading" style="height:90px">在线申请</td>
<td class="table-heading w3-border-left w3-border-right" style="height:90px">客服热线</td>
<td class="table-heading" style="height:90px">资料下载</td>
</tr>
<tr>
<td style="height:50px"><button class="w3-btn w3-hover-light-grey w3-medium">立即申请</button></td>
<td class="table-middle w3-border-left w3-border-right" style="height:50px"><h2 class="w3-center">+61 (2) 8065 2830</h2></td>
<td style="height: 50px;"><a class="w3-btn w3-hover-light-grey w3-medium" href="/downloads">下载 PDF</a></td>
</tr>
</table>
</div>

<!-- Footer -->
<div class="footer-text w3-round-large w3-hover-black">
<p><img src="/images/warning.png"> <?php echo $disclaimer; ?></p>
</div>

<footer class="w3-padding-12 w3-transparent">
    <a href="http://www.sankofafund.com.au"><img src="/images/logo_black.png"></a>
    <p class="w3-left-align">© <?php echo date("Y"); ?> <strong>SMFOs Pty Ltd</strong> (ABN 41 613 532 835), All rights reserved.</p>
</footer>
<script>
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
<a href="#0" class="cd-top">Top</a>
</body>
</html>
<?php } } ?>