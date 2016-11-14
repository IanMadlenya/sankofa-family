<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost","root","Sankofa809","sankofa-family");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Required field names
$required = array('clientname', 'mobile', 'email', 'wechatid');

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
    $wechatid = mysqli_real_escape_string($link, $_POST['wechatid']);
    $gender_type = mysqli_real_escape_string($link, $_POST['gender']);
    $job_title = mysqli_real_escape_string($link, $_POST['job']);
    
    if (isset($_POST['familytrust']) && ($_POST['familytrust'] == "yes")) {
        $family = 1;
    } else {
        $family = 0;
    }
    if (isset($_POST['immi']) && ($_POST['immi'] == "yes")) {
        $immi = 1;
    } else {
        $immi = 0;
    }
    if (isset($_POST['study']) && ($_POST['study'] == "yes")) {
        $study = 1;
    } else {
        $study = 0;
    }
    if (isset($_POST['property']) && ($_POST['property'] == "yes")) {
        $property = 1;
    } else {
        $property = 0;
    }
    if (isset($_POST['forex']) && ($_POST['forex'] == "yes")) {
        $forex = 1;
    } else {
        $forex = 0;
    }
    if (isset($_POST['trustfund']) && ($_POST['trustfund'] == "yes")) {
        $trustfund = 1;
    } else {
        $trustfund = 0;
    }
    if (isset($_POST['cooperate']) && ($_POST['cooperate'] == "yes")) {
        $coop = 1;
    } else {
        $coop = 0;
    }
    if (isset($_POST['others']) && ($_POST['others'] == "yes")) {
        $others = 1;
    } else {
        $others = 0;
    }
    
    // attempt insert query execution
    $sql = "INSERT INTO sf_wechat (clientname, wechatid, mobile, email, job, gender, family, immi, study, property, forex, trustfund, cooperate, others) VALUES ('$client_name', '$wechatid', '$phone_no', '$email_address', '$job_title', '$gender_type', '$family', '$immi', '$study', '$property', '$forex', '$trustfund', '$coop', '$others')";
    if(mysqli_query($link, $sql)){
        header( 'Location: /class-success' ) ;
    } else{
        header( 'Location: /class-failed' ) ;
    }
 
    // close connection
    mysqli_close($link);
}
?>