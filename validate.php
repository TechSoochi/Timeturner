<?php

// include the connection
require_once('conn_db.php');
require_once('class_lib.php');
// get the username and password from POST
$username = $_POST["username"];
$username = strtolower($username);
$password = $_POST["password"];

// if the link exists, validate the user input against the users table
if ($link){
	// get the users table
	// right now, validation is done by looking through all results
	// in the table and seeing if one exists
	// Maybe doing "SELECT * FROM users WHERE 'email' = $username AND 'password' = $password would be a good idea
	$result = mysql_query("SELECT * FROM users");
	$userArray = array();
	while ($row = mysql_fetch_array($result)){
		$tempname = $row{'name'};
		$temppassword = $row{'password'};
		$tempemail = $row{'email'};
		$tempUser = new User($tempname, $temppassword, $tempemail);
		$userArray[] = $tempUser;

	} 
	for ($i = 0; $i < count($userArray); $i++){

		$temp = $userArray[$i];
		$tempemail = $temp->getEmail();
		$temppass = $temp->getPassword();

		
		if (($username == $tempemail) && (crypt($password, $temppass) == $temppass)){
			session_start();
			$name = $temp->getName();
			$password = $temp->getPassword();
			$email = $temp->getEmail();
			$user = new User($name, $password, $email);
			$_SESSION['loggedIn'] = serialize($user);		
			// redirects to logged in home page
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=http://130.18.209.166/~dcspg21/">';    
			exit; 
		}

	}
 
			

	session_start();
	$_SESSION['fail'] = 1;

	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=http://130.18.209.166/~dcspg21/">';       
	exit; 
}

// otherwise, specify that there is no connection
else {
echo "Error: No connection.";
}

?>
