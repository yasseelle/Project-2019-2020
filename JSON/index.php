<?php
$personne ='{"ali":22,"khalid":20,"samir":19}';
$p=json_decode($personne);
echo '<p>'.$p->khalid.'</p>';

$age=array("ali"=>22,"khalid"=>20,"samir"=>19);
echo json_encode($age);

$message="bonjour vouez nous contacter";
$message=wordwrap($message,80);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = "smtp";
$mail->SMTPDebug  = 1;  
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port       = 587;
$mail->Host       = "smtp.gmail.com";
$mail->Username   = "jabbari.ilyass.me@gmail.com";





$mail->IsHTML(true);
$mail->AddAddress("yasseelle6@gmail.com", "recipient-ILYASS");
$mail->SetFrom("jabbari.ilyass.me@gmail.com", "from-ILYASS");
$mail->AddReplyTo("reply-to-email@domain", "reply-to-name");
$mail->AddCC("cc-recipient-email@domain", "cc-recipient-name");
$mail->Subject = "Test is Test Email sent via Gmail SMTP Server using PHP Mailer";
$content = "<b>This is a Test Email sent via Gmail SMTP Server using PHP mailer class.</b>";

$mail->MsgHTML($content); 
if(!$mail->Send()) {
  echo "Error while sending Email.";
  var_dump($mail);
} else {
  echo "Email sent successfully";
}

?>