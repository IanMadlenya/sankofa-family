<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="/css/w3.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/jquery.min.js"></script>
    <script src="/js/checkEmail.js"></script>
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
    </style>
    <script>
        function validateForm() {
            var useremail = $('#username').val();
            var userpwd = $('#espwd').val();
            var cuserpwd = $('#cespwd').val();

            if ((!isValidEmailAddress(useremail)) || (!useremail)) {
                alert("请检查电子邮件是否输入正确");
                $('#username').css('background-color', '#e08283');
                $('#username').css('border-color', '#FF0000');
                $('#username').css('box-shadow', 'inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6)');
                $('#espwd').css('background-color', '');
                $('#espwd').css('border-color', '');
                $('#espwd').css('box-shadow', '');
                $('#cespwd').css('background-color', '');
                $('#cespwd').css('border-color', '');
                $('#cespwd').css('box-shadow', '');
                return false;
            } else if (!userpwd) {
                alert("密码不能为空");
                $('#username').css('background-color', '');
                $('#username').css('border-color', '');
                $('#username').css('box-shadow', '');
                $('#espwd').css('background-color', '#e08283');
                $('#espwd').css('border-color', '#FF0000');
                $('#espwd').css('box-shadow', 'inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6)');
                $('#cespwd').css('background-color', '');
                $('#cespwd').css('border-color', '');
                $('#cespwd').css('box-shadow', '');
                return false;
            } else if (!cuserpwd) {
                alert("请确认密码");
                $('#username').css('background-color', '');
                $('#username').css('border-color', '');
                $('#username').css('box-shadow', '');
                $('#espwd').css('background-color', '');
                $('#espwd').css('border-color', '');
                $('#espwd').css('box-shadow', '');
                $('#cespwd').css('background-color', '#e08283');
                $('#cespwd').css('border-color', '#FF0000');
                $('#cespwd').css('box-shadow', 'inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6)');
                return false;
            } else if (userpwd != cuserpwd) {
                alert("密码不一致，请重新输入");
                $('#username').css('background-color', '');
                $('#username').css('border-color', '');
                $('#username').css('box-shadow', '');
                $('#espwd').css('background-color', '#e08283');
                $('#espwd').css('border-color', '#FF0000');
                $('#espwd').css('box-shadow', 'inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6)');
                $('#cespwd').css('background-color', '#e08283');
                $('#cespwd').css('border-color', '#FF0000');
                $('#cespwd').css('box-shadow', 'inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6)');
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
        <p>其他信息 (可选填)</p>
        <div class="w3-center" style="margin-bottom:30px">
            <p><input class="w3-input estore-input-login w3-opacity" type="text" name="surname" placeholder="姓"></p>
            <p><input class="w3-input estore-input-login w3-opacity" type="text" name="firstname" placeholder="名"></p>
            <p><input class="w3-input estore-input-login w3-opacity" type="text" name="country" placeholder="国家"></p>
            <p><input class="w3-input estore-input-login w3-opacity" type="text" name="state" placeholder="省份/州"></p>
            <p><input class="w3-input estore-input-login w3-opacity" type="text" name="city" placeholder="城市"></p>
            <p><input class="w3-input estore-input-login w3-opacity" type="text" name="address" placeholder="地址"></p>
            <p><input class="w3-input estore-input-login w3-opacity" type="text" name="postcode" placeholder="邮编"></p>
        </div>
    </form>
</body>

</html>
