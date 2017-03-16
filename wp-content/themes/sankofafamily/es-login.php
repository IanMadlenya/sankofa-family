<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
session_start();

include 'sf-passwd.php';
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
}

// Escape user inputs for security
$username = $_REQUEST['loginname'];
$password = hash('sha256',$_REQUEST['loginpwd']);

// attempt insert query execution
$query = "select * from cs_users where Username='" . $username . "' and Password='" . $password . "';";
$result = $mysqli->query($query);

if(($result) && ($result->num_rows !== 0)){
    $row = $result->fetch_assoc();
    $_SESSION['esusername'] = $row['Username'];
    $_SESSION['esuserid'] = $row['Id'];
    $_SESSION['esdate'] = time();
    header( 'Location: /estore' );
} else {
    header( 'Location: /estore?errorlogin' );
}
?>