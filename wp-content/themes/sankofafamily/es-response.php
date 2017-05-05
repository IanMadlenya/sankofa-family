<?php
session_start();
require_once('DBConnect.php');
require_once('eway/include_eway.php');
require_once('../../plugins/gmail-smtp/PHPMailer/PHPMailerAutoload.php');

//eWay Configurations
$apiKey = '44DD7AYzqxkpYFVyBIFpq+lZXr23yFw4+GsJ21057HQfHAj/EVeqNvt3lnPxpAP2u/fg3O';
$apiPassword = '5T8jGgM8';
$apiEndpoint = 'Production';

// Create the eWAY Client
$client = \Eway\Rapid::createClient($apiKey, $apiPassword, $apiEndpoint);

// Query the transaction result.
$response = $client->queryTransaction($_GET['AccessCode']);

    $transactionResponse = $response->Transactions[0];

    // Display the transaction result
    echo "<p>Redirecting...</p>";
    $redirectURL = "https://www.smfos.com.au/estore";
    if ($transactionResponse->TransactionStatus) {
        $mail = new PHPMailer();
        $body = "<img src='https://www.smfos.com.au/images/smfos_logo2.png' style='width:300px'><br><p>与客户 " . $_SESSION['esusername'] . " 交易成功，交易号: " . $transactionResponse->TransactionID . "</p><p>请登录 <a href='https://au.myeway.com/'>eWay</a> 浏览交易记录</p><br><p>感谢您使用 SMFOS eStore!</p><p>SMFOS 团队敬上</p>";
        $mail->IsSMTP();
        $mail->CharSet = 'UTF-8';
        $mail->Host = "smtp.exmail.qq.com";
        $mail->Port = "465";
        $mail->Username = "info@sankofafund.com.au";
        $mail->Password = "Sankofa1234";
        $mail->SMTPSecure = "ssl";
        $mail->SMTPAuth = true;
        $mail->From = 'info@sankofafund.com.au';
        $mail->FromName = 'Sankofa 家族办公室';
        $mail->Subject = "SMFOS eStore - Transaction Records";
        $mail->MsgHTML($body);
        $mail->addAddress("george.gao1168@gmail.com");
        $mail->addAddress("george.g@sankofafund.com.au");
        if($mail->Send()) {
            $redirectURL .= "?successpay=" . $transactionResponse->TransactionID;
            header( 'Location: ' . $redirectURL );
        }
    } else {
        $errors = split(', ', $transactionResponse->ResponseMessage);
        $redirectURL .= "?failedpay=";
        foreach ($errors as $error) {
            $redirectURL .= \Eway\Rapid::getMessage($error) . "<br>";
        }
        header( 'Location: ' . $redirectURL );
    }
?>