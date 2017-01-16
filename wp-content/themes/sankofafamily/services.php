<!DOCTYPE html>
<?php
/*
Template Name: sankofa-services
*/
include 'navbar.php';
include 'footer-rights.php';
$cookie_name = "sk_lan";
$cookie_value = "";

if(!isset($_COOKIE[$cookie_name])) {
    $cookie_value = "zh";
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), '/', 'www.smfos.com.au'); // 86400 = 1 day
} else {
    $cookie_value = $_COOKIE[$cookie_name];
    $var = $_GET['set'];
    if($cookie_value == "en") {
        if($var == "zh") {
            $cookie_value = "zh";
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), '/', 'www.smfos.com.au'); // 86400 = 1 day
            header( 'Location: /services' );
        } else {
            header( 'Location: /services-en' );
        }
    } else { ?>
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
<?php echo navMenu($cookie_value); ?>
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
                            <a class="w3-btn w3-hover-dark-grey w3-transparent w3-text-dark-grey w3-medium hexagon-button" href="/sankofa-invest/">详细介绍</a>
						</div>
					</div>
				</div>
			</div>
			
			<div class="hexagon even">
				<div class="outer">
					<div class="inner property">
						<div class="textWrapper">
							<div class="text2">提供澳洲别墅、公寓、农庄等房源，助您职业成功</div>
                            <a class="w3-btn w3-hover-dark-grey w3-transparent w3-text-dark-grey w3-medium hexagon-button" href="/sankofa-property/">详细介绍</a>
						</div>
					</div>
				</div>
			</div>
			
			<div class="hexagon">
				<div class="outer">
					<div class="inner family">
						<div class="textWrapper">
							<div class="text">“财富管家，百年传承; 服务超高净值客户”</div>
                            <a class="w3-btn w3-hover-dark-grey w3-transparent w3-text-dark-grey w3-medium hexagon-button" href="/sankofa-family/">详细介绍</a>
						</div>
					</div>
				</div>
			</div>
    
    <div class="hexagon even">
				<div class="outer">
					<div class="inner study">
						<div class="textWrapper">
							<div class="text2">“儿行千里母担忧，从此留学不再愁” - (留学家庭的“头等舱”)</div>
                            <a class="w3-btn w3-hover-dark-grey w3-transparent w3-text-dark-grey w3-medium hexagon-button" href="/sankofa-study/">详细介绍</a>
						</div>
					</div>
				</div>
			</div>		
    
    <div class="hexagon">
				<div class="outer">
					<div class="inner heritage">
						<div class="textWrapper">
							<div class="text">帮助客户设立遗产信托，并负责遗产管理</div>
                            <a class="w3-btn w3-hover-dark-grey w3-transparent w3-text-dark-grey w3-medium hexagon-button" href="/sankofa-heritage/">详细介绍</a>
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
                            <a class="w3-btn w3-hover-dark-grey w3-transparent w3-text-dark-grey w3-medium hexagon-button" href="/sankofa-exchange/">详细介绍</a>
						</div>
					</div>
				</div>
			</div>
    
    <div class="hexagon fixhexagon">
				<div class="outer">
					<div class="inner immi">
						<div class="textWrapper">
							<div class="text2">“移民信托，人才两移” - 私人订制的移民签证与投资方案</div>
                            <a class="w3-btn w3-hover-dark-grey w3-transparent w3-text-dark-grey w3-medium hexagon-button" href="/sankofa-immi/">详细介绍</a>
						</div>
					</div>
				</div>
			</div>
    
    <div class="hexagon fixhexagon">
				<div class="outer">
					<div class="inner tax">
						<div class="textWrapper">
							<div class="text">提供客户税务咨询、税务管理方案、合法避税</div>
                            <a class="w3-btn w3-hover-dark-grey w3-transparent w3-text-dark-grey w3-medium hexagon-button" href="/sankofa-tax/">详细介绍</a>
						</div>
					</div>
				</div>
			</div>
    
		</div>
<div class="row w3-center">
    <div class="hexagon fixhexagon">
				<div class="outer">
					<div class="inner trade">
						<div class="textWrapper">
							<div class="text">提供澳大利亚红酒及保健品等商品进出口服务</div>
                            <a class="w3-btn w3-hover-dark-grey w3-transparent w3-text-dark-grey w3-medium hexagon-button" href="/sankofa-trade/">详细介绍</a>
						</div>
					</div>
				</div>
			</div>
</div>
    
    </div>
    </div>
    
<!-- Footer -->
<?php returnRights(1,"zh","/services-en?set=en"); ?>
<script src="/js/services.js"></script>
<script src="/js/back.to.top.js"></script>
<a href="#0" class="cd-top">Top</a>
</body>
</html>
<?php } } ?>