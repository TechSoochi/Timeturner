<?php
require_once('conn_db.php');
$email = $_POST['email'];
$alphanumeric= array("0","1","2","3","4","5","6","7","8","9","A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
$query="";
for ($i = 0; $i < 10; $i++){
	$offset = rand(0, 35);
	$query = $query.$alphanumeric[$offset];
}

$resetURL = "http://130.18.209.166/~dcspg21/passwordfix.php?id=".$query;


$result = mysql_query("INSERT INTO reset (email, id) VALUES (\"$email\", \"$query\")");
if (!$result) {
	echo "Fail";
}


require_once('./lib/class.phpmailer.php');

$mail             = new PHPMailer();

$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "cse.msstate.edu"; // SMTP server
$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
                                           // 0 = no debug output
                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->IsHTML(true);                                  // set email format to HTML
$mail->SetFrom('support.monkeys@timeturner.com', 'Timeturner\'s Support Monkeys');

$body = "<html><body>
Hello,\n
You seem have have forgotten your password. You can reset it <a href=$resetURL>here.</a>.
If you have no idea what this email is talking about, please disregard it.\n
Thanks,\n
Timeturner Support Monkeys</body></html>";

$mail->Subject    = "Your password mishap";

$mail->Body    = $body; 


$address = $email;
$mail->AddAddress($address);


if(!$mail->Send())
{
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=hhttp://130.18.209.166/~dcspg21/resetfailed.php">';    
}
else
{
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=http://130.18.209.166/~dcspg21/resetsent.php">';    
}

?>

</body>
</html>
