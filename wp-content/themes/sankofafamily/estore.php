<!DOCTYPE html>
<?php
/*
Template Name: sankofa-estore
*/
//include 'navbar.php';
//include 'footer-rights.php';
session_start();
require_once('DBConnect.php');
require_once('navbar.php');
require_once('footer-rights.php');
$cookie_name = "sk_lan";
$cookie_value = "";
$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

$successmsg = "";
$errormsg = "";

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
}

$query = "SELECT item.ProductName,item.Description,item.ShortDescription,item.Price,item.MaxPrice,FORMAT(item.Price, '#,#') as Priced,FORMAT(item.MaxPrice, '#,#') as MaxPriced FROM cs_products item WHERE item.Id=1";
$result = $mysqli->query($query);
$row1 = $result->fetch_assoc();
                
$query = "SELECT item.ProductName,item.Description,item.ShortDescription,item.Price,item.MaxPrice,FORMAT(item.Price, '#,#') as Priced,FORMAT(item.MaxPrice, '#,#') as MaxPriced FROM cs_products item WHERE item.Id=2";
$result = $mysqli->query($query);
$row2 = $result->fetch_assoc();
                
$query = "SELECT item.ProductName,item.Description,item.ShortDescription,item.Price,item.MaxPrice,FORMAT(item.Price, '#,#') as Priced,FORMAT(item.MaxPrice, '#,#') as MaxPriced FROM cs_products item WHERE item.Id=3";
$result = $mysqli->query($query);
$row3 = $result->fetch_assoc();
?>
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
        <script src="/js/addclear.min.js"></script>
        <script src="/js/regexCheck.js"></script>
        <link rel="stylesheet" href="/css/notify.css">
        <link rel="stylesheet" href="/css/prettify.css">
        <script src="/js/notify.js"></script>
        <script src="/js/prettify.js"></script>
        <style>
             ::-webkit-input-placeholder {
                /* WebKit, Blink, Edge */
                color: #d9dfe0;
            }
            
             :-moz-placeholder {
                /* Mozilla Firefox 4 to 18 */
                color: #d9dfe0;
            }
            
             ::-moz-placeholder {
                /* Mozilla Firefox 19+ */
                color: #d9dfe0;
            }
            
             :-ms-input-placeholder {
                /* Internet Explorer 10-11 */
                color: #d9dfe0;
            }
            
            input[type=text]::-ms-clear {
                display: none;
            }

        </style>
        <script>
            var hidden1 = false;
            var hidden2 = false;
            var hidden3 = false;

            $(function() {
                $("input").addClear({
                    closeSymbol: "<span class='glyphicon glyphicon-remove-sign'></span>",
                    color: "rgb(247,249,249)",
                    top: 3,
                    right: 20,
                    hideOnBlur: true
                });
                $('.estore-item1').click(function() {
                    if (hidden1 == false) {
                        $('.eitem1').animate({
                            top: "-60px"
                        });
                        $('.estore-item1-hidden').fadeIn(500);
                        $('.eitem2').animate({
                            top: "0"
                        });
                        $('.estore-item2-hidden').fadeOut(500);
                        $('.eitem3').animate({
                            top: "0"
                        });
                        $('.estore-item3-hidden').fadeOut(500);
                        hidden1 = true;
                    } else {
                        $('.eitem1').animate({
                            top: "0"
                        });
                        $('.estore-item1-hidden').fadeOut(500);
                        hidden1 = false;
                    }
                });
                $('.estore-item2').click(function() {
                    if (hidden2 == false) {
                        $('.eitem2').animate({
                            top: "-60px"
                        });
                        $('.estore-item2-hidden').fadeIn(500);
                        $('.eitem1').animate({
                            top: "0"
                        });
                        $('.estore-item1-hidden').fadeOut(500);
                        $('.eitem3').animate({
                            top: "0"
                        });
                        $('.estore-item3-hidden').fadeOut(500);
                        hidden2 = true;
                    } else {
                        $('.eitem2').animate({
                            top: "0"
                        });
                        $('.estore-item2-hidden').fadeOut(500);
                        hidden2 = false;
                    }
                });
                $('.estore-item3').click(function() {
                    if (hidden3 == false) {
                        $('.eitem3').animate({
                            top: "-60px"
                        });
                        $('.estore-item3-hidden').fadeIn(500);
                        $('.eitem1').animate({
                            top: "0"
                        });
                        $('.estore-item1-hidden').fadeOut(500);
                        $('.eitem2').animate({
                            top: "0"
                        });
                        $('.estore-item2-hidden').fadeOut(500);
                        hidden3 = true;
                    } else {
                        $('.eitem3').animate({
                            top: "0"
                        });
                        $('.estore-item3-hidden').fadeOut(500);
                        hidden3 = false;
                    }
                });
                $(".estore-btn1").click(function() {
                    $(".estore-dialog1").fadeIn(500)
                });
                $(".estore-btn2").click(function() {
                    $(".estore-dialog2").fadeIn(500)
                });
                $(".estore-btn3").click(function() {
                    $(".estore-dialog3").fadeIn(500)
                });
                $(".estore-dialog-close").click(function() {
                    $(".estore-dialog1").fadeOut(500),
                        $(".estore-dialog2").fadeOut(500),
                        $(".estore-dialog3").fadeOut(500),
                        $(".estore-login").fadeOut(500),
                        $(".estore-forgotpw").fadeOut(500),
                        $(".estore-register").fadeOut(500),
                        $(".estore-success").fadeOut(500),
                        $(".estore-error").fadeOut(500)
                });
                $("#registerbtn").click(function() {
                    $(".estore-login").fadeOut(500),
                        $(".estore-register").fadeIn(500)
                });
                $("#successbtn").click(function() {
                    $(".estore-success").fadeOut(500)
                });
                $("#errorbtn").click(function() {
                    $(".estore-error").fadeOut(500)
                });
                $("#regbtn").click(function() {
                    $("#regframe").contents().find('form').submit();
                });
                $("#editbtn").click(function() {
                    $("#editframe").contents().find('form').submit();
                });
            });

            $(document).ready(function() {
                <?php if((isset($_GET['login'])) && !(isset($_SESSION['esusername']))) { ?>
                $(".estore-login").fadeIn(500);
                <?php if((isset($_GET['loginname'])) && (isset($_GET['loginpwd']))) { ?>
                    $("#loginname").val("<?php echo $_GET['loginname']; ?>");
                    $("#loginpwd").val("<?php echo $_GET['loginpwd']; ?>");
                <?php unset($_GET['loginname']);
                    unset($_GET['loginpwd']); }
                unset($_GET['login']);
                } elseif((isset($_GET['login'])) && (isset($_SESSION['esusername']))) { ?>
                $.notify("<span class='glyphicon glyphicon-ok-sign'></span> 登录成功", {
                    type: "success"
                });
                <?php } if((isset($_GET['successreg'])) && !(isset($_SESSION['esusername']))) {
            $successmsg = "注册成功！请登录帐号"; ?>
                $(".estore-success").fadeIn(500);
                <?php unset($_GET['successreg']);
                } if((isset($_GET['successfg'])) && !(isset($_SESSION['esusername']))) {
                    $successmsg = "发送成功！请检查邮箱"; ?>
                $(".estore-success").fadeIn(500);
            <?php unset($_GET['successfg']); }
                if((isset($_GET['failfg'])) && !(isset($_SESSION['esusername']))) {
                $errormsg = "密码找回失败，请联系管理员"; ?>
                $(".estore-error").fadeIn(500);
                <?php unset($_GET['failfg']); }
        if((isset($_GET['errorreg'])) && !(isset($_SESSION['esusername']))) {
            $errormsg = "注册失败，请联系管理员"; ?>
                $(".estore-error").fadeIn(500);
                <?php unset($_GET['errorreg']); }
        if((isset($_GET['cancelpay'])) && (isset($_SESSION['esusername']))) {
            $errormsg = "支付已取消"; ?>
                $(".estore-error").fadeIn(500);
                <?php unset($_GET['cancelpay']); }
        if((isset($_GET['successpay'])) && (isset($_SESSION['esusername']))) {
            $successmsg = "支付成功！交易号: " . $_GET['successpay']; ?>
                $(".estore-success").fadeIn(500);
                <?php unset($_GET['successpay']); }
        if((isset($_GET['failedpay'])) && (isset($_SESSION['esusername']))) {
            $errormsg = "支付失败，错误: " . $_GET['failedpay']; ?>
                $(".estore-error").fadeIn(500);
                <?php unset($_GET['failedpay']); }
        if((isset($_GET['errorlogin'])) && !(isset($_SESSION['esusername']))) { ?>
                $(".estore-login").fadeIn(500);
                $("#errloginmsg").show();
                <?php unset($_GET['errorlogin']); } 
        if((isset($_GET['cart'])) && (isset($_SESSION['esusername']))) { ?>
                $(".estore-cart").fadeIn(500);
                <?php unset($_GET['cart']); }
        if((isset($_GET['errorinfo'])) && (isset($_SESSION['esusername']))) {
            $errormsg = "支付前请完整填写所有个人资料"; ?>
                $(".estore-error").fadeIn(500);
                <?php unset($_GET['errorinfo']); }
                if((isset($_GET['errorcart'])) && (isset($_SESSION['esusername']))) { ?>
                $.notify("<span class='glyphicon glyphicon-remove-sign'></span> 购物车为空", {
                    type: "danger"
                });
                <?php unset($_GET['errorcart']); }
                if((isset($_GET['added'])) && (isset($_SESSION['esusername']))) { ?>
                $.notify("<span class='glyphicon glyphicon-ok-sign'></span> 服务已添加", {
                    type: "success"
                });
                <?php unset($_GET['added']); }
                if((isset($_GET['trashed'])) && (isset($_SESSION['esusername']))) { ?>
                $.notify("<span class='glyphicon glyphicon-ok-sign'></span> 服务已删除", {
                    type: "success"
                });
                <?php unset($_GET['trashed']); }
                if((isset($_GET['editprofile'])) && (isset($_SESSION['esusername'])))  { ?>
                $('.estore-register').fadeIn(500);
                <?php } ?>
                if ($('.sf-dropdown').width() > 200) {
                    $('.sf-dropdown-content').css('margin-left', $('.sf-dropdown').width() - 200);
                }
            });

            function buyTrustSetup() {
                <?php if((isset($_SESSION['esuserid']))) { ?>
                $(".estore-dialog1").fadeOut(500);
                document.location = "/wp-content/themes/sankofafamily/es-buy.php?itemid=1&quantity=1&price=<?php echo $row1['Price']; ?>";
                <?php } else { ?>
                $(".estore-dialog1").fadeOut(500);
                $(".estore-login").fadeIn(500);
                <?php } ?>
            }

            function buyBusinessStudy() {
                <?php if((isset($_SESSION['esuserid']))) { ?>
                $(".estore-dialog2").fadeOut(500);
                document.location = "/wp-content/themes/sankofafamily/es-buy.php?itemid=2&quantity=1&price=<?php echo $row2['Price']; ?>";
                <?php } else { ?>
                $(".estore-dialog2").fadeOut(500);
                $(".estore-login").fadeIn(500);
                <?php } ?>
            }

            function buyExpression() {
                <?php if((isset($_SESSION['esuserid']))) { ?>
                if (($('#interest_price').val() != null) && ($('#interest_price').val() != "")) {
                    if ($.isNumeric($('#interest_price').val())) {
                        if (($('#interest_price').val() < <?php echo $row3['Price']; ?>) || ($('#interest_price').val() > <?php echo $row3['MaxPrice']; ?>)) {
                            $.notify("<span class='glyphicon glyphicon-info-sign'></span> EOI 应介于澳币 $<?php echo $row3['Priced']; ?> 与 $<?php echo $row3['MaxPriced']; ?> 之间", {
                                type: "warning"
                            });
                        } else {
                            $(".estore-dialog3").fadeOut(500);
                            document.location = "/wp-content/themes/sankofafamily/es-buy.php?itemid=3&quantity=1&price=" + $('#interest_price').val();
                        }
                    } else {
                        $.notify("<span class='glyphicon glyphicon-info-sign'></span> EOI 金额应为数字", {
                            type: "warning"
                        });
                    }
                } else {
                    $.notify("<span class='glyphicon glyphicon-info-sign'></span> 请输入金额", {
                        type: "warning"
                    });
                }
                <?php } else { ?>
                $(".estore-dialog3").fadeOut(500);
                $(".estore-login").fadeIn(500);
                <?php } ?>
            }

            function closeCart() {
                if (($("#cartframe").contents().find("#item3price").val() != null) && ($("#cartframe").contents().find("#item3price").val() != "")) {
                    if ($.isNumeric($("#cartframe").contents().find("#item3price").val())) {
                        if (($("#cartframe").contents().find("#item3price").val() < <?php echo $row3['Price']; ?>) || ($("#cartframe").contents().find("#item3price").val() > <?php echo $row3['MaxPrice']; ?>)) {
                            $.notify("<span class='glyphicon glyphicon-info-sign'></span> EOI 应介于澳币 $<?php echo $row3['Priced']; ?> 与 $<?php echo $row3['MaxPriced']; ?> 之间", {
                                type: "warning"
                            });
                        } else {
                            $(".estore-cart").fadeOut(500);
                            document.location = "/wp-content/themes/sankofafamily/es-update3.php?price=" + $("#cartframe").contents().find("#item3price").val();
                        }
                    } else {
                        $.notify("<span class='glyphicon glyphicon-info-sign'></span> EOI 金额应为数字", {
                            type: "warning"
                        });
                    }
                } else {
                    $(".estore-cart").fadeOut(500);
                }
            }

            function ewaySubmit() {
                if (($("#cartframe").contents().find("#item3price").val() != null) && ($("#cartframe").contents().find("#item3price").val() != "")) {
                    if ($.isNumeric($("#cartframe").contents().find("#item3price").val())) {
                        if (($("#cartframe").contents().find("#item3price").val() < <?php echo $row3['Price']; ?>) || ($("#cartframe").contents().find("#item3price").val() > <?php echo $row3['MaxPrice']; ?>)) {
                            $.notify("<span class='glyphicon glyphicon-info-sign'></span> EOI 应介于澳币 $<?php echo $row3['Priced']; ?> 与 $<?php echo $row3['MaxPriced']; ?> 之间", {
                                type: "warning"
                            });
                        } else {
                            $('.estore-cart').fadeOut(500);
                            $('.estore-paywait').fadeIn(500);
                            document.location = "/wp-content/themes/sankofafamily/es-eway.php?price=" + $("#cartframe").contents().find("#item3price").val();
                        }
                    } else {
                        $.notify("<span class='glyphicon glyphicon-info-sign'></span> EOI 金额应为数字", {
                            type: "warning"
                        });
                    }
                } else {
                    $('.estore-cart').fadeOut(500);
                    $('.estore-paywait').fadeIn(500);
                    document.location = "/wp-content/themes/sankofafamily/es-eway.php";
                }
            }

            function backToLogin() {
                $(".estore-register").fadeOut(500);
                $(".estore-forgotpw").fadeOut(500);
                $(".estore-login").fadeIn(500);
            }

            function forgotPassword() {
                $(".estore-login").fadeOut(500);
                $(".estore-forgotpw").fadeIn(500);
            }

            function validateLogin() {
                var useremail = $('#loginname').val();
                var userpwd = $('#loginpwd').val();

                if ((!isValidEmailAddress(useremail)) || (!useremail)) {
                    $.notify("<span class='glyphicon glyphicon-info-sign'></span> 请检查用户名是否输入正确，且不能为空", {
                        type: "warning"
                    });
                    $('#loginname').css('background-color', '#e08283');
                    $('#loginname').css('border-color', '#FF0000');
                    $('#loginname').css('box-shadow', 'inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6)');
                    $('#loginpwd').css('background-color', '');
                    $('#loginpwd').css('border-color', '');
                    $('#loginpwd').css('box-shadow', '');
                    $('#errloginmsg').hide();
                    return false;
                } else if (!userpwd) {
                    $.notify("<span class='glyphicon glyphicon-info-sign'></span> 密码不能为空", {
                        type: "warning"
                    });
                    $('#loginname').css('background-color', '');
                    $('#loginname').css('border-color', '');
                    $('#loginname').css('box-shadow', '');
                    $('#loginpwd').css('background-color', '#e08283');
                    $('#loginpwd').css('border-color', '#FF0000');
                    $('#loginpwd').css('box-shadow', 'inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6)');
                    $('#errloginmsg').hide();
                    return false;
                } else {
                    return true;
                }
            }

            function validateForgot() {
                var forgotemail = $('#forgotemail').val();
                var forgotphone = $('#forgotphone').val();

                if ((!isValidEmailAddress(forgotemail)) || (!forgotemail)) {
                    $.notify("<span class='glyphicon glyphicon-info-sign'></span> 请检查邮件地址是否输入正确，且不能为空", {
                        type: "warning"
                    });
                    $('#forgotemail').css('background-color', '#e08283');
                    $('#forgotemail').css('border-color', '#FF0000');
                    $('#forgotemail').css('box-shadow', 'inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6)');
                    $('#forgotphone').css('background-color', '');
                    $('#forgotphone').css('border-color', '');
                    $('#forgotphone').css('box-shadow', '');
                    return false;
                } else if ((!forgotphone) || ((forgotphone) && (!(isArabicNumber(forgotphone))))) {
                    if (!forgotphone) {
                        $.notify("<span class='glyphicon glyphicon-info-sign'></span> 电话号码不能为空", {
                            type: "warning"
                        });
                    } else {
                        $.notify("<span class='glyphicon glyphicon-info-sign'></span> 电话号码必须为数字", {
                            type: "warning"
                        });
                    }
                    $('#forgotemail').css('background-color', '');
                    $('#forgotemail').css('border-color', '');
                    $('#forgotemail').css('box-shadow', '');
                    $('#forgotphone').css('background-color', '#e08283');
                    $('#forgotphone').css('border-color', '#FF0000');
                    $('#forgotphone').css('box-shadow', 'inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6)');
                    return false;
                } else {
                    return true;
                }
            }

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
if (isset($_SESSION['esusername'])) {
    navMenuLogin(1,$cookie_value,$_SESSION['esusername']);
} else {
    navMenuLogin(1,$cookie_value,"");
}
?>
            </ul>

            <div class="estore-content w3-content w3-container w3-text-dark-grey sankofa-product-box">
                <div class="w3-row w3-center"><br>
                    <div class="w3-third eitem1">
                        <a href="#" class="estore-item1"><img src="/images/estore-icon1.png" style="width:45%;margin-bottom:10px" class="w3-circle w3-hover-opacity w3-hover-shadow estore-icon1"></a>
                        <h5><?php echo $row1['ProductName']; ?></h5>
                        <div class="estore-item1-hidden w3-white w3-card-2 w3-padding" style="border-radius:4px">
                            <h4><?php echo "AU$" . $row1['Priced']; ?></h4>
                            <p><?php echo $row1['ShortDescription']; ?></p>
                            <button class="estore-btn1 w3-padding" style="margin-bottom:10px">More details</button></div>
                    </div>

                    <div class="w3-third eitem2">
                        <a href="#" class="estore-item2"><img src="/images/estore-icon2.png" style="width:45%;margin-bottom:10px" class="w3-circle w3-hover-opacity w3-hover-shadow estore-icon2"></a>
                        <h5><?php echo $row2['ProductName']; ?></h5>
                        <div class="estore-item2-hidden w3-white w3-card-2 w3-padding" style="border-radius:4px">
                            <h4><?php echo "AU$" . $row2['Priced']; ?></h4>
                            <p><?php echo $row2['ShortDescription']; ?></p>
                            <button class="estore-btn2 w3-padding" style="margin-bottom:10px">More details</button></div>
                    </div>

                    <div class="w3-third eitem3">
                        <a href="#" class="estore-item3"><img src="/images/estore-icon3.png" style="width:45%;margin-bottom:10px" class="w3-circle w3-hover-opacity w3-hover-shadow estore-icon3"></a>
                        <h5><?php echo $row3['ProductName']; ?></h5>
                        <div class="estore-item3-hidden w3-white w3-card-2 w3-padding" style="border-radius:4px">
                            <h4><?php echo "AU$" . $row3['Priced'] . " - " . $row3['MaxPriced']; ?></h4>
                            <p><?php echo $row3['ShortDescription']; ?></p>
                            <button class="estore-btn3 w3-padding" style="margin-bottom:10px">More details</button></div>
                    </div>

                </div>
            </div>

            <div class="estore-login">
                <div class="estore-dialog-login">
                    <a href="#" class="estore-dialog-close w3-hover-opacity"><img src="/images/close.png" style="width:25px"></a>
                    <h4>Login</h4>
                    <form id="loginform" action="/wp-content/themes/sankofafamily/es-login.php" onsubmit="return validateLogin()" method="post">
                        <div class="w3-center">
                            <p><input class="w3-input estore-input-login w3-opacity" type="text" name="loginname" id="loginname" placeholder="用户名 Username"></p>
                            <p><input class="w3-input estore-input-login w3-opacity" type="password" name="loginpwd" id="loginpwd" placeholder="密码 Password"></p>
                            <p style="font-size:12px;color:red;display:none" id="errloginmsg">用户名或密码不正确</p>
                        </div>
                    </form>
                    <div class="w3-center">
                        <button class="estore-btn w3-padding" style="margin-left:-5px;margin-right:10px" id="registerbtn"><span class="glyphicon glyphicon-user"></span> 新用户注册</button>
                        <button class="estore-btn-confirm w3-padding" type="submit" form="loginform" value="Submit"><span class="glyphicon glyphicon-circle-arrow-right"></span> 登录</button>
                        <p style="font-size:13px;margin-bottom:-5px"><a href="#" onclick="forgotPassword();" style="text-decoration:none;color:#666"><span class="glyphicon glyphicon-exclamation-sign"></span> 忘记密码?</a></p>
                    </div>
                </div>
            </div>

            <div class="estore-forgotpw">
                <div class="estore-dialog-forgotpw">
                    <a href="#" class="estore-dialog-close w3-hover-opacity"><img src="/images/close.png" style="width:25px"></a>
                    <form id="forgotform" action="/wp-content/themes/sankofafamily/es-forgotemail.php" onsubmit="return validateForgot()" method="post">
                        <h4>Forgotten Password</h4>
                        <div class="w3-center">
                            <p><input class="w3-input estore-input-login w3-opacity" type="text" name="forgotemail" id="forgotemail" placeholder="电子邮件 Email"></p>
                            <p><input class="w3-input estore-input-login w3-opacity" type="text" name="forgotphone" id="forgotphone" placeholder="电话 Phone"></p>
                        </div>
                    </form>
                    <div class="w3-center">
                        <button class="estore-btn w3-padding" style="margin-left:-5px;margin-right:10px" onclick="backToLogin()"><span class="glyphicon glyphicon-circle-arrow-left"></span> 返回</button>
                        <button class="estore-btn-confirm w3-padding" type="submit" form="forgotform" value="Submit"><span class="glyphicon glyphicon-ok-sign"></span> 确定</button>
                        <p style="font-size:13px;margin-bottom:-5px"><a href="/#sankofa-contact" style="text-decoration:none;color:#666"><span class="glyphicon glyphicon-exclamation-sign"></span> 联系客服协助</a></p>
                    </div>
                </div>
            </div>

            <div class="estore-register">
                <div class="estore-dialog-register">
                    <a href="#" class="estore-dialog-close w3-hover-opacity"><img src="/images/close.png" style="width:25px"></a>
                    <?php if(isset($_GET['editprofile'])) { ?>
                    <h4>Edit Profile</h4>
                    <iframe id="editframe" src="/wp-content/themes/sankofafamily/es-profile.php" style="border:none;width:100%;height:420px"></iframe>
                    <?php } else { ?>
                    <h4>Registration</h4>
                    <iframe id="regframe" src="/wp-content/themes/sankofafamily/es-register.php" style="border:none;width:100%;height:430px"></iframe>
                    <?php } ?>
                    <div class="w3-center">
                        <?php if(isset($_GET['editprofile'])) { ?>
                            <p style="font-size:13px"><a href="/legal" style="text-decoration:none;color:#666" target="_top"><span class="glyphicon glyphicon-question-sign"></span> 需要修改密码？</a></p>
                            <button class="estore-btn w3-padding" style="margin-left:-5px;margin-right:10px" onclick="$('.estore-register').fadeOut(500);"><span class="glyphicon glyphicon-remove-sign"></span> 关闭</button>
                            <button class="estore-btn-confirm w3-padding" id="editbtn"><span class="glyphicon glyphicon-floppy-disk"></span> 保存</button>
                        <?php } else { ?>
                            <p style="font-size:13px"><a href="/legal" style="text-decoration:none;color:#666" target="_top"><span class="glyphicon glyphicon-exclamation-sign"></span> 点击确认表示您已阅读本服务之条款与使用须知</a></p>
                            <button class="estore-btn w3-padding" style="margin-left:-5px;margin-right:10px" onclick="backToLogin()"><span class="glyphicon glyphicon-circle-arrow-left"></span> 返回</button>
                            <button class="estore-btn-confirm w3-padding" id="regbtn"><span class="glyphicon glyphicon-ok-sign"></span> 确定</button>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <div class="estore-cart">
                <div class="estore-dialog-cart">
                    <a href="#" class="estore-close-cart w3-hover-opacity" onclick="closeCart()"><img src="/images/close.png" style="width:25px"></a>
                    <h4>Shopping Cart</h4>
                    <iframe id="cartframe" src="/wp-content/themes/sankofafamily/es-cart.php" style="border:none;width:100%;height:300px"></iframe>
                    <div class="w3-center">
                        <p style="font-size:13px"><a href="/legal" style="text-decoration:none;color:#666" target="_top"><span class="glyphicon glyphicon-exclamation-sign"></span> 点击支付表示您已阅读本服务之条款与使用须知</a></p>
                        <button class="estore-btn w3-padding" style="margin-left:-5px;margin-right:10px" onclick="closeCart()"><span class="glyphicon glyphicon-remove-sign"></span> 关闭</button>
                        <button class="estore-btn-confirm w3-padding" onclick="ewaySubmit()"><span class="glyphicon glyphicon-credit-card"></span> 支付</button>
                    </div>
                </div>
            </div>

            <div class="estore-success">
                <div class="estore-dialog-success">
                    <a href="#" class="estore-dialog-close w3-hover-opacity"><img src="/images/close.png" style="width:25px"></a>
                    <h4>Success</h4>
                    <div class="w3-center">
                        <img src="/images/checked.png" style="width:70%">
                        <p>
                            <?php echo $successmsg; ?>
                        </p>
                        <button class="estore-btn w3-padding" id="successbtn">确定 <span class="glyphicon glyphicon-circle-arrow-right"></span></button>
                    </div>
                </div>
            </div>

            <div class="estore-error">
                <div class="estore-dialog-success">
                    <a href="#" class="estore-dialog-close w3-hover-opacity"><img src="/images/close.png" style="width:25px"></a>
                    <h4>Error</h4>
                    <div class="w3-center">
                        <img src="/images/cancel.png" style="width:70%">
                        <p>
                            <?php echo $errormsg; ?>
                        </p>
                        <button class="estore-btn w3-padding" id="errorbtn">确定 <span class="glyphicon glyphicon-circle-arrow-right"></span></button>
                    </div>
                </div>
            </div>

            <div class="estore-paywait">
                <div class="estore-dialog-paywait">
                    <div class="w3-center">
                        <img src="/images/loading.png" style="width:30%;margin-top:30px">
                        <p>
                            正在加载支付页面，请稍候...
                        </p>
                    </div>
                </div>
            </div>

            <div class="estore-dialog1">
                <div class="estore-dialog-content1">
                    <img src="/images/estore-icon1c.png" style="width:20%;margin-top:3%" class="w3-circle estore-icon">
                    <a href="#" class="estore-dialog-close w3-hover-opacity"><img src="/images/close.png" style="width:25px"></a>
                    <div class="estore-dialog-text">
                        <h4><?php echo $row1['ProductName']; ?></h4>
                        <?php echo $row1['Description']; ?>
                    </div>
                    <div class="w3-center">
                        <button class="estore-btn1c w3-padding" onclick="buyTrustSetup()">Add to cart</button>
                    </div>
                </div>
            </div>

            <div class="estore-dialog2">
                <div class="estore-dialog-content2">
                    <img src="/images/estore-icon2c.png" style="width:20%;margin-top:3%" class="w3-circle estore-icon">
                    <a href="#" class="estore-dialog-close w3-hover-opacity"><img src="/images/close.png" style="width:25px"></a>
                    <div class="estore-dialog-text">
                        <h4><?php echo $row2['ProductName']; ?></h4>
                        <?php echo $row2['Description']; ?>
                    </div>
                    <div class="w3-center">
                        <button class="estore-btn2c w3-padding" onclick="buyBusinessStudy()">Add to cart</button>
                    </div>
                </div>
            </div>

            <div class="estore-dialog3">
                <div class="estore-dialog-content3">
                    <img src="/images/estore-icon3c.png" style="width:20%;margin-top:3%" class="w3-circle estore-icon">
                    <a href="#" class="estore-dialog-close w3-hover-opacity"><img src="/images/close.png" style="width:25px"></a>
                    <!-- <form method="post" action="/wp-content/themes/sankofafamily/exp_interest.php"> -->
                    <div class="estore-dialog-text">
                        <h4><?php echo $row3['ProductName']; ?></h4>
                        <?php echo $row3['Description'];
                        /*if ($_SESSION['interest_status'] == 1) {
                        echo "<p style='color:red;'>* Please enter the correct amount.</p>";
                        $_SESSION['interest_status'] = 0;
                        }*/ ?>
                    </div>
                    <div class="w3-center">
                        <button class="estore-btn3c w3-padding" onclick="buyExpression()">Add to cart</button>
                        <!-- <input type="submit" class="estore-btn3c w3-padding" value="Add to cart"> -->
                    </div>
                    <!-- </form> -->
                </div>
            </div>

            <!-- Footer -->
            <?php returnRights(2,"",""); ?>
        </div>
    </body>

    </html>
