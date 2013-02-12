<?php
$email = $_POST['email'];
$query = $_POST['query'];
$resetURL = "http://130.18.209.166/~dcspg21/passwordfix.php?".$query;

require_once('./lib/class.phpmailer.php');

$mail             = new PHPMailer();

$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "cse.msstate.edu"; // SMTP server
$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
                                           // 0 = no debug output
                                           // 1 = errors and messages
                                           // 2 = messages only

$mail->SetFrom('support.monkeys@timeturner.com', 'Timeturner\'s Support Monkeys');

//$mail->AddReplyTo("name@yourdomain.com","First Last");

$mail->Subject    = "Your password mishap";

$mail->Body    = "
Hello,\n
You seem have have forgotten your password. You can reset it <a href=$resetUrl>here.</a>.
If you have no idea what this email is talking about, please disregard it.\n
Thanks,\n
Timeturner Support Monkeys"; 


$address = $email;
$mail->AddAddress($address);


if(!$mail->Send())
{
  echo "Mailer Error: " . $mail->ErrorInfo;
}
else
{
  echo "Message sent!";
}

?>

</body>
</html>
