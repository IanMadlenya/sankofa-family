<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost","root","Sankofa809","sankofa-family");
$crm_profileuser = $_POST['crm_profileuser'];
$crm_notblank = $_POST['crm_notblank'];
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Required field names
$required = array('crm_username', 'crm_mobileno', 'crm_refid', 'crm_roles', 'crm_jobdesc', 'crm_refid_upper');

// Loop over field names, make sure each one exists and is not empty
$error = false;
foreach($required as $field) {
  if (empty($_POST[$field])) {
    $error = true;
  }
}

if ($error) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    // Escape user inputs for security
    $crm_username = mysqli_real_escape_string($link, $_POST['crm_username']);
    $crm_mobileno = mysqli_real_escape_string($link, $_POST['crm_mobileno']);
    $crm_wechatid = mysqli_real_escape_string($link, $_POST['crm_wechatid']);
    $crm_roles = $_POST['crm_roles'];
    $crm_refid = $_POST['crm_refid'];
    $crm_jobdesc = mysqli_real_escape_string($link, $_POST['crm_jobdesc']);
    $crm_refid_upper = $_POST['crm_refid_upper'];
    
    // attempt insert or update query execution
    if($crm_notblank == 0) {
        $sql = "INSERT INTO sf_crm_info SET ref_id = '$crm_refid', user_name = '$crm_username', mobile_no = '$crm_mobileno', wechat_id = '$crm_wechatid', roles = '$crm_roles', job_desc = '$crm_jobdesc', ref_id_upper = '$crm_refid_upper', user_email = ( SELECT user_email FROM sf_users WHERE user_nicename = '$crm_profileuser'), user_login = ( SELECT user_login FROM sf_users WHERE user_nicename = '$crm_profileuser')";
    } else {
        $sql = "UPDATE sf_crm_info SET ref_id = '$crm_refid', user_name = '$crm_username', mobile_no = '$crm_mobileno', wechat_id = '$crm_wechatid', roles = '$crm_roles', job_desc = '$crm_jobdesc', ref_id_upper = '$crm_refid_upper' WHERE user_login = '$crm_profileuser'";
    }
    
    if(mysqli_query($link, $sql)){
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else{
        echo "Error updating record: " . mysqli_error($link);
    }
 
    // close connection
    mysqli_close($link);
}
?>