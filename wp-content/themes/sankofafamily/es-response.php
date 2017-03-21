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

// Query the transaction result.
$response = $client->queryTransaction($_GET['AccessCode']);

    $transactionResponse = $response->Transactions[0];

    // Display the transaction result
    if ($transactionResponse->TransactionStatus) {
        echo 'Payment successful! ID: ' . 
            $transactionResponse->TransactionID;
    } else {
        $errors = split(', ', $transactionResponse->ResponseMessage);
        foreach ($errors as $error) {
            echo "Payment failed: " .
                \Eway\Rapid::getMessage($error)."<br>";
        }
    }
?>