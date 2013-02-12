<?php


// include classes once
require_once('class_lib.php');
// include a way to check the session
include('session_check.php');

// if the session has been set as logged in, show the user's home page
// this needs to check for a USER object instead
if ($session==1){
	$title = "Timeturner";
	require_once('header.php');  
	require_once('loggedin.php');

} 

// if the session has not been set as logged in, show the log in page.
else {
	$title = "Log In";
	require_once('header.php');  
	require_once('login.php');
	
}
?>

	

