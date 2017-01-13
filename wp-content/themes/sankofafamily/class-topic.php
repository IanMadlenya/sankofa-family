<?php
/*
Template Name: sankofa-class-topic
*/
include 'footer-rights.php';
$current_user = wp_get_current_user();
$r = 0;

if ( array_shift( $current_user->roles ) == "administrator" ):
?>
<!DOCTYPE HTML>  
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
</head>
<body>  

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <ul class="w3-navbar" id="myNavbar">
    <li><a href="/" class="w3-padding-large w3-text-light-grey">首页</a></li>
      <li><a href="/services" class="w3-padding-large w3-text-light-grey">产品信息</a></li>
      <li><a href="#" class="w3-padding-large w3-text-light-grey">什么是家族办公室</a></li>
      <li><a href="/our-team" class="w3-padding-large w3-text-light-grey">团队介绍</a></li>
      <li><a href="/#sankofa-contact" class="w3-padding-large w3-text-light-grey">联系我们</a></li>
  </ul>
</div>

<!-- Slideshow -->
  <div class="w3-display-container w3-wide sankofa-product-preview w3-opacity2">
    <img src="/images/sydney1.jpg">
    <div class="w3-display-bottomleft w3-text-white w3-container w3-padding-32 w3-hide-small">
        <span class="w3-black w3-padding-large w3-animate-bottom w3-xlarge w3-text-light-grey">微信课堂调查数据</span>
    </div>
  </div>

<div class="w3-text-dark-grey" style="margin-bottom:80px">
<!-- Content -->
<?php
include 'sf-passwd.php';
$tick = "✓";
$cross = "x";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM sf_wechat";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='w3-table'><thead><tr class='w3-black w3-text-white'><th>客户姓名</th><th>电话号码</th><th>家族信托</th><th>移民</th><th>留学</th><th>海外置业</th><th>换汇</th><th>基金投资</th><th>合作伙伴</th><th>其他</th></tr></thead><tbody>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $r = $r + 1;
        if( $row["family"] == "1" ) {
            $family = $tick;
        } else {
            $family = $cross;
        }
        if( $row["immi"] == "1" ) {
            $immi = $tick;
        } else {
            $immi = $cross;
        }
        if( $row["study"] == "1" ) {
            $study = $tick;
        } else {
            $study = $cross;
        }
        if( $row["property"] == "1" ) {
            $property = $tick;
        } else {
            $property = $cross;
        }
        if( $row["forex"] == "1" ) {
            $forex = $tick;
        } else {
            $forex = $cross;
        }
        if( $row["trustfund"] == "1" ) {
            $trustfund = $tick;
        } else {
            $trustfund = $cross;
        }
        if( $row["cooperate"] == "1" ) {
            $coop = $tick;
        } else {
            $coop = $cross;
        }
        if( $row["others"] == "1" ) {
            $others = $tick;
        } else {
            $others = $cross;
        }
        if($r % 2 == 1) {
            echo "<tr class='w3-white w3-hover-dark-grey w3-hover-text-white'><td>". $row["clientname"]. "</td><td>". $row["mobile"]. "</td><td>" . $family . "</td><td>" . $immi . "</td><td>" . $study . "</td><td>" . $property . "</td><td>" . $forex . "</td><td>" . $trustfund . "</td><td>" . $coop . "</td><td>" . $others . "</td></tr>";
        } else {
            echo "<tr class='w3-light-grey w3-hover-dark-grey w3-hover-text-white'><td>". $row["clientname"]. "</td><td>". $row["mobile"]. "</td><td>" . $family . "</td><td>" . $immi . "</td><td>" . $study . "</td><td>" . $property . "</td><td>" . $forex . "</td><td>" . $trustfund . "</td><td>" . $coop . "</td><td>" . $others . "</td></tr>";
        }
    }
    echo "</tbody></table>";
} else { ?>
<div class="w3-center"><h3>数据库无记录!</h3></div>
<?php }
$conn->close();
?>

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
<?php echo $rights; ?>
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
else: 
header( 'Location: /class' ) ;
endif;
?>