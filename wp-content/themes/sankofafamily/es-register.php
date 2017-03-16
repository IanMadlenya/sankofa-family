<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="/css/w3.css">
<link rel="stylesheet" href="/css/font-awesome.min.css">
<link rel="stylesheet" href="/css/style.css">
    <script src="/js/jquery.min.js"></script>
    <script src="/js/checkEmail.js"></script>
    <script>
        function validateForm(){
            var useremail = $('#username').val();
            var userpwd = $('#espwd').val();
            var cuserpwd = $('#cespwd').val();

            if((!isValidEmailAddress(useremail)) || (!useremail)) {
                alert("请检查电子邮件是否输入正确");
                $('#username').css('background-color','#e08283');
                $('#username').css('border-color','#FF0000');
                $('#username').css('box-shadow','inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6)');
                $('#espwd').css('background-color','');
                $('#espwd').css('border-color','');
                $('#espwd').css('box-shadow','');
                $('#cespwd').css('background-color','');
                $('#cespwd').css('border-color','');
                $('#cespwd').css('box-shadow','');
                return false;
            } else if(!userpwd) {
                alert("密码不能为空");
                $('#username').css('background-color','');
                $('#username').css('border-color','');
                $('#username').css('box-shadow','');
                $('#espwd').css('background-color','#e08283');
                $('#espwd').css('border-color','#FF0000');
                $('#espwd').css('box-shadow','inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6)');
                $('#cespwd').css('background-color','');
                $('#cespwd').css('border-color','');
                $('#cespwd').css('box-shadow','');
                return false;
            } else if(!cuserpwd) {
                alert("请确认密码");
                $('#username').css('background-color','');
                $('#username').css('border-color','');
                $('#username').css('box-shadow','');
                $('#espwd').css('background-color','');
                $('#espwd').css('border-color','');
                $('#espwd').css('box-shadow','');
                $('#cespwd').css('background-color','#e08283');
                $('#cespwd').css('border-color','#FF0000');
                $('#cespwd').css('box-shadow','inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6)');
                return false;
            } else if(userpwd != cuserpwd) {
                alert("密码不一致，请重新输入");
                $('#username').css('background-color','');
                $('#username').css('border-color','');
                $('#username').css('box-shadow','');
                $('#espwd').css('background-color','#e08283');
                $('#espwd').css('border-color','#FF0000');
                $('#espwd').css('box-shadow','inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6)');
                $('#cespwd').css('background-color','#e08283');
                $('#cespwd').css('border-color','#FF0000');
                $('#cespwd').css('box-shadow','inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6)');
                return false;
            } else {
                return true;
            }
        }
    </script>
</head>
<body>
<form id="regform" action="/wp-content/themes/sankofafamily/es-register-insert.php" onsubmit="return validateForm()" method="post" target="_top">
<p>个人信息</p>
<div class="w3-center" style="margin-bottom:30px">
<p><input class="w3-input estore-input-login w3-opacity" type="text" name="username" id="username" placeholder="电子邮件（作为用户名）"></p>
<p><input class="w3-input estore-input-login w3-opacity" type="password" name="espwd" id="espwd" placeholder="密码"></p>
<p><input class="w3-input estore-input-login w3-opacity" type="password" name="cespwd" id="cespwd" placeholder="确认密码"></p>
</div>
<p>信用卡资料 (可选填)</p>
<div class="w3-center" style="margin-bottom:30px">
<p><input class="w3-input estore-input-login w3-opacity" type="text" name="cardholder" placeholder="持卡人姓名"></p>
<p><input class="w3-input estore-input-login w3-opacity" type="text" name="cardnumber" placeholder="信用卡号码"></p>
<p><input class="w3-input estore-input-login w3-opacity" type="text" name="cardexpiry" placeholder="到期年月 (MM/YY)"></p>
<p><input class="w3-input estore-input-login w3-opacity" type="text" name="cardcvv" placeholder="CVV"></p>
</div>
<p>其他信息 (可选填)</p>
<div class="w3-center" style="margin-bottom:30px">
<p><input class="w3-input estore-input-login w3-opacity" type="text" name="birthdate" placeholder="出生日期"></p>
<p><input class="w3-input estore-input-login w3-opacity" type="text" name="address" placeholder="地址"></p>
<p><input class="w3-input estore-input-login w3-opacity" type="text" name="state" placeholder="省份/州"></p>
<p><input class="w3-input estore-input-login w3-opacity" type="text" name="country" placeholder="国家"></p>
</div>
</form>
<div class="w3-center">
<p style="font-size:13px"><a href="/legal" style="text-decoration:none;color:#666" target="_top"><span class="glyphicon glyphicon-exclamation-sign"></span> 点击确认表示您已阅读本服务之条款与使用须知</a></p>
<button class="estore-btn-confirm w3-padding" type="submit" form="regform" value="Submit"><span class="glyphicon glyphicon-circle-arrow-right"></span> 确定</button>
</div>
</body>
</html>