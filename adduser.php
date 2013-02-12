<?php
	require_once('conn_db.php');

	require_once('class_lib.php');

	require_once('session_check.php');

	$email = $_POST['email'];
	$shortname = $_SESSION['shortname'];



	if ($link){
		$result = mysql_query("INSERT INTO `dcspg21`.`WorkingOn` (`userEmail`, `projectshortname`) VALUES ('$email', '$shortname');");
		if ($result){

		echo "<META HTTP-EQUIV='Refresh' Content='0; URL=http://130.18.209.166/~dcspg21/project.php?shortname=$shortname'>";    
		}
		else {
		echo "UGH";
		}
	}
	else {
		echo "NO CONN";
	}
?>

