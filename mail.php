<?php 

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

$name = $_POST['name'];
$email = $_POST['email'];
$text = $_POST['message'];

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'eushared15.twinservers.net';  																							// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'info@wyorld.in.ua'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = 'dgrUA6GerLJUXVs'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('info@wyorld.in.ua'); // от кого будет уходить письмо?
$mail->addAddress('info@wyorld.in.ua');     // Кому будет уходить письмо 
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Повідомлення з wYorld.in.ua';

$message = "
<html>
<head>
  <title>Повідомлення з wYorld.in.ua</title>
</head>
<body>
  <p><strong>$name</strong> залишив повідомлення:</p>
  <table>
    <tr>
      <td colspan='2'>******************************</td>
    </tr>
    <tr>
      <td colspan='2'>$text</td>
    </tr>
    <tr>
      <td colspan='2'>******************************</td>
    </tr>
    <tr>
      <td><strong>E-mail:</strong></td>
      <td>$email</td>
    </tr>
  </table>
</body>
</html>
";

$mail->Body = $message;
$mail->AltBody = '';


if(!$mail->send()) {
    echo 'Error';
} else {
    header('location: index.html');
}
?>