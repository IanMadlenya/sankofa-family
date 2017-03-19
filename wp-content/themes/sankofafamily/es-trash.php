<?php
session_start();
require_once('DBConnect.php');

$itemid = $_GET['itemid'];
$query = "UPDATE cs_cart SET Trash=1 WHERE Id=" . $itemid . " AND CustomerId=" . $_SESSION['esuserid'];
$mysqli->query($query);

header( 'Location: /estore?cart' );
?>