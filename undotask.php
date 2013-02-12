<?php
	require_once('conn_db.php');

	require_once('class_lib.php');

	require_once('session_check.php');

	$uniqueID = $_GET['id'];
        echo $uniqueID;

	if ($link){
		echo "About to query.";
		$result = mysql_query("UPDATE  `dcspg21`.`tasks` SET  `completion` =  '0'
                        WHERE `tasks`.uniqueID = \"$uniqueID\"");
		if ($result){

		echo "<META HTTP-EQUIV='Refresh' Content='0; URL=http://130.18.209.166/~dcspg21/task.php?id=$uniqueID'>";
		}
		else {
		echo "UGH";
		}
	}
	else {
		echo "NO CONN";
	}
?>

