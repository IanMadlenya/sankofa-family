<?php
session_start();
require_once('sf-passwd.php');
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
}

if (isset($_SESSION['esdate']) && (time() - $_SESSION['esdate'] > 1800)) {
    $query = "UPDATE cs_users SET LoggedIn=0 WHERE Id=" . $_SESSION['esuserid'];
    $mysqli->query($query);
    unset($_SESSION['esusername']);
    unset($_SESSION['esuserid']);
    unset($_SESSION['esdate']);
} elseif (isset($_SESSION['esdate']) && (time() - $_SESSION['esdate'] <= 1800)) {
    $_SESSION['esdate'] = time();
}
?>