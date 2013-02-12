<?php
	require_once('conn_db.php');

	require_once('class_lib.php');

	require_once('session_check.php');

	$shortname = $_GET['shortname'];

	if ($link){
		echo "About to query.";
		$result = mysql_query("DELETE FROM projects WHERE shortname = \"$shortname\"");
		echo "DELETE FROM projects WHERE shortname = \"$shortname\"";
		if ($result){

		echo "<META HTTP-EQUIV='Refresh' Content='0; URL=http://130.18.209.166/~dcspg21/>";    
		}
		else {
		echo "UGH";
		}
	}
	else {
		echo "NO CONN";
	}
?>
	
