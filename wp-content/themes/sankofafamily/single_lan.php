<?php
/*
Template Name: sankofa-single-language
*/
include 'footer-rights.php';
$page_title = $wp_query->post->post_title;
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
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
</head>
<body>
    
<!-- Navbar (sit on top) -->
<div class="w3-top">
  <ul class="w3-navbar" id="myNavbar">
<?php if($cookie_value == "zh") { ?>
    <li><a href="/" class="w3-padding-large w3-text-light-grey">首页</a></li>
      <li><a href="/services" class="w3-padding-large w3-text-light-grey">产品信息</a></li>
      <li><a href="/estore" class="w3-padding-large w3-text-light-grey">eStore</a></li>
      <li><a href="/our-team" class="w3-padding-large w3-text-light-grey">团队介绍</a></li>
      <li><a href="/#sankofa-contact" class="w3-padding-large w3-text-light-grey">联系我们</a></li>
<?php } else { ?>
    <li><a href="/en" class="w3-padding-large w3-text-light-grey">Home</a></li>
      <li><a href="/services-en" class="w3-padding-large w3-text-light-grey">Products</a></li>
      <li><a href="/estore" class="w3-padding-large w3-text-light-grey">eStore</a></li>
      <li><a href="/our-team-en" class="w3-padding-large w3-text-light-grey">Our team</a></li>
      <li><a href="/en#sankofa-contact" class="w3-padding-large w3-text-light-grey">Contact us</a></li>
<?php } ?>
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
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<p><?php the_content(__('(more...)')); ?></p>
<hr> <?php endwhile; else:
header( 'Location: /notfound' ) ;
endif; ?>
<hr>
<!-- Below Box -->
</div>
<div class="w3-content w3-container w3-text-dark-grey sankofa-product-box" style="max-width:1100px;margin-top:80px;margin-bottom:80px">

<table class="w3-center w3-text-dark-grey">
<tr>
<td><img src="/images/verified-text-paper.png" style="width:90px"></td>
<td class="w3-border-left w3-border-right"><img src="/images/customer-service.png" style="width:90px"></td>
<td><img src="/images/cloud-computing.png" style="width:90px"></td>
</tr>
<?php
if($cookie_value == "zh") {
?>
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
<?php } else { ?>
<tr>
<td class="table-heading" style="height:90px">Online Application</td>
<td class="table-heading w3-border-left w3-border-right" style="height:90px">Customer Hotline</td>
<td class="table-heading" style="height:90px">Download Section</td>
</tr>
<tr>
<td style="height:50px"><button class="w3-btn w3-hover-light-grey w3-medium">Apply online</button></td>
<td class="table-middle w3-border-left w3-border-right" style="height:50px"><h2 class="w3-center">+61 (2) 8065 2830</h2></td>
<td style="height: 50px;"><a class="w3-btn w3-hover-light-grey w3-medium" href="/downloads">Download PDFs</a></td>
</tr>
<?php } ?>
</table>
</div>

<!-- Footer -->
<?php returnRights(4,"",""); ?>
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