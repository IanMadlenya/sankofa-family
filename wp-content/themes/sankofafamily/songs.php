<?php
/*
Template Name: sankofa-songs
*/
$r = 0;
date_default_timezone_set('Australia/Sydney');
$date = date('Y-m-d');
$time = date('H:i:s');
$ourdate = "2016-09-20";
$days = round((strtotime($date) - strtotime($ourdate)) / (60 * 60 * 24));
$cookie_name = "sk_date";
$cookie_value = "";
$title = "給BB的歌單";

if(!isset($_COOKIE[$cookie_name])) {
    $cookie_value = $date;
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), '/', 'www.smfos.com.au'); // 86400 = 1 day
} else {
    $cookie_value = $_COOKIE[$cookie_name];
}
?>
<!DOCTYPE HTML>  
<html>
<head>
<title><?php echo $title ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
<link rel="stylesheet" href="/css/w3.css">
<link rel="stylesheet" href="/css/font-awesome.min.css">
<link rel="stylesheet" href="/css/style.css">
<script src="/js/jquery.min.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
</head>
<body>

<!-- Slideshow -->
  <div class="w3-display-container w3-wide sankofa-product-preview w3-opacity2">
    <img src="http://www.smfos.com.au/images/love.png">
    <div class="w3-display-bottomleft w3-text-white w3-container w3-padding-32 w3-hide-small">
        <span class="w3-black w3-padding-large w3-animate-bottom w3-xlarge w3-text-light-grey"><?php echo $title ?></span>
    </div>
  </div>

<div class="w3-content w3-container w3-text-dark-grey sankofa-product-box" style="max-width:1100px;margin-top:80px;margin-bottom:80px">
<!-- Content -->
<?php
$servername = "localhost";
$username = "root";
$password = "Sankofa809";
$dbname = "sankofa-family";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM sf_sherry_songs";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h4>親愛的升: </h4><div class='w3-center'><h4>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if(( $row["tick"] == "0" ) && ($r == 0)) {
            $song = $row["songName"];
            if(strtotime($date) > strtotime($cookie_value)) {
                $sql2 = "UPDATE sf_sherry_songs SET tick = 1 WHERE songName = '$song'";
                $conn->query($sql2);
                $cookie_value = $date;
                setcookie($cookie_name, $cookie_value, time() + (86400 * 30), '/', 'www.smfos.com.au'); // 86400 = 1 day
                header("Refresh:0");
            } else {
                if(strtotime($time) < strtotime('12:00:00')) {
                    echo "早安";
                } elseif (strtotime($time) > strtotime('18:00:00')) {
                    echo "晚安";
                } else {
                    echo "午安";
                }
                echo "，我親愛的升BB， 今天是我們相戀的第 " . $days . " 天。</h4><h4>今天想讓妳聽得歌歌： " . $song . " ，愛妳哦 ❤️~</h4><iframe src='https://embed.spotify.com/?uri=spotify:track:" . $row["spotify"] . "' frameborder='0' allowtransparency='true'></iframe>";
            }
            $r = $r + 1;
        }
    }
    echo "</div><h4>最愛妳的，</h4><h4>翰寶寶</h4>";
} else { ?>
<div class="w3-center"><h3>数据库无记录!</h3></div>
<?php }
$conn->close();
?>
</div>

<footer class="w3-padding-12 w3-transparent">
    <a href="https://github.com/jasonkwh"><img class="w3-round-large" src="/images/jason.jpg" style="height:150px"></a>
    <p class="w3-left-align">© 2016 <strong>JASON WONG</strong>.</p>
</footer>
<script src="/js/back.to.top.js"></script>
<a href="#0" class="cd-top">Top</a>
</body>
</html>