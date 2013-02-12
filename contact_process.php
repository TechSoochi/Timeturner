<?php
// get the name, email, and message from the contact form
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// declare the "To: " address
$to = "spamcatcher@adamthrash.com";

// declare the subject
$subject = "Support for $name";

// set the from address to allow direct reply
$headers = "From:" . $email;

// send the message
$mail_it = mail($to,$subject,$message,$headers);

// if the message sent, go to contacted.php
if ($mail_it){
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=http://130.18.209.166/~dcspg21/contacted.php">';    
}

// otherwise, go to notcontacted.php
else {
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=hhttp://130.18.209.166/~dcspg21/notcontacted.php">';    
}

?>
