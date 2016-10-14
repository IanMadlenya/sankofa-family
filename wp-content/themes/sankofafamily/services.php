<?php
/*
Template Name: sankofa-services
*/
$current_user = wp_get_current_user();
?>
<!DOCTYPE html>
<html>
<head>
<title>Sankofa 家族办公室</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
<link rel="stylesheet" href="/css/w3.css">
<link rel="stylesheet" href="/css/font-awesome.min.css">
<link rel="stylesheet" href="/css/hexagon.css">
<link rel="stylesheet" href="/css/style.css">
<link rel="stylesheet" href="/css/vegas.min.css">
<script src="/js/jquery.min.js"></script>
<script src="/js/vegas.min.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
</head>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <ul class="w3-navbar" id="myNavbar">
    <li><a href="/index.html" class="w3-padding-large w3-text-light-grey">首页</a></li>
      <li><a href="/services" class="w3-padding-large w3-text-light-grey">产品信息</a></li>
      <li><a href="#" class="w3-padding-large w3-text-light-grey">什么是家族办公室</a></li>
      <li><a href="/index.html#our-team" class="w3-padding-large w3-text-light-grey">团队介绍</a></li>
      <li><a href="/index.html#sankofa-contact" class="w3-padding-large w3-text-light-grey">联系我们</a></li>
    <li class="w3-hide-small w3-right">
        <?php if ( is_user_logged_in() ): ?>
        <a href="#" class="w3-padding-large w3-dark-grey w3-hover-green w3-text-light-grey"><?php echo $current_user->user_login ?></a>
        <?php else: ?>
      <a href="/wp-admin" class="w3-padding-large w3-dark-grey w3-hover-green w3-text-light-grey">登录</a>
        <?php endif; ?>
    </li>
  </ul>
</div>

<div class="w3-content w3-container">
<div class="sankofa-center w3-animate-opacity-sankofa-products">
<div class="row w3-center">
			
			<div class="hexagon">
				<div class="outer">
					<div class="inner money">
						<div class="textWrapper">
							<div class="text2">“跨国投资、海外并购、精选项目、完成投资”</div>
                            <a class="w3-btn w3-hover-dark-grey w3-transparent w3-text-dark-grey w3-medium hexagon-button" href="http://www.smfos.com.au/sankofa-invest/">详细介绍</a>
						</div>
					</div>
				</div>
			</div>
			
			<div class="hexagon even">
				<div class="outer">
					<div class="inner property">
						<div class="textWrapper">
							<div class="text2">提供澳洲别墅、公寓、农庄等房源，助您职业成功</div>
                            <a class="w3-btn w3-hover-dark-grey w3-transparent w3-text-dark-grey w3-medium hexagon-button" href="http://www.smfos.com.au/sankofa-property/">详细介绍</a>
						</div>
					</div>
				</div>
			</div>
			
			<div class="hexagon">
				<div class="outer">
					<div class="inner family">
						<div class="textWrapper">
							<div class="text">“财富管家，百年传承; 服务超高净值客户”</div>
                            <a class="w3-btn w3-hover-dark-grey w3-transparent w3-text-dark-grey w3-medium hexagon-button" href="http://www.smfos.com.au/sankofa-family/">详细介绍</a>
						</div>
					</div>
				</div>
			</div>
    
    <div class="hexagon even">
				<div class="outer">
					<div class="inner study">
						<div class="textWrapper">
							<div class="text2">“儿行千里母担忧，从此留学不再愁” - (留学家庭的“头等舱”)</div>
                            <a class="w3-btn w3-hover-dark-grey w3-transparent w3-text-dark-grey w3-medium hexagon-button" href="http://www.smfos.com.au/sankofa-study/">详细介绍</a>
						</div>
					</div>
				</div>
			</div>		
    
    <div class="hexagon">
				<div class="outer">
					<div class="inner heritage">
						<div class="textWrapper">
							<div class="text">帮助客户设立遗产信托，并负责遗产管理</div>
                            <a class="w3-btn w3-hover-dark-grey w3-transparent w3-text-dark-grey w3-medium hexagon-button" href="http://www.smfos.com.au/sankofa-heritage/">详细介绍</a>
						</div>
					</div>
				</div>
			</div>
			
		</div>

<div class="row w3-center">
    
    <div class="hexagon">
				<div class="outer">
					<div class="inner forex">
						<div class="textWrapper">
							<div class="text">提供客户合法换汇通道，设计换汇方案</div>
                            <a class="w3-btn w3-hover-dark-grey w3-transparent w3-text-dark-grey w3-medium hexagon-button" href="http://www.smfos.com.au/sankofa-exchange/">详细介绍</a>
						</div>
					</div>
				</div>
			</div>
    
    <div class="hexagon fixhexagon">
				<div class="outer">
					<div class="inner immi">
						<div class="textWrapper">
							<div class="text2">“移民信托，人才两移” - 私人订制的移民签证与投资方案</div>
                            <a class="w3-btn w3-hover-dark-grey w3-transparent w3-text-dark-grey w3-medium hexagon-button" href="http://www.smfos.com.au/sankofa-immi/">详细介绍</a>
						</div>
					</div>
				</div>
			</div>
    
    <div class="hexagon fixhexagon">
				<div class="outer">
					<div class="inner tax">
						<div class="textWrapper">
							<div class="text">提供客户税务咨询、税务管理方案、合法避税</div>
                            <a class="w3-btn w3-hover-dark-grey w3-transparent w3-text-dark-grey w3-medium hexagon-button" href="http://www.smfos.com.au/sankofa-tax/">详细介绍</a>
						</div>
					</div>
				</div>
			</div>
    
		</div>
    </div>
    </div>
    
<!-- Footer -->
<div class="footer-text w3-round-large w3-hover-black">
<p><img src="/images/warning.png"> Disclaimer: Any general advice in this material does not take into account you or your client‘s personal objectives, financial situation and needs. Please seek advice from a financial adviser or broker and read the relevant IM before making a decision in relation to any investment. In the event of any inconsistency or misinterpretation between the marketing material and SMFOs Pty Ltd.</p>
</div>

<footer class="w3-padding-12 w3-transparent">
    <a href="http://www.sankofafund.com.au"><img src="/images/logo.png"></a>
    <p class="w3-left-align w3-text-white">© 2016 <strong>SMFOs Pty Ltd</strong> (ACN 613532835), All rights reserved.</p>
</footer>
<script src="/js/services.js"></script>
<script src="/js/back.to.top.js"></script>
<a href="#0" class="cd-top">Top</a>
</body>
</html>
