<?php
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
<link rel="stylesheet" href="/css/style.css">
<link rel="stylesheet" href="/css/hexagon.css">
<link rel="stylesheet" href="/css/jquery.qtip.min.css">
<script src="/js/jquery.min.js"></script>
<script src="/js/jquery.qtip.min.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
</head>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <ul class="w3-navbar" id="myNavbar">
    <li><a href="/" class="w3-padding-large w3-text-light-grey">首页</a></li>
      <li><a href="/services" class="w3-padding-large w3-text-light-grey">产品信息</a></li>
      <li><a href="#" class="w3-padding-large w3-text-light-grey">什么是家族办公室</a></li>
      <li><a href="/#our-team" class="w3-padding-large w3-text-light-grey">团队介绍</a></li>
      <li><a href="/#sankofa-contact" class="w3-padding-large w3-text-light-grey">联系我们</a></li>
    <li class="w3-hide-small w3-right">
      <?php if ( is_user_logged_in() ): ?>
        <div class="sankofa-dropdown w3-padding-large w3-hover-green w3-text-light-grey">
  <a href="/wp-admin" class="sankofa-dropbtn"><?php echo $current_user->user_login ?></a>
  <div class="sankofa-dropdown-content">
    <a href="#">Link 1</a>
    <a href="#">Link 2</a>
    <a href="#">Link 3</a>
  </div>
</div>
        <?php else: ?>
      <a href="/wp-admin" class="w3-padding-large w3-hover-green w3-text-light-grey">登录</a>
        <?php endif; ?>
    </li>
  </ul>
</div>

<!-- First Parallax Image with Logo Text -->
<div class="bgimg-1 w3-opacity w3-display-container">
  <div class="w3-display-middle" style="white-space:nowrap;">
    <!-- <span class="w3-center w3-padding-xlarge w3-black w3-xlarge w3-wide w3-animate-opacity">MY <span class="w3-hide-small">WEBSITE</span> LOGO</span> -->
      <span class="w3-xxlarge w3-text-light-grey w3-wide w3-animate-opacity"><a href="http://www.sankofafund.com.au"><img class="sankofa-logo" src="/images/logo.png"></a> 家族办公室</span>
  </div>
</div>

<!-- Sign Up -->
<button class="w3-btn w3-light-grey w3-hover-black w3-medium w3-display-middle sankofa-sign-up">在线咨询</button>

<!-- Container (About Section) -->
<div class="w3-content w3-container w3-padding-64" id="about">
    <h3 class="w3-center">关于 Sankofa 家族办公室</h3>
  <p>Sankofa 家族办公室（Sankofa Multi-Family Offices 简称：SMFOs）是隶属于澳大利亚Sankofa基金管理有限公司(ACN: 602 218 495 AFSL: 473 202)专门服务高端客户，海外资产配置、家族信托、移民、留学、安家、置业的专业服务机构。自其成立以来，SMFOs已为数个财富家庭成立了家族信托，并帮助他们完成全家移民，子女留学，海外资产配置等诉求。</p>
  <div class="w3-row">
    <div class="w3-col m6 w3-center w3-section">
      <img src="/images/george_gao.jpg" class="george-img w3-round-large" alt="George Gao, Sankofa家族信托办公室 董事总经理">
        <p class="sankofa-title">George Gao, Sankofa 家族信托办公室</p>
        <p class="sankofa-title-below">董事总经理</p>
    </div>

    <!-- Hide this text on small devices -->
    <div class="w3-col m6 w3-hide-small w3-section">
      <p>家族办公室始于6世纪，当时国王的管家负责管理皇家财富。后来贵族要求参与其中，自此管理的概念应运而生并延续至今。现代意义上的家族办公室在19世纪得到发展。1838 年，作为金融家和艺术收藏家 J.P. 摩根家族创立了摩根财团来管理家族资产。1882年，洛克菲勒家族设立了自己的家族办公室。该家族办公室至 今仍在运营，并为其他家族提供服务。家族办公室涵盖管理私人大宗财富的各种组织与服务形式...</p>
        <button class="w3-btn w3-hover-light-grey w3-medium w3-left sankofa-middle">了解更多</button>
    </div>
  </div>
