<?php
/*
Template Name: sankofa-estore
*/
include 'footer-rights-estore.php';
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
setTimeout(function(){
if ($('.estore-bg').length > 0) {
  $('.estore-bg').remove();
}
}, 3000);
setTimeout(function(){
if ($('.estore-content').length > 0) {
    $('.estore-content').fadeIn(1000);
}
}, 3000);
</script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
</head>
<body>
<div class="estore-bg w3-display-container w3-animate-opacity w3-text-white">
  <div class="w3-display-bottomleft w3-padding-large">
    <h1 class="w3-jumbo w3-animate-bottom">Welcome to eStore</h1>
    <p class="w3-large">Initializing...</p>
  </div>
</div>

<!-- Navbar (sit on top) -->
<div class="estore-nav w3-top">
  <ul class="w3-navbar" id="myNavbar">
<?php if($cookie_value == "zh") { ?>
    <li><a href="/" class="w3-padding-large w3-text-dark-grey">首页</a></li>
      <li><a href="/services" class="w3-padding-large w3-text-dark-grey">产品信息</a></li>
      <li><a href="#" class="w3-padding-large w3-text-dark-grey">eStore</a></li>
      <li><a href="/our-team" class="w3-padding-large w3-text-dark-grey">团队介绍</a></li>
      <li><a href="/#sankofa-contact" class="w3-padding-large w3-text-dark-grey">联系我们</a></li>
<?php } else { ?>
    <li><a href="/en" class="w3-padding-large w3-text-dark-grey">Home</a></li>
      <li><a href="/services-en" class="w3-padding-large w3-text-dark-grey">Products</a></li>
      <li><a href="#" class="w3-padding-large w3-text-dark-grey">eStore</a></li>
      <li><a href="/our-team-en" class="w3-padding-large w3-text-dark-grey">Our team</a></li>
      <li><a href="/en#sankofa-contact" class="w3-padding-large w3-text-dark-grey">Contact us</a></li>
<?php } ?>
  </ul>
</div>
    
<div class="estore-content w3-content w3-container w3-text-dark-grey sankofa-product-box" style="max-width:1100px;margin-top:200px;margin-bottom:15%">
<div class="w3-row w3-center"><br>
<div class="w3-quarter">
  <img src="/w3images/avatar.jpg" style="width:45%;margin-bottom:10px" class="w3-circle w3-hover-opacity w3-hover-shadow">
  <h5>Trust Setup Service</h5>
  <p>Web Designer</p>
<button class="w3-btn w3-hover-light-grey w3-medium">Add to cart</button>
</div>

<div class="w3-quarter">
  <img src="/w3images/avatar.jpg" style="width:45%;margin-bottom:10px" class="w3-circle w3-hover-opacity w3-hover-shadow">
  <h5>Business Study Service</h5>
  <p>Support</p>
<button class="w3-btn w3-hover-light-grey w3-medium">Add to cart</button>
</div>

<div class="w3-quarter">
  <img src="/w3images/avatar.jpg" style="width:45%;margin-bottom:10px" class="w3-circle w3-hover-opacity w3-hover-shadow">
  <h5>Expression of Interest</h5>
  <p>Boss man</p>
<button class="w3-btn w3-hover-light-grey w3-medium">Add to cart</button>
</div>

<div class="w3-quarter">
  <img src="/w3images/avatar.jpg" style="width:45%;margin-bottom:10px" class="w3-circle w3-hover-opacity w3-hover-shadow">
  <h5>Online Payments</h5>
  <p>Fixer</p>
<button class="w3-btn w3-hover-light-grey w3-medium">Add to cart</button>
</div>

</div>
<!-- Footer -->
<?php echo $rights; ?>
</div>
</body>
</html>