<?php
$newpass = $_POST['password'];
$value = $_GET['value'];
require_once('conn_db.php');


$result = mysql_query("SELECT email from reset where id = \"$value\"");
while ($row = mysql_fetch_array($result)){
	$email = $row{'email'};
}

if (!$email) {

	$title = "Password Reset";

	include 'header.php';
	echo "<div class=member>
		<div id=login>
			<h3> Uh oh! </h3>
				<div> Your code is no longer valid! Try the reset process again. </div>
		</div>
	</div>
</section>
</body>
</html>";

}

else {

	$pass = crypt($newpass);

	if ($link){
		$password = mysql_query("SELECT password from users where email = \"$email\"");
		while ($row = mysql_fetch_array($result)){
		$password = $row{'password'};
		$pass = crypt($pass, $password);
		}
		$update = mysql_query("UPDATE `dcspg21`.`users` SET `password` = '$pass' WHERE `users`.`email` = '$email'");
		$delete = mysql_query("DELETE FROM reset WHERE email = '$email' and id='$value'");
	}

	if ($update){
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=http://130.18.209.166/~dcspg21/">';    
		//echo "UPDATE `dcspg21`.`users` SET `password` = '$pass' WHERE `users`.`email` = '$email'";
	}
	else{
		echo "Sacks of failure!";
	}

}
?>
