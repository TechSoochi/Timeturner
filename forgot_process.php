<?php
$email = $_POST['email'];
$alphanumeric= array("0","1","2","3","4","5","6","7","8","9","A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
$query="";
for ($i = 0; $i < 10; $i++){
	$offset = rand(0, 35);
	$query = $query.$alphanumeric[$offset];
}

$resetURL = "http://130.18.209.166/~dcspg21/passwordfix.php?id=".$query;

$result = mysql_query("INSERT INTO reset (email, value) VALUES (\"$email\", \"$query\")");





$Curl_Session = curl_init('http://adamthrash.ipower.com/timeturner/forgotpassword.php');
curl_setopt ($Curl_Session, CURLOPT_POST, 1);
curl_setopt ($Curl_Session, CURLOPT_POSTFIELDS, "email=$email&query=$query");
curl_setopt ($Curl_Session, CURLOPT_FOLLOWLOCATION, 1);
curl_exec ($Curl_Session);
curl_close ($Curl_Session);
?>
