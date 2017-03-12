<!DOCTYPE html>
<?php
/*
Template Name: sankofa-estore
*/
$current_user = wp_get_current_user();
include 'navbar.php';
include 'footer-rights.php';
$cookie_name = "sk_lan";
$cookie_value = "";
$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
session_start();

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
var hidden1=!1,hidden2=!1,hidden3=!1;$(function(){$(".estore-item1").click(function(){0==hidden1?($(".eitem1").animate({top:"-60px"}),$(".estore-item1-hidden").fadeIn(500),hidden2=!1,$(".eitem2").animate({top:"0"}),$(".estore-item2-hidden").fadeOut(500),hidden3=!1,$(".eitem3").animate({top:"0"}),$(".estore-item3-hidden").fadeOut(500),hidden1=!0):($(".eitem1").animate({top:"0"}),$(".estore-item1-hidden").fadeOut(500),hidden1=!1)}),$(".estore-item2").click(function(){0==hidden2?($(".eitem2").animate({top:"-60px"}),$(".estore-item2-hidden").fadeIn(500),hidden1=!1,$(".eitem1").animate({top:"0"}),$(".estore-item1-hidden").fadeOut(500),hidden3=!1,$(".eitem3").animate({top:"0"}),$(".estore-item3-hidden").fadeOut(500),hidden2=!0):($(".eitem2").animate({top:"0"}),$(".estore-item2-hidden").fadeOut(500),hidden2=!1)}),$(".estore-item3").click(function(){0==hidden3?($(".eitem3").animate({top:"-60px"}),$(".estore-item3-hidden").fadeIn(500),hidden1=!1,$(".eitem1").animate({top:"0"}),$(".estore-item1-hidden").fadeOut(500),hidden2=!1,$(".eitem2").animate({top:"0"}),$(".estore-item2-hidden").fadeOut(500),hidden3=!0):($(".eitem3").animate({top:"0"}),$(".estore-item3-hidden").fadeOut(500),hidden3=!1)})}),$(document).ready(function(){$(".estore-btn1").click(function(){$(".estore-dialog1").fadeIn(500)}),$(".estore-btn2").click(function(){$(".estore-dialog2").fadeIn(500)}),$(".estore-btn3").click(function(){$(".estore-dialog3").fadeIn(500)}),$(".estore-dialog-close").click(function(){$(".estore-dialog1").fadeOut(500),$(".estore-dialog2").fadeOut(500),$(".estore-dialog3").fadeOut(500)})});
</script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
</head>
<body>

<!-- Navbar (sit on top) -->
<div class="estore-bg2 w3-top">
<ul class="w3-navbar" id="myNavbar">
<?php
$new_cookie_value = $cookie_value . "_estore";
echo navMenu($new_cookie_value);
if ( $current_user->exists() ) {
    navMenuLogin(1,$cookie_value,$current_user->user_login);
} else {
    navMenuLogin(1,$cookie_value,"");
}
?>
</ul>
    
<div class="estore-content w3-content w3-container w3-text-dark-grey sankofa-product-box">
<div class="w3-row w3-center"><br>
<div class="w3-third eitem1">
<a href="#" class="estore-item1"><img src="/images/estore-icon1.png" style="width:45%;margin-bottom:10px" class="w3-circle w3-hover-opacity w3-hover-shadow estore-icon1"></a>
<h5>Trust Setup Service</h5>
<div class="estore-item1-hidden w3-white w3-card-2 w3-padding" style="border-radius:4px"><h4>AU$5,000</h4><p>Online Consulting Service for setting up a Discretionary Trust.</p>
<button class="estore-btn1 w3-padding" style="margin-bottom:10px">More details</button></div>
</div>

<div class="w3-third eitem2">
<a href="#" class="estore-item2"><img src="/images/estore-icon2.png" style="width:45%;margin-bottom:10px" class="w3-circle w3-hover-opacity w3-hover-shadow estore-icon2"></a>
<h5>Business Study Service</h5>
<div class="estore-item2-hidden w3-white w3-card-2 w3-padding" style="border-radius:4px"><h4>AU$10,000</h4><p>Online Consulting Services for people who are interest in visiting Australia for business purposes.</p>
<button class="estore-btn2 w3-padding" style="margin-bottom:10px">More details</button></div>
</div>

