<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/css/w3.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/jquery.min.js"></script>
    <script src="/js/addclear.min.js"></script>
    <script src="/js/regexCheck.js"></script>
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
        var checkuser = 0;
        
        $(document).ready(function() {
            $.post("es-country.php", { country: "AU" }, function(data) {
                $("#states").html(data);
            });
        });
        
        $(function() {
            $("input").addClear({
                closeSymbol: "<span class='glyphicon glyphicon-remove-sign'></span>",
                color: "rgb(247,249,249)",
                top: 0,
                right: 20,
                hideOnBlur: true,
                onClear: function() {
                    clearInputStyle();
                }
            });
        });

        function clearInputStyle() {
            $("#checkUserFail").hide();
            $('#username').css('background-color', '');
            $('#username').css('border-color', '');
            $('#username').css('box-shadow', '');
            $('#phone').css('background-color', '');
            $('#phone').css('border-color', '');
            $('#phone').css('box-shadow', '');
            $('#espwd').css('background-color', '');
            $('#espwd').css('border-color', '');
            $('#espwd').css('box-shadow', '');
            $('#cespwd').css('background-color', '');
            $('#cespwd').css('border-color', '');
            $('#cespwd').css('box-shadow', '');
            $('#surname').css('background-color', '');
            $('#surname').css('border-color', '');
            $('#surname').css('box-shadow', '');
            $('#firstname').css('background-color', '');
            $('#firstname').css('border-color', '');
            $('#firstname').css('box-shadow', '');
            $('#postcode').css('background-color', '');
            $('#postcode').css('border-color', '');
            $('#postcode').css('box-shadow', '');
            $('#city').css('background-color', '');
            $('#city').css('border-color', '');
            $('#city').css('box-shadow', '');
            $('#address').css('background-color', '');
            $('#address').css('border-color', '');
            $('#address').css('box-shadow', '');
            $('#state').css('background-color', '');
            $('#state').css('border-color', '');
            $('#state').css('box-shadow', '');
        }

        function validateForm() {
            var useremail = $('#username').val();
            var userpwd = $('#espwd').val();
            var cuserpwd = $('#cespwd').val();
            var phone = $('#phone').val();
            var surname = $('#surname').val();
            var firstname = $('#firstname').val();
            var postcode = $('#postcode').val();
            var city = $('#city').val();
            var address = $('#address').val();
            var state = $('#state').val();

            if ((!isValidEmailAddress(useremail)) || (!useremail) || (checkuser == 1)) {
                if(checkuser == 1) {
                    alert("用户名已被使用");
                } else {
                    alert("请检查电子邮件是否输入正确");
                }
                clearInputStyle();
                $('#username').css('background-color', '#e08283');
                $('#username').css('border-color', '#FF0000');
                $('#username').css('box-shadow', 'inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6)');
                return false;
            } else if ((!phone) || ((phone) && (!(isArabicNumber(phone))))) {
                if (!phone) {
                    alert("联系电话不能为空");
                } else {
                    alert("联系电话必须为数字");
                }
                clearInputStyle();
                $('#phone').css('background-color', '#e08283');
                $('#phone').css('border-color', '#FF0000');
                $('#phone').css('box-shadow', 'inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6)');
                return false;
            } else if (!userpwd) {
                alert("密码不能为空");
                clearInputStyle();
                $('#espwd').css('background-color', '#e08283');
                $('#espwd').css('border-color', '#FF0000');
                $('#espwd').css('box-shadow', 'inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6)');
                return false;
            } else if (!cuserpwd) {
                alert("请确认密码");
                clearInputStyle();
                $('#cespwd').css('background-color', '#e08283');
                $('#cespwd').css('border-color', '#FF0000');
                $('#cespwd').css('box-shadow', 'inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6)');
                return false;
            } else if (userpwd != cuserpwd) {
                alert("密码不一致，请重新输入");
                clearInputStyle();
                $('#espwd').css('background-color', '#e08283');
                $('#espwd').css('border-color', '#FF0000');
                $('#espwd').css('box-shadow', 'inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6)');
                $('#cespwd').css('background-color', '#e08283');
                $('#cespwd').css('border-color', '#FF0000');
                $('#cespwd').css('box-shadow', 'inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6)');
                return false;
            } else if ((!surname) || ((surname) && (!(isAlphaOrParen(surname))))) {
                if(!surname) {
                    alert("姓氏不能为空")
                } else {
                    alert("姓氏必须为英文字母");   
                }
                clearInputStyle();
                $('#surname').css('background-color', '#e08283');
                $('#surname').css('border-color', '#FF0000');
                $('#surname').css('box-shadow', 'inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6)');
                return false;
            } else if ((!firstname) || ((firstname) && (!(isAlphaOrParen(firstname))))) {
                if(!firstname) {
                    alert("名字不能为空");
                } else {
                    alert("名字必须为英文字母");
                }
                clearInputStyle();
                $('#firstname').css('background-color', '#e08283');
                $('#firstname').css('border-color', '#FF0000');
                $('#firstname').css('box-shadow', 'inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6)');
                return false;
            } else if ((!state) || ((state && (isAsianCharater(state))))) {
                if(!state) {
                    alert("省份不能为空");
                } else {
                    alert("省份不能包含汉字");
                }
                clearInputStyle();
                $('#state').css('background-color', '#e08283');
                $('#state').css('border-color', '#FF0000');
                $('#state').css('box-shadow', 'inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6)');
                return false;
            } else if ((!city) || ((city) && (!(isAlphaOrParen(city))))) {
                if(!city) {
                    alert("城市不能为空");
                } else {
                    alert("城市名称必须为英文字母");   
                }
                clearInputStyle();
                $('#city').css('background-color', '#e08283');
                $('#city').css('border-color', '#FF0000');
                $('#city').css('box-shadow', 'inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6)');
                return false;
            } else if ((!address) || ((address) && (isAsianCharater(address)))) {
                if(!address) {
                    alert("地址不能为空");
                } else {
                    alert("地址不能包含汉字");
                }
                clearInputStyle();
                $('#address').css('background-color', '#e08283');
                $('#address').css('border-color', '#FF0000');
                $('#address').css('box-shadow', 'inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6)');
                return false;
            } else if ((!postcode) || ((postcode) && (!(isArabicNumber(postcode))))) {
                if(!postcode) {
                    alert("邮编不能为空");
                } else {
                    alert("邮编必须为数字");
                }
                clearInputStyle();
                $('#postcode').css('background-color', '#e08283');
                $('#postcode').css('border-color', '#FF0000');
                $('#postcode').css('box-shadow', 'inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6)');
                return false;
            } else {
                return true;
            }
        }
        
        function changeCountry() {
            $("#state").remove();
            var country = $("#country").val();
            $.post("es-country.php", { country: country }, function(data) {
                $("#states").html(data);
            });
        }
        
        function checkUsername() {
            var username = $("#username").val();
            $.post("es-checkuser.php", { username: username }, function(data) {
                if(data == "failed") {
                    checkuser = 1;
                    clearInputStyle();
                    $("#checkUserFail").show();
                    $('#username').css('background-color', '#e08283');
                    $('#username').css('border-color', '#FF0000');
                    $('#username').css('box-shadow', 'inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6)');
                } else {
                    checkuser = 0;
                    clearInputStyle();
                }
            });
        }
    </script>
