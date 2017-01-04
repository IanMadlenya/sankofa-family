<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost","root","Sankofa809","sankofa-family");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Required field names
$required = array('group_no', 'client_name', 'ref_id_bg', 'ref_id_bdm', 'ref_id_upper', 'city');

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
    $group_no = mysqli_real_escape_string($link, $_POST['group_no']);
    $ref_id = mysqli_real_escape_string($link, $_POST['ref_id']);
    $ref_id_bg = mysqli_real_escape_string($link, $_POST['ref_id_bg']);
    $ref_id_bdm = mysqli_real_escape_string($link, $_POST['ref_id_bdm']);
    $ref_id_upper = mysqli_real_escape_string($link, $_POST['ref_id_upper']);
    $city = mysqli_real_escape_string($link, $_POST['city']);
    $client_name = mysqli_real_escape_string($link, $_POST['client_name']);
    
    // attempt insert query execution
    $sql = "INSERT INTO sf_crm_client_group (group_id, ref_id_referral, ref_id_manage, ref_id_support, ref_id_upper, city) VALUES ('$group_no', '$ref_id_bdm', '$ref_id', '$ref_id_bg', '$ref_id_upper', '$city');";
    $sql .= "INSERT INTO sf_crm_client_info (client_name, group_id) VALUES ('$client_name', '$group_no')";
    if(mysqli_multi_query($link, $sql)){
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else{
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
 
    // close connection
    mysqli_close($link);
}
?>