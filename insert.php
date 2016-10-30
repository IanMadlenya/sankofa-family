<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost","root","Sankofa809","sankofa-family");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Required field names
$required = array('clientname', 'mobile', 'email', 'gender');

// Loop over field names, make sure each one exists and is not empty
$error = false;
foreach($required as $field) {
  if (empty($_POST[$field])) {
    $error = true;
  }
}

if ($error) {
    header( 'Location: /class' ) ;
} else {
    // Escape user inputs for security
    $client_name = mysqli_real_escape_string($link, $_POST['clientname']);
    $phone_no = mysqli_real_escape_string($link, $_POST['mobile']);
    $email_address = mysqli_real_escape_string($link, $_POST['email']);
    $job_title = mysqli_real_escape_string($link, $_POST['job']);
    $gender_type = mysqli_real_escape_string($link, $_POST['gender']);
    
    // attempt insert query execution
    $sql = "INSERT INTO wechat (clientname, mobile, email, job, gender) VALUES ('$client_name', '$phone_no', '$email_address', '$job_title', '$gender_type')";
    if(mysqli_query($link, $sql)){
        header( 'Location: /class-success' ) ;
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
 
    // close connection
    mysqli_close($link);
}
?>