</head>

<body>
    <form id="regform" action="/wp-content/themes/sankofafamily/es-register-insert.php" onsubmit="return validateForm()" method="post" target="_top">
        <p>基本信息</p>
        <p id="checkUserFail" style="color:red;font-size:12px;margin-bottom:-10px;margin-left:10px;display:none">* 用户名已被使用.</p>
        <div class="w3-center" style="margin-bottom:30px">
            <p><input class="w3-input estore-input-login w3-opacity" type="text" name="username" id="username" placeholder="电子邮件 Email" onkeyup="checkUsername()"></p>
            <p><input class="w3-input estore-input-login w3-opacity" type="password" name="espwd" id="espwd" placeholder="密码 Password"></p>
            <p><input class="w3-input estore-input-login w3-opacity" type="password" name="cespwd" id="cespwd" placeholder="确认密码 Confirm Password"></p>
        </div>
        <p>个人信息</p>
        <div class="w3-center" style="margin-bottom:30px">
            <p><input class="w3-input estore-input-login w3-opacity" type="text" name="surname" id="surname" placeholder="姓 Last Name"></p>
            <p><input class="w3-input estore-input-login w3-opacity" type="text" name="firstname" id="firstname" placeholder="名 First Name"></p>
            <p><input class="w3-input estore-input-login w3-opacity" type="text" name="phone" id="phone" placeholder="联系电话 Phone"></p>
            <p>
<select name="country" id="country" class="w3-input estore-input-login w3-opacity" style="height:39px" onchange="changeCountry()">
<?php
    require_once('sf-passwd.php');
    $mysqli = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    }  
    
    $query = "SELECT * FROM cs_countries ORDER BY Country";
    $result = $mysqli->query($query);
    while($row = $result->fetch_assoc()) {
        if($row['CountryCode'] != "AU") {
            echo '<option value="' . $row['CountryCode'] . '">' . $row['Country'] . '</option>';
        } else {
            echo '<option value="' . $row['CountryCode'] . '" selected>' . $row['Country'] . '</option>';
        }
    }
?>
</select>
            </p>
            <div id="states">
            </div>
            <p><input class="w3-input estore-input-login w3-opacity" type="text" name="city" id="city" placeholder="城市 City"></p>
            <p><input class="w3-input estore-input-login w3-opacity" type="text" name="address" id="address" placeholder="地址 Address"></p>
            <p><input class="w3-input estore-input-login w3-opacity" type="text" name="postcode" id="postcode" placeholder="邮编 Post Code"></p>
        </div>
    </form>
</body>

</html>
