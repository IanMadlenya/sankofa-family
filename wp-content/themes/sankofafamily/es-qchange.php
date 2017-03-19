<?php
session_start();
require_once('DBConnect.php');

$itemid = $_GET['itemid'];
$quantity = $_GET['quantity'];

$query = "UPDATE cs_cart SET CartQuantity=" . $quantity . " WHERE Id=" . $itemid . " AND CustomerId=" . $_SESSION['esuserid'];
$mysqli->query($query);

header( 'Location: /estore?cart' );
?>