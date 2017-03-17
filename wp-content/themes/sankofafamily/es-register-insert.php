<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
session_start();

require_once('sf-passwd.php');
$mysqli = new mysqli($servername, $username, $password, $dbname);
 
// Check connection
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
}

    // Escape user inputs for security
    $username = $mysqli->real_escape_string($_REQUEST['username']);
    $password = $mysqli->real_escape_string($_REQUEST['espwd']);
    $cardholder = $mysqli->real_escape_string($_REQUEST['cardholder']);
    $cardexpiry = $mysqli->real_escape_string($_REQUEST['cardexpiry']);
    $cardnumber = (int)($mysqli->real_escape_string($_REQUEST['cardnumber']));
    $cardcvv = (int)($mysqli->real_escape_string($_REQUEST['cardcvv']));
    $birthdate = $_REQUEST['birthdate'];
    $address = $mysqli->real_escape_string($_REQUEST['address']);
    $state = $mysqli->real_escape_string($_REQUEST['state']);
    $country = $mysqli->real_escape_string($_REQUEST['country']);
    
    // attempt insert query execution
    $query = "INSERT INTO cs_users (Username, Password, CardHolder, CardNo, CardExpiry, CVV, CreatedDate, Dob, Address, Country) VALUES ('" . $username . "', '" . hash('sha256',$password) . "', '" . $cardholder . "', " . $cardnumber . ", '" . $cardexpiry . "', " . $cardcvv . ", NOW(), '" . $birthdate . "', '" . $address . "', '" . $country . "');";
    $result = $mysqli->query($query);

    if($result) {
        header( 'Location: /estore?successreg' );
    } else {
        header( 'Location: /estore?errorreg' );
    }
?>