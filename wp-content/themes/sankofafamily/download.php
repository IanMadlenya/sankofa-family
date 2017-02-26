<!DOCTYPE html>
<?php
/*
Template Name: sankofa-downloads
*/
$current_user = wp_get_current_user();
include 'navbar.php';
include 'footer-rights.php';
$r = 0;
$cookie_name = "sk_lan";
$cookie_value = "";

if(!isset($_COOKIE[$cookie_name])) {
    $cookie_value = "zh";
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), '/', 'www.smfos.com.au'); // 86400 = 1 day
} else {
    $cookie_value = $_COOKIE[$cookie_name];
    $var = $_GET['set'];
    if($cookie_value == "en") {
        if($var == "zh") {
            $cookie_value = "zh";
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), '/', 'www.smfos.com.au'); // 86400 = 1 day
            header( 'Location: /downloads' );
        } else {
            header( 'Location: /downloads-en' );
        }
    } else { ?>
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
<style>
a {text-decoration: none}
</style>
</head>
<body>  

<!-- Navbar (sit on top) -->
<div class="w3-top">
<ul class="w3-navbar" id="myNavbar">
<?php 
echo navMenu($cookie_value);
if ( $current_user->exists() ) {
    navMenuLogin(0,$cookie_value,$current_user->user_login);
} else {
    navMenuLogin(0,$cookie_value,"");
}
?>
</ul>
</div>

<!-- Slideshow -->
  <div class="w3-display-container w3-wide sankofa-product-preview w3-opacity2">
    <img src="/images/sydney1.jpg">
    <div class="w3-display-bottomleft w3-text-white w3-container w3-padding-32 w3-hide-small">
        <span class="w3-black w3-padding-large w3-animate-bottom w3-xlarge w3-text-light-grey">文件下载</span>
    </div>
  </div>

<div class="w3-text-dark-grey" style="margin-bottom:80px">
<!-- Content -->
    <table class="sortable w3-table">
      <thead>
        <tr class="w3-black w3-text-white">
          <th>文件名</th>
          <th>类型</th>
          <th>文件大小 <small>(字节)</small></th>
          <th>修改日期</th>
        </tr>
      </thead>
      <tbody>
      <?php
        // Opens directory
        $myDirectory=opendir("./wp-content/uploads/pdfs");
        
        // Gets each entry
        while($entryName=readdir($myDirectory)) {
          $dirArray[]=$entryName;
        }
        
        // Finds extensions of files
        function findexts ($filename) {
          $filename=strtolower($filename);
          $exts=split("[/\\.]", $filename);
          $n=count($exts)-1;
          $exts=$exts[$n];
          return $exts;
        }
        
        // Closes directory
        closedir($myDirectory);
        
        // Counts elements in array
        $indexCount=count($dirArray);
        
        // Sorts files
        sort($dirArray);
        
        // Loops through the array of files
        for($index=0; $index < $indexCount; $index++) {
        
          // Allows ./?hidden to show hidden files
          if($_SERVER['QUERY_STRING']=="hidden")
          {$hide="";
          $ahref="./";
          $atext="Hide";}
          else
          {$hide=".";
          $ahref="./?hidden";
          $atext="Show";}
          if(substr("$dirArray[$index]", 0, 1) != $hide) {
          
          // Gets File Names
          $name=$dirArray[$index];
          $namehref=$dirArray[$index];
          
          // Gets Extensions 
          $extn=findexts("./wp-content/uploads/pdfs/$namehref"); 
          
          // Gets file size 
          $size=number_format(filesize("./wp-content/uploads/pdfs/$namehref"));
          
          // Gets Date Modified Data
          $modtime=date("M j Y g:i A", filemtime("./wp-content/uploads/pdfs/$namehref"));
          $timekey=date("YmdHis", filemtime("./wp-content/uploads/pdfs/$namehref"));
          
          // Prettifies File Types, add more to suit your needs.
          switch ($extn){
            case "png": $extn="PNG 图片"; break;
            case "jpg": $extn="JPEG 图片"; break;
            case "jpeg": $extn="JPEG 图片"; break;
            case "doc": $extn="Word 文件"; break;
            case "docx": $extn="Word 文件"; break;
            case "xls": $extn="Excel 表格"; break;
            case "xlsx": $extn="Excel 表格"; break;
            case "ppt": $extn="PowerPoint 幻灯片"; break;
            case "pptx": $extn="PowerPoint 幻灯片"; break;
            case "gif": $extn="GIF 图片"; break;
            case "pdf": $extn="PDF 文件"; break;
            case "zip": $extn="ZIP 压缩文件"; break;
            
            default: $extn=strtoupper($extn)." File"; break;
          }
          
          // Separates directories
          if(is_dir($dirArray[$index])) {
            $extn="&lt;Directory&gt;"; 
            $size="&lt;Directory&gt;"; 
            $class="dir";
          } else {
            $class="file";
          }
          
          // Cleans up . and .. directories 
          if($name=="."){$name=". (Current Directory)"; $extn="&lt;System Dir&gt;";}
          if($name==".."){$name=".. (Parent Directory)"; $extn="&lt;System Dir&gt;";}
          
        $r = $r + 1;      
        
          // Print 'em
        if($r % 2 == 1) {
            print("
          <tr class='$class w3-white w3-hover-dark-grey w3-hover-text-white'>
            <td><a href='/wp-content/uploads/pdfs/$namehref'>$name</a></td>
            <td><a href='/wp-content/uploads/pdfs/$namehref'>$extn</a></td>
            <td><a href='/wp-content/uploads/pdfs/$namehref'>$size</a></td>
            <td sorttable_customkey='$timekey'><a href='/wp-content/uploads/pdfs/$namehref'>$modtime</a></td>
          </tr>");
        } else {
            print("
          <tr class='$class w3-light-grey w3-hover-dark-grey w3-hover-text-white'>
            <td><a href='/wp-content/uploads/pdfs/$namehref'>$name</a></td>
            <td><a href='/wp-content/uploads/pdfs/$namehref'>$extn</a></td>
            <td><a href='/wp-content/uploads/pdfs/$namehref'>$size</a></td>
            <td sorttable_customkey='$timekey'><a href='/wp-content/uploads/pdfs/$namehref'>$modtime</a></td>
          </tr>");
        }
          }
        }
      ?>
      </tbody>
    </table>

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
<?php returnRights(0,"zh","/downloads-en?set=en"); ?>
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
<?php } } ?>