<div class="w3-third eitem3">
<a href="#" class="estore-item3"><img src="/images/estore-icon3.png" style="width:45%;margin-bottom:10px" class="w3-circle w3-hover-opacity w3-hover-shadow estore-icon3"></a>
<h5>Expression of Interest</h5>
<div class="estore-item3-hidden w3-white w3-card-2 w3-padding" style="border-radius:4px"><h4>AU$1,000 - AU$5,000</h4><p>Taking your EOI as your deposit in advance for securing your privilege of our consulting services.</p>
<button class="estore-btn3 w3-padding" style="margin-bottom:10px">More details</button></div>
</div>

</div>
</div>

    <div class="estore-login">
        <div class="estore-dialog-login">
            <a href="#" class="estore-dialog-close w3-hover-opacity"><img src="/images/close.png" style="width:25px"></a>
            <form>
                <h4>Login</h4>
                <div class="w3-center">
                <p><input class="w3-input estore-input-login w3-opacity" type="text" name="" placeholder="用户名"></p>
                <p><input class="w3-input estore-input-login w3-opacity" type="password" name="" placeholder="密码"></p>
                <button class="estore-btn w3-padding" style="margin-left:-5px;margin-right:10px">新用户注册 <span class="glyphicon glyphicon-user"></span></button>
                <button class="estore-btn-confirm w3-padding">登录 <span class="glyphicon glyphicon-circle-arrow-right"></span></button>
                <p style="font-size:13px;margin-bottom:-5px"><a href="/#sankofa-contact" style="text-decoration:none;color:#666"><span class="glyphicon glyphicon-exclamation-sign"></span> 忘记密码?</a></p>
                </div>
            </form>
        </div>
    </div>
    
    <div class="estore-forgotpw">
        <div class="estore-dialog-forgotpw">
            <a href="#" class="estore-dialog-close w3-hover-opacity"><img src="/images/close.png" style="width:25px"></a>
            <form>
                <h4>Login</h4>
                <div class="w3-center">
                <p><input class="w3-input estore-input-login w3-opacity" type="text" name="" placeholder="用户名"></p>
                <p><input class="w3-input estore-input-login w3-opacity" type="password" name="" placeholder="密码"></p>
                <button class="estore-btn w3-padding" style="margin-left:-5px;margin-right:10px">新用户注册 <span class="glyphicon glyphicon-user"></span></button>
                <button class="estore-btn-confirm w3-padding">登录 <span class="glyphicon glyphicon-circle-arrow-right"></span></button>
                <p style="font-size:13px;margin-bottom:-5px"><a href="/#sankofa-contact" style="text-decoration:none;color:#666"><span class="glyphicon glyphicon-exclamation-sign"></span> 忘记密码?</a></p>
                </div>
            </form>
        </div>
    </div>

    <div class="estore-register">
        <div class="estore-dialog-register">
            <a href="#" class="estore-dialog-close w3-hover-opacity"><img src="/images/close.png" style="width:25px"></a>
            <form>
                <h4>Registration</h4>
                <div class="w3-center">
                <p><input class="w3-input estore-input-login w3-opacity" type="text" name="" placeholder="电子邮件"></p>
                <p><input class="w3-input estore-input-login w3-opacity" type="password" name="" placeholder="密码"></p>
                <p><input class="w3-input estore-input-login w3-opacity" type="password" name="" placeholder="确认密码"></p>
                <p><input class="w3-input estore-input-login w3-opacity" type="text" name="" placeholder="姓名 (同信用卡号)"></p>
                <p><input class="w3-input estore-input-login w3-opacity" type="text" name="" placeholder="信用卡号码"></p>
                <p><input class="w3-input estore-input-login w3-opacity" type="text" name="" placeholder="到期年月 (MM/YY)"></p>
                <p><input class="w3-input estore-input-login w3-opacity" type="text" name="" placeholder="CVV"></p>
                <p style="font-size:13px"><a href="/#sankofa-contact" style="text-decoration:none;color:#666"><span class="glyphicon glyphicon-exclamation-sign"></span> 点击确认表示着您已阅读本服务之条款与使用须知</a></p>
                <button class="estore-btn-confirm w3-padding">确定 <span class="glyphicon glyphicon-circle-arrow-right"></span></button>
                </div>
            </form>
        </div>
    </div>

    <div class="estore-cart">
        <div class="estore-dialog-cart">
            <img src="/images/estore-icon1c.png" style="width:20%;margin-top:3%" class="w3-circle estore-icon">
            <a href="#" class="estore-dialog-close w3-hover-opacity"><img src="/images/close.png" style="width:25px"></a>
            <div class="estore-dialog-text">
                <h4>Trust Setup Service</h4>
                <p>We provide consulting service for setting up a Discretionary Trust.</p>
                <p style="margin-top:-15px">Our fees are included:</p>
                <ul>
                    <li>Gathering customer information</li>
                    <li>Company set up fees (including Trustee company, AU$1,000 + GST)</li>
                    <li>Trust Deed set up fees (Legal fees + Service fees, AU$1,000 + GST)</li>
                    <li>Accountant fees (AU$1,300 + GST)</li>
                    <li>Trust stamp duty (AU$500 + GST)</li>
                    <li>Consulting fees (AU$200 + GST)</li>
                </ul>
                <p>* Please <a href="/#sankofa-contact">contact us</a> if you have any questions.</p>
            </div>
            <div class="w3-center">
                <button class="estore-btn1c w3-padding">Add to cart</button>
            </div>
        </div>
    </div>
    
        <div class="estore-success">
        <div class="estore-dialog-success">
            <a href="#" class="estore-dialog-close w3-hover-opacity"><img src="/images/close.png" style="width:25px"></a>
                <h4>Success</h4>
                <div class="w3-center">
                <img src="/images/checked.png" style="width:70%">
                <p>注册成功!</p>
                <button class="estore-btn w3-padding">确定 <span class="glyphicon glyphicon-circle-arrow-right"></span></button>
                </div>
        </div>
    </div>

