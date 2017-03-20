<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
session_start();
require_once('DBConnect.php');

$itemid = $_GET['itemid'];
$quantity = $_GET['quantity'];
$price = $_GET['price'];

// attempt insert query execution
$query = "select * from cs_cart where CartItemId=" . $itemid . " and CustomerId=" . $_SESSION['esuserid'] . " and Sold=0 and Trash=0";
$result = $mysqli->query($query);

if(($result) && ($result->num_rows !== 0)){
    $row = $result->fetch_assoc();
    if($itemid == 3) {
        $price = $price + $row['Price'];
        $query = "UPDATE cs_cart SET Price=" . $price . " WHERE CartItemId=" . $itemid . " AND CustomerId=" . $_SESSION['esuserid'] . " AND Sold=0 AND Trash=0";
    } else {
        $quantity = $quantity + $row['CartQuantity'];
        $query = "UPDATE cs_cart SET CartQuantity=" . $quantity . " WHERE CartItemId=" . $itemid . " AND CustomerId=" . $_SESSION['esuserid'] . " AND Sold=0 AND Trash=0";
    }
    $mysqli->query($query);
} else {
    $query = "INSERT INTO cs_cart (CartItemId, CartQuantity, CustomerId, Price, CreatedDate) VALUES (" . $itemid . ", " . $quantity . ", " . $_SESSION['esuserid'] . ", " . $price . ", NOW())";
    $mysqli->query($query);
}

header( 'Location: /estore?added' );
?>