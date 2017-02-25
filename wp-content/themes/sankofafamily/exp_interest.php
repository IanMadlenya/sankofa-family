<?php
session_start();
$interest_success = 2;
$interest_failed = 1;

if (($_POST['interest_price'] == "") || ($_POST['interest_price'] < 1000) || ($_POST['interest_price'] > 5000)) {
    $_SESSION['interest_status'] = $interest_failed;
} else {
    $_SESSION['interest_status'] = $interest_success;
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>