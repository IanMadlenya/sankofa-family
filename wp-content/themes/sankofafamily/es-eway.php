<?php
session_start();
require_once('DBConnect.php');
require_once('eway/include_eway.php');

//eWay Configurations
$apiKey = '';
$apiPassword = '';
$apiEndpoint = '';

// Create the eWAY Client
$client = \Eway\Rapid::createClient($apiKey, $apiPassword, $apiEndpoint);

$price = $_REQUEST['price'];
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

$query = "select sum(Price) as Amount from cs_cart where CustomerId=" . $_SESSION['esuserid'] . " and Sold=0 and Trash=0";
$result = $mysqli->query($query);
$row = $result->fetch_assoc();
$totalamount = $row['Amount'];

    // Transaction details - these would usually come from the application
    $transaction = [
        'Customer' => [
            'FirstName' => 'John',
            'LastName' => 'Smith',
            'Street1' => 'Level 5',
            'Street2' => '369 Queen Street',
            'City' => 'Sydney',
            'State' => 'NSW',
            'PostalCode' => '2000',
            'Country' => 'au',
            'Email' => 'demo@example.org',
        ],
        // These should be set to your actual website (on HTTPS of course)
        'RedirectUrl' => "https://$_SERVER[HTTP_HOST]/wp-content/themes/sankofafamily/es-response.php",
        'CancelUrl' => "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]",
        'TransactionType' => \Eway\Rapid\Enum\TransactionType::PURCHASE,
        'Payment' => [
            'TotalAmount' => $row['Amount'],
        ]
    ];

    // Submit data to eWAY to get a Shared Page URL
    $response = $client->createTransaction(\Eway\Rapid\Enum\ApiMethod::RESPONSIVE_SHARED, $transaction);

    // Check for any errors
    if (!$response->getErrors()) {
        $sharedURL = $response->SharedPaymentUrl;
    } else {
        foreach ($response->getErrors() as $error) {
            echo "Error: ".\Eway\Rapid::getMessage($error)."<br>";
        }
        die();
    }

    echo '<a href="'.$sharedURL.'">Pay with our secure payment page</a>';
?>
