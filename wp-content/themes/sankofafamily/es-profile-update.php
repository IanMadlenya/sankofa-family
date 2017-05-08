<?php
    session_start();
    require_once('DBConnect.php');

    // Escape user inputs for security
    $phone = $mysqli->real_escape_string($_REQUEST['phone']);
    $postcode = (int)($mysqli->real_escape_string($_REQUEST['postcode']));
    $address = $mysqli->real_escape_string($_REQUEST['address']);
    $city = $mysqli->real_escape_string($_REQUEST['city']);
    $state = $mysqli->real_escape_string($_REQUEST['state']);
    $country = $mysqli->real_escape_string($_REQUEST['country']);
    $surname = $mysqli->real_escape_string($_REQUEST['surname']);
    $firstname = $mysqli->real_escape_string($_REQUEST['firstname']);
    
    // attempt insert query execution
    $query = "UPDATE cs_users SET PostCode=" . $postcode . ",Address='" . $address . "',City='" . $city . "',State='" . $state . "',Country='" . $country . "',SurName='" . $surname . "',FirstName='" . $firstname . "',Phone='" . $phone . "' WHERE Id=" . $_SESSION['esuserid'];
    $result = $mysqli->query($query);

    if($result) {
        header( 'Location: /estore?successedit' );
    } else {
        header( 'Location: /estore?erroredit' );
    }
?>