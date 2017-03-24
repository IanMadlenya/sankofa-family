<?php
session_start();
require_once('DBConnect.php');

if(isset($_SESSION['esuserid'])) {
    $itemid = $_GET['itemid'];
    $quantity = $_GET['quantity'];

    $query = "UPDATE cs_cart SET CartQuantity=" . $quantity . " WHERE Id=" . $itemid . " AND CustomerId=" . $_SESSION['esuserid'];
    $mysqli->query($query);

    if(isset($_GET['price'])) {
        $price = $_REQUEST['price'];
        if(is_numeric($price)) {
            $query = "SELECT Id FROM cs_cart WHERE CartItemId=3 AND CustomerId=" . $_SESSION['esuserid'] . " AND Sold=0 AND Trash=0";
            $result = $mysqli->query($query);
            $row = $result->fetch_assoc();
            $itemid = $row['Id'];

            if($price != 0) {
                $query = "UPDATE cs_cart SET Price=" . $price . " WHERE Id=" . $itemid;
            } else {
                $query = "UPDATE cs_cart SET Trash=1 WHERE Id=" . $itemid;
            }
            $mysqli->query($query);
        }
    }

    header( 'Location: /estore?cart' );
} else {
    header( 'Location: /estore' );
}
?>
