<?php
    session_start();
    require_once('DBConnect.php');

    $query = "SELECT * FROM cs_users WHERE Id=" . $_SESSION['esuserid'];
    $result = $mysqli->query($query);
    $rowdb = $result->fetch_assoc();
?>
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
        $(document).ready(function() {
            $.post("es-country.php", { country: "<?php echo $rowdb['Country']; ?>",state: "<?php echo $rowdb['State']; ?>" }, function(data) {
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
            var surname = $('#surname').val();
            var firstname = $('#firstname').val();
            var postcode = $('#postcode').val();
            var city = $('#city').val();
            var address = $('#address').val();
            var state = $('#state').val();

            if ((!surname) || ((surname) && (!(isAlphaOrParen(surname))))) {
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
    </script>
</head>

<body>
    <form id="editform" action="/wp-content/themes/sankofafamily/es-profile-update.php" onsubmit="return validateForm()" method="post" target="_top">
        <p>个人信息</p>
        <div class="w3-center" style="margin-bottom:30px">
            <p><input class="w3-input estore-input-login w3-opacity" value="<?php echo $rowdb['SurName']; ?>" type="text" name="surname" id="surname" placeholder="姓 Last Name"></p>
            <p><input class="w3-input estore-input-login w3-opacity" value="<?php echo $rowdb['FirstName']; ?>" type="text" name="firstname" id="firstname" placeholder="名 First Name"></p>
            <p>
<select name="country" id="country" class="w3-input estore-input-login w3-opacity" style="height:39px" onchange="changeCountry()">
<?php
    $query = "SELECT * FROM cs_countries ORDER BY Country";
    $result = $mysqli->query($query);
    while($row = $result->fetch_assoc()) {
        if($row['CountryCode'] != $rowdb['Country']) {
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
            <p><input class="w3-input estore-input-login w3-opacity" value="<?php echo $rowdb['City']; ?>" type="text" name="city" id="city" placeholder="城市 City"></p>
            <p><input class="w3-input estore-input-login w3-opacity" value="<?php echo $rowdb['Address']; ?>" type="text" name="address" id="address" placeholder="地址 Address"></p>
            <p><input class="w3-input estore-input-login w3-opacity" value="<?php echo $rowdb['PostCode']; ?>" type="text" name="postcode" id="postcode" placeholder="邮编 Post Code"></p>
        </div>
    </form>
</body>

</html>
