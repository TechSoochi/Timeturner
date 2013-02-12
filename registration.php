<?php

// include the connection
include 'conn_db.php';
include 'class_lib.php';

// get the username and password from POST
$username = $_POST["name"];
$password = $_POST["password"];
$confirmpassword = $_POST["confirmpassword"];
$email = $_POST["email"];

//make newUser

//check to see if the user types the password correctly both times
if($password != $confirmpassword){
	echo $confirmpassword." != ".$password;    
	//echo '<META HTTP-EQUIV="Refresh" Content="0; URL=http://130.18.209.166/~dcspg21/loginfailed.php">';
}

else{
    echo "I'm here!";
   // if the link exists, validate the user input against the users table
    if ($link){
	
 	$checker = 0;
	$result = mysql_query("SELECT * FROM users");
	$userArray = array();
	// loop through the results of the query and store them in userArray	
	while ($row = mysql_fetch_array($result)){
		$tempname = $row{'name'};
		$temppassword = $row{'password'};
		$tempemail = $row{'email'};
		$tempUser = new User($tempname, $temppassword, $tempemail);
		$userArray[] = $tempUser;
	} 	


		// iterate over userArray[] and check newUser
		for ($i = 0; $i < count($userArray); $i++){
						
			$temp = $userArray[$i];
			$tempemail = $temp->getEmail();
			echo $tempemail;
			if ($email != $tempemail){
				$checker++;

			}
			else {
				$checker--;
			}
		}
		// if the user is not found in the userArray
		if ($checker == count($userArray)) {
			// insert the user
			$newpassword = crypt($password);
			$result = mysql_query("INSERT INTO users (name, email, password) VALUES (\"$username\", \"$email\", \"$newpassword\")");
			// if the insert works, log the user in
			if ($result) {
				session_start();
				$user = new User($name, $password, $email);
				$_SESSION['loggedIn'] = serialize($user);
				// redirects to logged in home page
				echo '<META HTTP-EQUIV="Refresh" Content="0; URL=http://130.18.209.166/~dcspg21/">';    
				exit;   
			} 
		}
		else {   
			session_start();
			$_SESSION['fail'] = 1;
			
			//echo '<META HTTP-EQUIV="Refresh" Content="0; URL=http://pluto.cse.msstate.edu/~dcspg21/register.php">';       
			exit;    
                     }  
	}

    // otherwise, specify that there is no connection
    else {
    echo "Error: No connection.";
    }
}//end of else
?>
