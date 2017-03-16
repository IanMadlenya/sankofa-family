<!DOCTYPE html>
<?php
/*
Template Name: sankofa-class-view
*/
$current_user = wp_get_current_user();
include 'navbar.php';
include 'footer-rights.php';
include 'sf-passwd.php';
$r = 0;

if ( array_shift( $current_user->roles ) == "administrator" ) {
    $mysqli = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    }

    if (isset($_SESSION['esdate']) && (time() - $_SESSION['esdate'] > 1800)) {
        $query = "UPDATE cs_users SET LoggedIn=0 WHERE Id=" . $_SESSION['esuserid'];
        $mysqli->query($query);
        unset($_SESSION['esusername']);
        unset($_SESSION['esuserid']);
        unset($_SESSION['esdate']);
    } elseif (isset($_SESSION['esdate']) && (time() - $_SESSION['esdate'] <= 1800)) {
        $_SESSION['esdate'] = time();
    }
?>  
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
<script src="/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="/css/jquery.dataTables.min.css">
<script>
    $(document).ready(function(){
        $('#wechattable').DataTable({
            "sDom": 'rtlfip'
        });
        if($('.sf-dropdown').width() > 200) {
            $('.sf-dropdown-content').css('margin-left',$('.sf-dropdown').width()-200);
        }
    });
</script>
</head>
<body>  

<!-- Navbar (sit on top) -->
<div class="w3-top">
<ul class="w3-navbar" id="myNavbar">
<?php 
echo navMenu("zh");
if (isset($_SESSION['esusername'])) {
    navMenuLogin(0,"zh",$_SESSION['esusername']);
} else {
    navMenuLogin(0,"zh","");
}
?>
</ul>
</div>

<!-- Slideshow -->
  <div class="w3-display-container w3-wide sankofa-product-preview w3-opacity2">
    <img src="/images/sydney1.jpg">
    <div class="w3-display-bottomleft w3-text-white w3-container w3-padding-32 w3-hide-small">
        <span class="w3-black w3-padding-large w3-animate-bottom w3-xlarge w3-text-light-grey">微信课堂登记数据</span>
    </div>
  </div>

<div class="w3-text-dark-grey" style="margin-bottom:80px">
<!-- Content -->
<?php
$query = "SELECT * FROM sf_wechat";
$result = $mysqli->query($query);

if ($result->num_rows > 0) {
    echo "<table class='w3-table' id='wechattable'><thead><tr class='w3-black w3-text-white'><th>客户姓名</th><th>性别</th><th>电话号码</th><th>微信</th><th>电子邮件</th><th>职业</th><th>添加日期</th></tr></thead><tbody>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $r = $r + 1;
        if( $row["gender"] == "1" ) {
            $gender_type = "男";
        } else {
            $gender_type = "女";
        }
        if($r % 2 == 1) {
            echo "<tr class='w3-white w3-hover-dark-grey w3-hover-text-white'><td>". $row["clientname"]. "</td><td>" . $gender_type . "</td><td>". $row["mobile"]. "</td><td>" . $row["wechatid"] . "</td><td>" . $row["email"] . "</td><td>" . $row["job"] . "</td><td>" . $row["date"] . "</td></tr>";
        } else {
            echo "<tr class='w3-light-grey w3-hover-dark-grey w3-hover-text-white'><td>". $row["clientname"]. "</td><td>" . $gender_type . "</td><td>". $row["mobile"]. "</td><td>" . $row["wechatid"] . "</td><td>" . $row["email"] . "</td><td>" . $row["job"] . "</td><td>" . $row["date"] . "</td></tr>";
        }
    }
    echo "</tbody></table>";
} else { ?>
<div class="w3-center"><h3>数据库无记录!</h3></div>
<?php } ?>

<!-- Below Box -->
</div>
<div class="w3-content w3-container w3-text-dark-grey sankofa-product-box" style="max-width:1100px;margin-top:80px;margin-bottom:80px">

<table class="w3-center w3-text-dark-grey">
<tr>
<td><img src="/images/verified-text-paper.png" style="width:90px"></td>
<td class="w3-border-left w3-border-right"><img src="/images/customer-service.png" style="width:90px"></td>
<td><img src="/images/cloud-computing.png" style="width:90px"></td>
</tr>
<tr>
<td class="table-heading" style="height:90px">在线申请</td>
<td class="table-heading w3-border-left w3-border-right" style="height:90px">客服热线</td>
<td class="table-heading" style="height:90px">资料下载</td>
</tr>
<tr>
<td style="height:50px"><button class="w3-btn w3-hover-light-grey w3-medium">立即申请</button></td>
<td class="table-middle w3-border-left w3-border-right" style="height:50px"><h2 class="w3-center">+61 (2) 8065 2830</h2></td>
<td style="height: 50px;"><a class="w3-btn w3-hover-light-grey w3-medium" href="/downloads">下载 PDF</a></td>
</tr>
</table>
</div>

<!-- Footer -->
<?php returnRights(3,"",""); ?>
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
<script src="/js/back.to.top.js"></script>
<a href="#0" class="cd-top">Top</a>
</body>
</html>
<?php
} else {
header( 'Location: /class' ) ;
}
?>