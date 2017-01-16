<?php
/*
Template Name: sankofa-estore
*/
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
var hidden1=false;var hidden2=false;var hidden3=false;var hidden4=false;setTimeout(function(){if($('.estore-bg').length>0){$('.estore-bg').remove()}},4000);$(function(){$('.estore-item1').click(function(){if(hidden1==false){$('.eitem1').animate({top:"-60px"});$('.estore-item1-hidden').fadeIn(500);hidden1=true}else{$('.eitem1').animate({top:"0"});$('.estore-item1-hidden').fadeOut(500);hidden1=false}});$('.estore-item2').click(function(){if(hidden2==false){$('.eitem2').animate({top:"-60px"});$('.estore-item2-hidden').fadeIn(500);hidden2=true}else{$('.eitem2').animate({top:"0"});$('.estore-item2-hidden').fadeOut(500);hidden2=false}});$('.estore-item3').click(function(){if(hidden3==false){$('.eitem3').animate({top:"-60px"});$('.estore-item3-hidden').fadeIn(500);hidden3=true}else{$('.eitem3').animate({top:"0"});$('.estore-item3-hidden').fadeOut(500);hidden3=false}});$('.estore-item4').click(function(){if(hidden4==false){$('.eitem4').animate({top:"-60px"});$('.estore-item4-hidden').fadeIn(500);hidden4=true}else{$('.eitem4').animate({top:"0"});$('.estore-item4-hidden').fadeOut(500);hidden4=false}})});
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
?>
</ul>
    
<div class="estore-content w3-content w3-container w3-text-dark-grey sankofa-product-box">
<div class="w3-row w3-center"><br>
<div class="w3-quarter eitem1">
<a href="#" class="estore-item1"><img src="/images/estore-icon1.png" style="width:45%;margin-bottom:10px" class="w3-circle w3-hover-opacity w3-hover-shadow estore-icon4"></a>
<h5>Trust Setup Service</h5>
<div class="estore-item1-hidden w3-white w3-card-2 w3-padding" style="border-radius:4px;opacity:.8"><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes.</p>
<button class="estore-btn4 w3-padding" style="margin-bottom:10px">Add to cart</button></div>
</div>

<div class="w3-quarter eitem2">
<a href="#" class="estore-item2"><img src="/images/estore-icon2.png" style="width:45%;margin-bottom:10px" class="w3-circle w3-hover-opacity w3-hover-shadow estore-icon2"></a>
<h5>Business Study Service</h5>
<div class="estore-item2-hidden w3-white w3-card-2 w3-padding" style="border-radius:4px;opacity:.8"><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes.</p>
<button class="estore-btn2 w3-padding" style="margin-bottom:10px">Add to cart</button></div>
</div>

<div class="w3-quarter eitem3">
<a href="#" class="estore-item3"><img src="/images/estore-icon3.png" style="width:45%;margin-bottom:10px" class="w3-circle w3-hover-opacity w3-hover-shadow estore-icon3"></a>
<h5>Expression of Interest</h5>
<div class="estore-item3-hidden w3-white w3-card-2 w3-padding" style="border-radius:4px;opacity:.8"><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes.</p>
<button class="estore-btn3 w3-padding" style="margin-bottom:10px">Add to cart</button></div>
</div>

<div class="w3-quarter eitem4">
<a href="#" class="estore-item4"><img src="/images/estore-icon4.png" style="width:45%;margin-bottom:10px" class="w3-circle w3-hover-opacity w3-hover-shadow estore-icon1"></a>
<h5>Online Payments</h5>
<div class="estore-item4-hidden w3-white w3-card-2 w3-padding" style="border-radius:4px;opacity:.8"><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes.</p>
<button class="estore-btn1 w3-padding" style="margin-bottom:10px">Add to cart</button></div>
</div>

</div>
</div>
<!-- Footer -->
<?php returnRights(2,"",""); ?>
</div>
</body>
</html>