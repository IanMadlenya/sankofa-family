<?php
require_once('../../plugins/gmail-smtp/PHPMailer/PHPMailerAutoload.php');

$mail = new PHPMailer();
$body = "<img src='https://www.smfos.com.au/images/smfos_logo2.png' style='width:300px'><br><p>亲爱的 jasonkwh@gmail.com ，我们已为您随机生成了新的密码: </p><h3><strong>hadasdasdas</strong></h3><p>请使用以上密码再次登录 <a href='https://www.smfos.com.au/estore?login&loginname=jasonkwh@gmail.com&loginpwd=haha'>eStore</a> ，并在设置页面重新设定您的个人密码。</p><p>如页面无法转接，请复制以下链接至浏览器地址栏，并点击回车键:</p><p><a href='https://www.smfos.com.au/estore?login&loginname=jasonkwh@gmail.com&loginpwd=haha'>https://www.smfos.com.au/estore?login&loginname=jasonkwh@gmail.com&loginpwd=haha</a></p><br><p>感谢您使用 SMFOS eStore!</p><p>SMFOS 团队敬上</p>";
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
$mail->addAddress("jasonkwh@gmail.com");
if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}

?>