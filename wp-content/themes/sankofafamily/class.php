<?php
/*
Template Name: sankofa-class
*/
$current_user = wp_get_current_user();
?>
<!DOCTYPE HTML>  
<html>
<head>
<title>Sankofa 家族办公室</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
<link rel="stylesheet" href="/css/w3.css">
<link rel="stylesheet" href="/css/font-awesome.min.css">
<link rel="stylesheet" href="/css/style.css">
<script src="/js/jquery.min.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<style>
.error {color: #FF0000;}
tr{margin-bottom: 5px}
</style>
</head>
<body>  

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <ul class="w3-navbar" id="myNavbar">
    <li><a href="/" class="w3-padding-large w3-text-dark-grey">首页</a></li>
      <li><a href="/services" class="w3-padding-large w3-text-dark-grey">产品信息</a></li>
      <li><a href="#" class="w3-padding-large w3-text-dark-grey">什么是家族办公室</a></li>
      <li><a href="/#our-team" class="w3-padding-large w3-text-dark-grey">团队介绍</a></li>
      <li><a href="/#sankofa-contact" class="w3-padding-large w3-text-dark-grey">联系我们</a></li>
    <li class="w3-hide-small w3-right">
      <?php if ( is_user_logged_in() ): ?>
        <a href="/wp-admin" class="w3-padding-large w3-hover-green w3-text-dark-grey"><?php echo $current_user->user_login ?></a>
        <?php else: ?>
      <a href="/wp-admin" class="w3-padding-large w3-hover-green w3-text-dark-grey">登录</a>
        <?php endif; ?>
    </li>
  </ul>
</div>

<!-- Slideshow -->
  <div class="w3-display-container w3-wide sankofa-product-preview w3-opacity">
    <img src="http://www.smfos.com.au/images/oceanroad.jpg">
    <div class="w3-display-bottomleft w3-text-white w3-container w3-padding-32 w3-hide-small">
      <span class="w3-black w3-padding-large w3-animate-bottom w3-xlarge w3-text-light-grey">微信课堂登记</span>
    </div>
  </div>

<div class="w3-content w3-container w3-text-dark-grey sankofa-product-box" style="max-width:1100px;margin-top:80px;margin-bottom:80px">
<!-- Content -->
<form method="post" action="/insert.php">
<table>
<tr>
    <td>客户姓名:</td>
    <td><input type="text" name="clientname"></td>
    </tr>
<tr>
    <td>联系电话:</td>
    <td><input type="text" name="mobile"></td>
    </tr>
<tr>
<td>E-mail:</td>
<td><input type="text" name="email"></td>
</tr>
<tr>
    <td>职业:</td>
    <td><input type="text" name="job"></td>
    </tr>
    <tr>
    <td>性别:</td>
    <td><input type="radio" name="gender" value="1">男<input type="radio" name="gender" value="0">女
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" name="submit" value="Submit"></td>
    </tr>
    </table>
</form>

</div>
<!-- Footer -->
<div class="footer-text w3-round-large w3-hover-black">
  <p><img src="/images/warning.png"> Disclaimer: Any general advice in this material does not take into account you or your client‘s personal objectives, financial situation and needs. Please seek advice from a financial adviser or broker and read the relevant IM before making a decision in relation to any investment. In the event of any inconsistency or misinterpretation between the marketing material and SMFOs Pty Ltd.</p>
</div>

<footer class="w3-padding-12">
    <a href="http://www.sankofafund.com.au"><img src="/images/logo_black.png"></a>
    <p class="w3-left-align">© 2016 <strong>SMFOs Pty Ltd</strong> (ACN 613532835), All rights reserved.</p>
</footer>
<script src="/js/back.to.top.js"></script>
<a href="#0" class="cd-top">Top</a>
    
</body>
</html>