<div class="estore-dialog1">
<div class="estore-dialog-content1">
<img src="/images/estore-icon1c.png" style="width:20%;margin-top:3%" class="w3-circle estore-icon">
<a href="#" class="estore-dialog-close w3-hover-opacity"><img src="/images/close.png" style="width:25px"></a>
<div class="estore-dialog-text">
<h4>Trust Setup Service</h4>
<p>We provide consulting service for setting up a Discretionary Trust.</p>
<p style="margin-top:-15px">Our fees are included:</p>
<ul>
<li>Gathering customer information</li>
<li>Company set up fees (including Trustee company, AU$1,000 + GST)</li>
<li>Trust Deed set up fees (Legal fees + Service fees, AU$1,000 + GST)</li>
<li>Accountant fees (AU$1,300 + GST)</li>
<li>Trust stamp duty (AU$500 + GST)</li>
<li>Consulting fees (AU$200 + GST)</li>
</ul>
<p>* Please <a href="/#sankofa-contact">contact us</a> if you have any questions.</p>
</div>
<div class="w3-center">
<button class="estore-btn1c w3-padding">Add to cart</button>
</div>
</div>
</div>

<div class="estore-dialog2">
<div class="estore-dialog-content2">
<img src="/images/estore-icon2c.png" style="width:20%;margin-top:3%" class="w3-circle estore-icon">
<a href="#" class="estore-dialog-close w3-hover-opacity"><img src="/images/close.png" style="width:25px"></a>
<div class="estore-dialog-text">
<h4>Business Study Service</h4>
<p>We provide consulting services for people who are interest in visiting Australia for business purposes.</p>
<p style="margin-top:-15px">Our fees are included:</p>
<ul>
<li>Service fees (AU$3,000 approx. + GST)</li>
<li>Hotel reservation fees (AU$5,000 approx. + GST)</li>
<li>Flight booking fees (AU$2,000 approx. + GST)</li>
</ul>
<p>* Please <a href="/#sankofa-contact">contact us</a> if you have any questions.</p>
</div>
<div class="w3-center">
<button class="estore-btn2c w3-padding">Add to cart</button>
</div>
</div>
</div>
    
<div class="estore-dialog3">
<div class="estore-dialog-content3">
<img src="/images/estore-icon3c.png" style="width:20%;margin-top:3%" class="w3-circle estore-icon">
<a href="#" class="estore-dialog-close w3-hover-opacity"><img src="/images/close.png" style="width:25px"></a>
<form method="post" action="/wp-content/themes/sankofafamily/exp_interest.php">
<div class="estore-dialog-text">
<h4>Expression of Interest</h4>
<p>SMFOS PTY LTD also accepts deposits from customers who is going to secure their seats for our services. The EOI payment option can be customised by the client and this amount is usually between AU$1,000 and AU$5,000.</p>
<p>Enter your amount: AU$ <input class="w3-input estore-input w3-opacity" type="text" name="interest_price" placeholder="numbers only"></p>
<?php if ($_SESSION['interest_status'] == 1) {
    echo "<p style='color:red;'>* Please enter the correct amount.</p>";
    $_SESSION['interest_status'] = 0;
} ?>
</div>
<div class="w3-center">
<input type="submit" class="estore-btn3c w3-padding" value="Add to cart">
</div>
</form>
</div>
</div>

<!-- Footer -->
<?php returnRights(2,"",""); ?>
</div>
</body>
</html>