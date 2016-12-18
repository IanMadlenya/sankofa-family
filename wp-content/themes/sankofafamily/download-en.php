<!DOCTYPE HTML>
<?php
/*
Template Name: sankofa-downloads-en
*/
$r = 0;
$cookie_name = "sk_lan";
$cookie_value = "";

if(!isset($_COOKIE[$cookie_name])) {
    $cookie_value = "en";
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), '/', 'www.smfos.com.au'); // 86400 = 1 day
} else {
    $cookie_value = $_COOKIE[$cookie_name];
    $var = $_GET['set'];
    if($cookie_value == "zh") {
        if($var == "en") {
            $cookie_value = "en";
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), '/', 'www.smfos.com.au'); // 86400 = 1 day
            header( 'Location: /downloads-en' );
        } else {
            header( 'Location: /downloads' );
        }
    } else { ?>
<html>
<head>
<title>Sankofa Multi-Family Offices</title>
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
    <li><a href="/en" class="w3-padding-large w3-text-light-grey">Home</a></li>
      <li><a href="/services-en" class="w3-padding-large w3-text-light-grey">Products</a></li>
      <li><a href="#" class="w3-padding-large w3-text-light-grey">Definition of MFOs</a></li>
      <li><a href="/our-team-en" class="w3-padding-large w3-text-light-grey">Our team</a></li>
      <li><a href="/en#sankofa-contact" class="w3-padding-large w3-text-light-grey">Contact us</a></li>
    <li class="w3-hide-small w3-right">
      <a href="/downloads?set=zh" class="w3-padding-large w3-hover-green w3-text-light-grey">中文</a>
    </li>
  </ul>
</div>

<!-- Slideshow -->
  <div class="w3-display-container w3-wide sankofa-product-preview w3-opacity2">
    <img src="http://www.smfos.com.au/images/sydney1.jpg">
    <div class="w3-display-bottomleft w3-text-white w3-container w3-padding-32 w3-hide-small">
        <span class="w3-black w3-padding-large w3-animate-bottom w3-xlarge w3-text-light-grey">Downloads</span>
    </div>
  </div>

<div class="w3-text-dark-grey" style="margin-bottom:80px">
<!-- Content -->
    <table class="sortable w3-table">
      <thead>
        <tr class="w3-black w3-text-white">
          <th>Filename</th>
          <th>Type</th>
          <th>Size <small>(bytes)</small></th>
          <th>Date modified</th>
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
            case "png": $extn="PNG Image"; break;
            case "jpg": $extn="JPEG Image"; break;
            case "jpeg": $extn="JPEG Image"; break;
            case "doc": $extn="Word Document"; break;
            case "docx": $extn="Word Document"; break;
            case "xls": $extn="Excel Spreadsheet"; break;
            case "xlsx": $extn="Excel Spreadsheet"; break;
            case "ppt": $extn="PowerPoint Slide"; break;
            case "pptx": $extn="PowerPoint Slide"; break;
            case "gif": $extn="GIF Image"; break;
            case "pdf": $extn="PDF File"; break;
            case "zip": $extn="ZIP File"; break;
            
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
<td><img src="http://www.smfos.com.au/images/verified-text-paper.png" style="width:90px"></td>
<td class="w3-border-left w3-border-right"><img src="http://www.smfos.com.au/images/customer-service.png" style="width:90px"></td>
<td><img src="http://www.smfos.com.au/images/cloud-computing.png" style="width:90px"></td>
</tr>
<tr>
<td class="table-heading" style="height:90px">Online Application</td>
<td class="table-heading w3-border-left w3-border-right" style="height:90px">Customer Hotline</td>
<td class="table-heading" style="height:90px">Download Section</td>
</tr>
<tr>
<td style="height:50px"><button class="w3-btn w3-hover-light-grey w3-medium">Apply online</button></td>
<td class="table-middle w3-border-left w3-border-right" style="height:50px"><h2 class="w3-center">+61 (2) 8065 2830</h2></td>
<td style="height: 50px;"><a class="w3-btn w3-hover-light-grey w3-medium" href="/downloads">Download PDFs</a></td>
</tr>
</table>
</div>

<!-- Footer -->
<div class="footer-text w3-round-large w3-hover-black">
<p><img src="/images/warning.png"> Disclaimer: Any general advice in this material does not take into account you or your client‘s personal objectives, financial situation and needs. Please seek advice from a financial adviser or broker and read the relevant IM before making a decision in relation to any investment. In the event of any inconsistency or misinterpretation between the marketing material and SMFOs Pty Ltd.</p>
</div>

<footer class="w3-padding-12 w3-transparent">
    <a href="http://www.sankofafund.com.au"><img src="/images/logo_black.png"></a>
    <p class="w3-left-align">© <?php echo date("Y"); ?> <strong>SMFOs Pty Ltd</strong> (ACN 613532835), All rights reserved.</p>
</footer>
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