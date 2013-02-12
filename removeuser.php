<?php
	require_once('conn_db.php');

	require_once('class_lib.php');

	require_once('session_check.php');

	$email = $_GET['userEmail'];
	$project = $_GET['shortname'];
	if ($link){
		$result = mysql_query("DELETE FROM WorkingOn WHERE userEmail = \"$email\" and projectshortname = \"$project\"");

		if ($result){

		echo "<META HTTP-EQUIV='Refresh' Content='0; URL=http://130.18.209.166/~dcspg21/project.php?shortname=$project'>";    
		}
		else {
		echo "UGH";
		}
	}
	else {
		echo "NO CONN";
	}
?>
	
