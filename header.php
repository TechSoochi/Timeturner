<?php 

?>
<!-- basic HTML stuff that's on every page -->
<!DOCTYPE html>
<html>
<head>
<title><?php echo $title ?></title> <!-- title is generated dynamically based on whatever $title is -->

<!-- gets CSS stylesheets based on title -->
<?php
	// include the connection to the database and include the class library
	require_once('conn_db.php');
	require_once('class_lib.php');
	include('session_check.php');

	// set the CSS files based on page title
	// include the welcome.css style sheet for the log in and register pages, since they should look the same

	if ($title=="Log In" || $title=="Register for Timeturner" || $title=="Password Support" || $title == "Password Reset"){
		echo "<link type=text/css rel=stylesheet href=http://130.18.209.166/~dcspg21/style/welcome.css>";
	} 

	// all other pages use the generic stylesheet
	else if ($title == "Contact Timeturner"){
		echo "<link type=text/css rel=stylesheet href=http://130.18.209.166/~dcspg21/style/welcome.css>";
	}
        else if ($title == "Change Password"){
		echo "<link type=text/css rel=stylesheet href=http://130.18.209.166/~dcspg21/style/welcome.css>";
	}
	else {
		echo "<link type=text/css rel=stylesheet href=http://130.18.209.166/~dcspg21/style/style.css>";
	} 
?>
</head>
<body>
<header>
<a href=http://130.18.209.166/~dcspg21/>Timeturner</a>
</header>
<!-- nav element included based on page title -->
<?php
	// don't include the navigation unless the user is logged in
	if ($session==1){
		include 'nav.php';
	}
//        else if ($session==0 | $title != "Log In")
//        {
//            echo '<META HTTP-EQUIV="Refresh" Content="0; URL=http://130.18.209.166/~dcspg21/">';
//        }
?>
<!-- start the body section -->
<section class=body>
<?php 
if ($title != "Log In" && $title != "Register for Timeturner" && $title != "Contact Timeturner"  && $title != "Change Password" && $title!="Password Support" && $title != "Password Reset"){
	echo "<div id=member class=blank>

		<div id=projectinfo>
		<h3> Projects </h3>

			<ul>";
				
					$user->viewProjects($userEmail);			
				
	echo"		</ul>
		</div>
	";
}
?>

