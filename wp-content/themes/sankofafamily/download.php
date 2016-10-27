<?php
/*
Template Name: sankofa-downloads
*/
?>
<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
    <title>Sankofa 家族办公室</title>
  <link rel="stylesheet" href="/css/download.css">
  <script src="/js/sorttable.js"></script>
</head>

<body>

  <div id="container">
  
    <h1>SMFOs 文件共享</h1>
    
    <table class="sortable">
      <thead>
        <tr>
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
          
          // Print 'em
          print("
          <tr class='$class'>
            <td><a href='/wp-content/uploads/pdfs/$namehref'>$name</a></td>
            <td><a href='/wp-content/uploads/pdfs/$namehref'>$extn</a></td>
            <td><a href='/wp-content/uploads/pdfs/$namehref'>$size</a></td>
            <td sorttable_customkey='$timekey'><a href='/wp-content/uploads/pdfs/$namehref'>$modtime</a></td>
          </tr>");
          }
        }
      ?>
      </tbody>
    </table>
    <footer>
    <a href="http://www.sankofafund.com.au"><img src="/images/logo_black.png"></a>
    <p>© 2016 <strong>SMFOs Pty Ltd</strong> (ACN 613532835), All rights reserved.</p>
</footer>
  </div>
  
</body>

</html>
