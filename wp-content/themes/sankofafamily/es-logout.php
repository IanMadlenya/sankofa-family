<?php
    session_start();
    unset($_SESSION['esusername']);
    unset($_SESSION['esuserid']);
    unset($_SESSION['esdate']);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>