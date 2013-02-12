<?php
$name = $_POST['name'];
$password = $_POST['password'];

if ($name != "Adam Thrash" && $password != "opensesame"){
	$title = "Incorrect Credentials";
	require_once('head.php');
	echo "<p>Your credentials were incorrect.</p></section></body></html>";
}

else {
	session_start();
	$_SESSION['username'] = "butteredtoast";
	echo "<META HTTP-EQUIV='Refresh' Content='0; URL=http://adamthrash.ipower.com/mysite'>";    
}
