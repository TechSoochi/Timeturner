<?php
	require_once('conn_db.php');

	require_once('class_lib.php');

	require_once('session_check.php');

	$id = $_GET['id'];
	$project = $_SESSION['shortname'];
	if ($link){
		$result = mysql_query("DELETE FROM tasks WHERE uniqueID = \"$id\"");

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
	
