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
<?php
$servername = "localhost";
$username = "root";
$password = "Sankofa809"
    
// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";
?>
</head>
<body>
    
<!-- Navbar (sit on top) -->
<div class="w3-top">
  <ul class="w3-navbar" id="myNavbar">
    <li><a href="/index.html" class="w3-padding-large w3-text-dark-grey">首页</a></li>
      <li><a href="/services.html" class="w3-padding-large w3-text-dark-grey">产品信息</a></li>
      <li><a href="#" class="w3-padding-large w3-text-dark-grey">什么是家族办公室</a></li>
      <li><a href="/index.html#our-team" class="w3-padding-large w3-text-dark-grey">团队介绍</a></li>
      <li><a href="/index.html#sankofa-contact" class="w3-padding-large w3-text-dark-grey">联系我们</a></li>
    <li class="w3-hide-small w3-right">
      <a href="#" class="w3-padding-large w3-hover-red"><i class="fa fa-search"></i></a>
    </li>
  </ul>
</div>

<!-- Slideshow -->
<div class="w3-display-container w3-wide sankofa-product-preview w3-opacity2"><img src="http://www.smfos.com.au/images/oceanroad.jpg" />
<div class="w3-display-bottomleft w3-text-white w3-container w3-padding-32 w3-hide-small"><span class="w3-black w3-padding-large w3-animate-bottom w3-xlarge w3-text-light-grey">Sankofa 家族信托</span></div>
</div>
<div class="w3-content w3-container w3-text-dark-grey sankofa-product-box" style="max-width: 1100px; margin-top: 80px; margin-bottom: 80px;">
<!-- Content -->


    
</div>
<!-- Footer -->
<div class="footer-text w3-round-large w3-hover-black">
<p><img src="/images/warning.png"> Disclaimer: Any general advice in this material does not take into account you or your client‘s personal objectives, financial situation and needs. Please seek advice from a financial adviser or broker and read the relevant IM before making a decision in relation to any investment. In the event of any inconsistency or misinterpretation between the marketing material and SMFOs Pty Ltd.</p>
</div>

<footer class="w3-padding-12 w3-transparent">
    <a href="http://www.sankofafund.com.au"><img src="/images/logo_black.png"></a>
    <p class="w3-left-align">© 2016 <strong>SMFOs Pty Ltd</strong> (ACN 613532835), All rights reserved.</p>
</footer>
<script src="/js/back.to.top.js"></script>
<a href="#0" class="cd-top">Top</a>
</body>
</html>