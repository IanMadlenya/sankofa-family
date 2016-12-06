<!DOCTYPE html>
<?php
/*
Template Name: sankofa-home-en
*/
$cookie_name = "sk_lan";
$cookie_value = "";

if(!isset($_COOKIE[$cookie_name])) {
    $cookie_value = "en";
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), '/', 'www.smfos.com.au'); // 86400 = 1 day
} else {
    $cookie_value = $_COOKIE[$cookie_name];
    $var = $_GET['set'];
    if($cookie_value == "zh") {
        if($var == "en") {
            $cookie_value = "en";
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), '/', 'www.smfos.com.au'); // 86400 = 1 day
            header( 'Location: /en' );
        } else {
            header( 'Location: /' );
        }
    } else { ?>
<html>
<head>
<title>Sankofa Multi-Family Offices</title>
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
    <li class="w3-hide-small"><a href="/en" class="w3-padding-large w3-text-light-grey">Home</a></li>
      <li class="w3-hide-small"><a href="/services-en" class="w3-padding-large w3-text-light-grey">Products</a></li>
      <li class="w3-hide-small"><a href="#" class="w3-padding-large w3-text-light-grey">Definition of MFOs</a></li>
      <li class="w3-hide-small"><a href="/our-team-en" class="w3-padding-large w3-text-light-grey">Our team</a></li>
      <li class="w3-hide-small"><a href="/en#sankofa-contact" class="w3-padding-large w3-text-light-grey">Contact us</a></li>
    <li class="w3-hide-small w3-right">
      <a href="/?set=zh" class="w3-padding-large w3-hover-green w3-text-light-grey">中文</a>
    </li>
  </ul>
</div>

<!-- First Parallax Image with Logo Text -->
<div class="bgimg-1 w3-opacity w3-display-container">
  <div class="w3-display-middle" style="white-space:nowrap;">
      <span class="w3-xxlarge w3-text-light-grey w3-animate-opacity"><a href="http://www.sankofafund.com.au"><img class="sankofa-logo" src="/images/logo.png"></a> Multi-Family Offices</span>
  </div>
</div>

<!-- Sign Up -->
<a class="w3-btn w3-light-grey w3-hover-black w3-medium w3-display-middle sankofa-sign-up" href="/class">Sign up WeChat class</a>

<!-- Container (About Section) -->
<div class="w3-content w3-container w3-padding-64" id="about">
    <h3 class="w3-center">About Sankofa Multi-Family Offices</h3>
  <p>Sankofa Multi-Family Offices (SMFOs) is subordinate to Sankofa Fund Management Pty Ltd (ACN: 602 218 495 AFSL: 473 202). It is specialized in providing high-end services to our VIP clients, including but not limited to global asset allocation, family trust management, immigration application, foreign study assistance and property purchases. Since inception, SMFOs has successfully helped a lot of families set up their family trust and, in the meantime, accomplished their goals in migration, children's education and foreign asset allocation.</p>
  <div class="w3-row">
    <div class="w3-col m6 w3-center w3-section">
      <img src="/images/george_gao.jpg" class="george-img w3-round-large" alt="George Gao, Sankofa家族信托办公室 董事总经理">
        <p class="sankofa-title">George Gao, Sankofa Multi-Family Offices</p>
        <p class="sankofa-title-below">Managing Director</p>
    </div>

    <!-- Hide this text on small devices -->
    <div class="w3-col m6 w3-hide-small w3-section">
      <p>The first multi-family office was emerged in the sixth century, whose role was nothing but the treasurer of the crown. When the nobles start to utilize the service, multi-family offices evolved into an industry with the concept of management that has been inherited till now. In the nineteenth century, famous families like the Morgan and the Rockefeller established their own family offices, which endowed this industry with modern sense. Many of these family offices are still operating, providing services in financial management and lots of other forms.</p>
        <a class="w3-btn w3-hover-light-grey w3-medium w3-left sankofa-middle" href="/sankofa-family-en">Read more</a>
    </div>
  </div>
</div>
    
<!-- Second Parallax Image with Portfolio Text -->
<div class="bgimg-2 w3-display-container" id="our-team">
<div class="w3-xxlarge w3-text-light-grey w3-wide w3-center sankofa-team-text">Our team</div>
<div class="w3-row-padding w3-grayscale" style="padding-top:120px">
    <div class="w3-col l205 w3-margin-bottom">
    </div>
    <div class="w3-col l205 m6 w3-margin-bottom">
      <div class="w3-card-2">
        <img src="/images/george_gao2.png" style="width:100%;min-width:250px">
        <div class="w3-container w3-white" style="height:260px;width:100%;min-width:250px">
          <h4>George Gao</h4>
          <p class="w3-opacity w3-small">SMFOs Managing Director</p>
          <p class="w3-small">George has more than 20 years’ experience in the financial industry. He served at China Investment Bank and CITIC Sercurities as a senior trader. His titles include CPA, CRFA and VP of EFX168 Financial College.</p>
        </div>
      </div>
    </div>
    <div class="w3-col l205 m6 w3-margin-bottom">
      <div class="w3-card-2">
        <img src="/images/gracie2.png" style="width:100%;min-width:250px">
        <div class="w3-container w3-white" style="height:260px;width:100%;min-width:250px">
          <h4>Gracie He</h4>
          <p class="w3-opacity w3-small">SMFOs Chief Financial Officer</p>
          <p class="w3-small">澳大利亚注册会计师CPA，特许税务师 CTA，注册税务代理 Registered tax agent ，注册会计师导师 ，超过10年的澳大利亚会计和税务从业经验，擅长中小型企业税务规划，企业业务结构重组，企业跨境税务规划，高净值客户的个人税务理财等。</p>
        </div>
      </div>
    </div>
    <div class="w3-col l205 m6 w3-margin-bottom">
      <div class="w3-card-2">
        <img src="/images/vivienne2.png" style="width:100%;min-width:250px">
        <div class="w3-container w3-white" style="height:260px;width:100%;min-width:250px">
          <h4>Vivienne Goodwin</h4>
          <p class="w3-opacity w3-small">SMFOs Chief Legal Adviser</p>
          <p class="w3-small">德盈律师事务所创始人，新闻硕士、法律博士，新南威尔士州执业律师，澳大利亚最高法院执业律师，澳大利亚国际公证律师。专业领域为经济商业法、公司法、房地产开发、项目融资；有十年以上协助商业投资移民客户经验；擅长协助中国企业客户在澳着陆投资；此外还有丰富的仲裁庭经验。</p>
        </div>
      </div>
    </div>
    </div>

<div class="w3-row" style="padding-bottom:30px">
<div class="w3-center">
<p><a class="w3-btn w3-light-grey w3-hover-black w3-medium" href="/our-team-en">More details</a></p>
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
        <i class="fa fa-phone w3-hover-text-black" style="width:30px"></i> Phone: +61 (2) 8065 2830<br>
          <i class="fa fa-envelope w3-hover-text-black" style="width:30px"> </i> Email: info@sankofafund.com.au<br>
      </div>
      <p>Swing by for a cup of coffee, or leave me a note:</p>
        <form class="w3-container" method="post" action="/msg-input.php">
      <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
        <div class="w3-half">
          <input class="w3-input w3-border w3-hover-light-grey" type="text" placeholder="NAME" name="clientname">
        </div>
        <div class="w3-half">
        <input class="w3-input w3-border w3-hover-light-grey" type="text" placeholder="EMAIL" name="email">
        </div>
      </div>
      <input class="w3-input w3-border w3-hover-light-grey" type="text" placeholder="MESSAGE" name="message">
    <input type="submit" class="w3-btn w3-hover-light-grey w3-section w3-right" value="Submit">
          </form>
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
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script src="/js/index.js"></script>
<script src="/js/back.to.top.js"></script>
<a href="#0" class="cd-top">Top</a>
</body>
</html>
<?php } } ?>