</div>
    
<!-- Second Parallax Image with Portfolio Text -->
<div class="bgimg-2 w3-display-container" id="our-team">

<div class="w3-xxlarge w3-text-light-grey w3-wide w3-center sankofa-team-text">我们的团队</div>
    
<!-- Container -->
<div class="w3-content w3-container w3-padding-180 sankofa-team-icon">
    <div class="row w3-center">
        <a href="index.html#our-team" id="wei-box"><div class="hexagon fixhexagon">
				<div class="outer">
					<div class="inner wei">
					</div>
				</div>
            </div></a>
        
        <a href="index.html#our-team" id="gracie-box"><div class="hexagon fixhexagon">
				<div class="outer">
					<div class="inner gracie">
					</div>
				</div>
            </div></a>
    </div>
  <div class="row w3-center">
			
			<a href="index.html#our-team" id="vincent-box"><div class="hexagon">
				<div class="outer">
					<div class="inner vincent">
					</div>
				</div>
                </div></a>
			
			<a href="index.html#our-team" id="su-box"><div class="hexagon even">
				<div class="outer">
					<div class="inner su">
					</div>
				</div>
                </div></a>
			
			<a href="index.html#our-team" id="george-box"><div class="hexagon">
				<div class="outer">
					<div class="inner george">
					</div>
				</div>
			</div></a>
    
    <a href="index.html#our-team" id="bridy-box"><div class="hexagon even">
				<div class="outer">
					<div class="inner bridy">
					</div>
				</div>
        </div></a>
    
    <a href="index.html#our-team" id="wenyong-box"><div class="hexagon">
				<div class="outer">
					<div class="inner wenyong">
					</div>
				</div>
        </div></a>
			
        </div>
</div>
    </div>


<!-- Container (Contact Section) -->
<div class="w3-content w3-container w3-padding-64" id="sankofa-contact">
  <div class="w3-row w3-padding-32 w3-section">
    <div class="w3-col m4 w3-container">
        
      <!-- Add Google Maps -->
      <div id="googleMap" class="w3-round-large"></div>
    </div>
    <div class="w3-col m8 w3-container w3-section">
      <div class="w3-large w3-margin-bottom">
          <img class="sankofa-logo-dark" src="/images/logo_orig.png"><br>
        <i class="fa fa-map-marker w3-hover-text-black" style="width:30px"></i> Level 40, 19 Martin Pl, Sydney, NSW 2000<br>
        <i class="fa fa-phone w3-hover-text-black" style="width:30px"></i> 电话: +61 (2) 8065 2830<br>
          <i class="fa fa-envelope w3-hover-text-black" style="width:30px"> </i> Email: info@sankofafund.com.au<br>
      </div>
      <p>Swing by for a cup of coffee, or leave me a note:</p>
      <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
        <div class="w3-half">
          <input class="w3-input w3-border w3-hover-light-grey" type="text" placeholder="姓名 NAME">
        </div>
        <div class="w3-half">
          <input class="w3-input w3-border w3-hover-light-grey" type="text" placeholder="电子邮件 EMAIL">
        </div>
      </div>
      <input class="w3-input w3-border w3-hover-light-grey" type="text" placeholder="留言 MESSAGE">
        <button class="w3-btn w3-section w3-right">提交</button>
    </div>
  </div>
</div>
    
<!-- Footer -->
<div class="footer-text w3-round-large w3-hover-black">
  <p><img src="/images/warning.png"> Disclaimer: Any general advice in this material does not take into account you or your client‘s personal objectives, financial situation and needs. Please seek advice from a financial adviser or broker and read the relevant IM before making a decision in relation to any investment. In the event of any inconsistency or misinterpretation between the marketing material and SMFOs Pty Ltd.</p>
</div>

<footer class="w3-padding-12">
    <a href="http://www.sankofafund.com.au"><img src="/images/logo_black.png"></a>
    <p class="w3-left-align">© 2016 <strong>SMFOs Pty Ltd</strong> (ACN 613532835), All rights reserved.</p>
</footer>
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script src="/js/index.js"></script>
<script src="/js/back.to.top.js"></script>
<a href="#0" class="cd-top">Top</a>
</body>
</html>
