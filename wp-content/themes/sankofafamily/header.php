<!DOCTYPE html>
<?php
session_start();
require_once('DBConnect.php');
require_once('navbar.php');
$page_title = $wp_query->post->post_title;
$url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
$escaped_url = htmlspecialchars( $url, ENT_QUOTES, 'UTF-8' );
$cookie_name = "sk_lan";
$cookie_value = "";

if(!isset($_COOKIE[$cookie_name])) {
    if(substr_count($escaped_url , "-en") == 0) {
        $cookie_value = "zh";
    } else {
        $cookie_value = "en";
    }
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), '/', 'www.smfos.com.au'); // 86400 = 1 day
} else {
    $cookie_value = $_COOKIE[$cookie_name];
    $var = $_GET['set'];
    if($cookie_value == "en") {
        if($var == "zh") {
            $cookie_value = "zh";
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), '/', 'www.smfos.com.au'); // 86400 = 1 day
            header( 'Location: ' . rtrim($escaped_url, "?set=zh") );
        }
    } else {
        if($var == "en") {
            $cookie_value = "en";
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), '/', 'www.smfos.com.au'); // 86400 = 1 day
            header( 'Location: ' . str_replace('/?set=en', '/', $escaped_url) );
        }
    }
}
?>
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
    
<!-- Slideshow -->
<div class="w3-display-container w3-wide sankofa-product-preview w3-opacity2">
<img src="/images/sydney1.jpg">
<div class="w3-display-bottomleft w3-text-white w3-container w3-padding-32 w3-hide-small">
<span class="w3-black w3-padding-large w3-animate-bottom w3-xlarge w3-text-light-grey"><?php echo $page_title ?></span>
</div>
</div>

<div class="w3-content w3-container w3-text-dark-grey sankofa-product-box" style="max-width:1100px;margin-top:80px;margin-bottom:80px">