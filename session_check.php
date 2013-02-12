<?php
// This file checks to see if the user is logged in, and if the user is logged in, creates the user object for use.

// start the session
session_start();

// if user is not set, $session is 0 (the session is not valid)
if (!(isset($_SESSION['loggedIn']))){
	$session = 0;	    
}
// the session is valid
else {
	$session = 1;
	$user = unserialize($_SESSION['loggedIn']);
	$userEmail = $user->getEmail();
	

}
?>

