<?php
$current_user = wp_get_current_user();
?>
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
</head>
<body>
    
<!-- Navbar (sit on top) -->
<div class="w3-top">
  <ul class="w3-navbar" id="myNavbar">
    <li><a href="/index.html" class="w3-padding-large w3-text-dark-grey">首页</a></li>
      <li><a href="/services" class="w3-padding-large w3-text-dark-grey">产品信息</a></li>
      <li><a href="#" class="w3-padding-large w3-text-dark-grey">什么是家族办公室</a></li>
      <li><a href="/index.html#our-team" class="w3-padding-large w3-text-dark-grey">团队介绍</a></li>
      <li><a href="/index.html#sankofa-contact" class="w3-padding-large w3-text-dark-grey">联系我们</a></li>
    <li class="w3-hide-small w3-right">
      <?php if ( is_user_logged_in() ): ?>
        <a href="#" class="w3-padding-large w3-hover-green w3-text-light-grey"><?php echo $current_user->user_login ?></a>
        <?php else: ?>
      <a href="/wp-admin" class="w3-padding-large w3-hover-green w3-text-light-grey">登录</a>
        <?php endif; ?>
    </li>
  </ul>
</div>