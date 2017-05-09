<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
require_once('sf-passwd.php');
$mysqli = new mysqli($servername, $username, $password, $dbname);
 
// Check connection
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
}

    // Escape user inputs for security
    $username = $mysqli->real_escape_string(strtolower($_REQUEST['username']));
    $password = $mysqli->real_escape_string($_REQUEST['espwd']);
    $phone = $mysqli->real_escape_string($_REQUEST['phone']);
    $postcode = (int)($mysqli->real_escape_string($_REQUEST['postcode']));
    $address = $mysqli->real_escape_string($_REQUEST['address']);
    $city = $mysqli->real_escape_string($_REQUEST['city']);
    $state = $mysqli->real_escape_string($_REQUEST['state']);
    $country = $mysqli->real_escape_string($_REQUEST['country']);
    $surname = $mysqli->real_escape_string($_REQUEST['surname']);
    $firstname = $mysqli->real_escape_string($_REQUEST['firstname']);
    
    // attempt insert query execution
    $query = "INSERT INTO cs_users (Username, Password, PostCode, CreatedDate, State, Address, Country, City, SurName, FirstName, Phone) VALUES ('" . $username . "', '" . hash('sha256',$password) . "', " . $postcode . ", NOW(), '" . $state . "', '" . $address . "', '" . $country . "', '" . $city . "', '" . $surname . "', '" . $firstname . "', '" . $phone . "');";
    $result = $mysqli->query($query);

    if($result) {
        header( 'Location: /estore?successreg' );
    } else {
        header( 'Location: /estore?errorreg' );
    }
?>