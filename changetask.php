<?php
	require_once('conn_db.php');

	require_once('class_lib.php');

	require_once('session_check.php');

	$uniqueID = $_GET['id'];
	$email = $_POST['email'];
	$shortname = $_SESSION['shortname'];
	$name = $_POST['name'];
	$details = $_POST['details'];
	$duedate = $_POST['duedate'];



	if ($link){
		$result = mysql_query("UPDATE `dcspg21`.`tasks` SET `Name` = '$name', `Details` = '$details', `DueDate` = '$duedate' WHERE `tasks`.`uniqueID` = $uniqueID");
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

