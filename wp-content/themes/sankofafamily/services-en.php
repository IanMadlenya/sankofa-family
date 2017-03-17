<!DOCTYPE html>
<?php
/*
Template Name: sankofa-services-en
*/
session_start();
require_once('DBConnect.php');
require_once('navbar.php');
require_once('footer-rights.php');
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
            header( 'Location: /services-en' );
        } else {
            header( 'Location: /services' );
        }
    } else { ?>
<html>
<head>
<title>Sankofa Multi-Family Offices</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
<link rel="stylesheet" href="/css/w3.css">
<link rel="stylesheet" href="/css/font-awesome.min.css">
<link rel="stylesheet" href="/css/hexagon.css">
<link rel="stylesheet" href="/css/style.css">
<link rel="stylesheet" href="/css/vegas.min.css">
<script src="/js/jquery.min.js"></script>
<script src="/js/vegas.min.js"></script>
<script>
    $(document).ready(function(){
        if($('.sf-dropdown').width() > 200) {
            $('.sf-dropdown-content').css('margin-left',$('.sf-dropdown').width()-200);
        }
    });
</script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
</head>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
<ul class="w3-navbar" id="myNavbar">
<?php 
echo navMenu($cookie_value);
if (isset($_SESSION['esusername'])) {
    navMenuLogin(0,$cookie_value,$_SESSION['esusername']);
} else {
    navMenuLogin(0,$cookie_value,"");
}
?>
</ul>
</div>

<div class="w3-content w3-container">
<div class="sankofa-center w3-animate-opacity-sankofa-products">
<div class="row w3-center">
<a href="/sankofa-invest-en/"><div class="hexagon">
<div class="outer">
<div class="inner money-en">
</div>
</div>
</div></a>
<a href="/sankofa-property-en/"><div class="hexagon even">
<div class="outer">
<div class="inner property-en">
</div>
</div>
</div></a>
<a href="/sankofa-family-en/"><div class="hexagon">
<div class="outer">
<div class="inner family-en">
</div>
</div>
</div></a>
<a href="/sankofa-study-en/"><div class="hexagon even">
<div class="outer">
<div class="inner study-en">
</div>
</div>
</div></a>
<a href="/sankofa-heritage-en/"><div class="hexagon">
<div class="outer">
<div class="inner heritage-en">
</div>
</div>
</div></a>
</div>
<div class="row w3-center">
<a href="/sankofa-exchange-en/"><div class="hexagon">
<div class="outer">
<div class="inner forex-en">
</div>
</div>
</div></a>
<a href="/sankofa-immi-en/"><div class="hexagon fixhexagon">
<div class="outer">
<div class="inner immi-en">
</div>
</div>
</div></a>
<a href="/sankofa-tax-en/"><div class="hexagon fixhexagon">
<div class="outer">
<div class="inner tax-en">
</div>
</div>
</div></a>
</div>
<div class="row w3-center">
<a href="/sankofa-trade-en/"><div class="hexagon fixhexagon">
<div class="outer">
<div class="inner trade-en">
</div>
</div>
</div></a>
</div>
</div>
</div>
    
<!-- Footer -->
<?php returnRights(1,"en","/services?set=zh"); ?>
<script src="/js/services.js"></script>
<script src="/js/back.to.top.js"></script>
<a href="#0" class="cd-top">Top</a>
</body>
</html>
<?php } } ?>