<?php
    require_once('sf-passwd.php');
    $mysqli = new mysqli($servername, $username, $password, $dbname);
 
    // Check connection
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    }

    $username = "";
    $output = "";
    if(isset($_REQUEST['username'])) {
        $username = $_REQUEST['username'];
        $query = "SELECT Username FROM cs_users WHERE Username='" . $username . "';";
        $result = $mysqli->query($query);
        if(($result) && ($result->num_rows !== 0)) {
            $output = 'failed';
        } else {
            $output = 'success';
        }
    }
    echo $output;
?>