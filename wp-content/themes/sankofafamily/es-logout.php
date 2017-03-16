<?php
    session_start();
    
    include 'sf-passwd.php';
    $mysqli = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    }
    
    $query = "UPDATE cs_users SET LoggedIn=0 WHERE Id=" . $_SESSION['esuserid'];
    $mysqli->query($query);
    unset($_SESSION['esusername']);
    unset($_SESSION['esuserid']);
    unset($_SESSION['esdate']);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>