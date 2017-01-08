<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
include 'sf-passwd.php';
$link = mysqli_connect($servername, $username, $password, $dbname);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Required field names
$required = array('clientname', 'email', 'message');

// Loop over field names, make sure each one exists and is not empty
$error = false;
foreach($required as $field) {
  if (empty($_POST[$field])) {
    $error = true;
  }
}

if ($error) {
    header( 'Location: /' ) ;
} else {
    // Escape user inputs for security
    $client_name = mysqli_real_escape_string($link, $_POST['clientname']);
    $email_address = mysqli_real_escape_string($link, $_POST['email']);
    $message = mysqli_real_escape_string($link, $_POST['message']);
    $mysql_date_now = date("Y-m-d H:i:s");
    
    // attempt insert query execution
    $sql = "INSERT INTO sf_messages (clientname, email, messages, message_time) VALUES ('$client_name', '$email_address', '$message', '$mysql_date_now')";
    if(mysqli_query($link, $sql)){
        header( 'Location: /msg-success' ) ;
    } else{
        header( 'Location: /msg-failed' ) ;
    }
 
    // close connection
    mysqli_close($link);
}
?>