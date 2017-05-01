<?php
require_once('../../plugins/gmail-smtp/PHPMailer/PHPMailerAutoload.php');
require_once('sf-passwd.php');
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$username = trim($_REQUEST['forgotemail']);
$userphone = trim($_REQUEST['forgotphone']);
$randpwd = generateRandomString(10);
$mailsend = 1;

$query = "SELECT * FROM cs_users WHERE Username='" . $username . "' and Phone='" . $userphone . "'";
$result = $mysqli->query($query);
if(($result) && ($result->num_rows !== 0)){
    $query = "UPDATE cs_users SET Password='" . hash('sha256',$randpwd) . "' WHERE Username='" . $username . "'";
    $mysqli->query($query);
    $mail = new PHPMailer();
    $body = "<img src='https://www.smfos.com.au/images/smfos_logo2.png' style='width:300px'><br><p>亲爱的 " . $username . " ，我们已为您随机生成了新的密码: </p><h3><strong>" . $randpwd . "</strong></h3><p>请使用以上密码再次登录 <a href='https://www.smfos.com.au/estore?login&loginname=" . $username . "&loginpwd=" . $randpwd . "'>eStore</a> ，并在设置页面重新设定您的个人密码。</p><p>如页面无法转接，请复制以下链接至浏览器地址栏，并点击回车键:</p><p><a href='https://www.smfos.com.au/estore?login&loginname=" . $username . "&loginpwd=" . $randpwd . "'>https://www.smfos.com.au/estore?login&loginname=" . $username . "&loginpwd=" . $randpwd . "</a></p><br><p>感谢您使用 SMFOS eStore!</p><p>SMFOS 团队敬上</p>";
    $mail->IsSMTP();
    $mail->Host = "smtp.exmail.qq.com";
    $mail->Port = "465";
    $mail->Username = "info@sankofafund.com.au";
    $mail->Password = "Sankofa1234";
    $mail->SMTPSecure = "ssl";
    $mail->SMTPAuth = true;
    $mail->From = 'info@sankofafund.com.au';
    $mail->FromName = 'Sankofa Multi-Family Offices';
    $mail->Subject = "SMFOS eStore - Forgotten Password";
    $mail->MsgHTML($body);
    $mail->addAddress($username);
    if(!$mail->Send()) {
        $mailsend = 0;
    } else {
        $mailsend = 1;
    }
} else {
    $mailsend = 0;
}

if($mailsend == 1) {
    header( 'Location: /estore?successfg' );
} else {
    header( 'Location: /estore?failfg' );
}

?>