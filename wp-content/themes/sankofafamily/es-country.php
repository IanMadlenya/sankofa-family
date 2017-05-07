<?php
    require_once('sf-passwd.php');
    $mysqli = new mysqli($servername, $username, $password, $dbname);
 
    // Check connection
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    }

    $country = "";
    $output = "";
    $state = "";
    if(isset($_REQUEST['state'])) {
        $state = $_REQUEST['state'];
    }
    if(isset($_REQUEST['country'])) {
        $country = $_REQUEST['country'];
        $query = "SELECT States FROM cs_states WHERE CountryCode='" . $country . "' ORDER BY States;";
        $result = $mysqli->query($query);
        if(($result) && ($result->num_rows !== 0)) {
            $output = '<select name="state" id="state" class="w3-input estore-input-login w3-opacity" style="height:39px">';
            while($row = $result->fetch_assoc()) {
                $output .= '<option value="' . $row['States'] . '"';
                if($state == $row['States']) {
                    $output .= ' selected';
                }
                $output .= '>' . $row['States'] . '</option>';
            }
            $output .= '</select>';
        } else {
            $output = '<input class="w3-input estore-input-login w3-opacity"';
            if($state != "") {
                $output .= 'value="' . $state . '"';
            }
            $output .= ' type="text" name="state" id="state" placeholder="省份/州 State">';
        }
    }
    echo $output;
?>