<?php
	require_once('conn_db.php');

	require_once('class_lib.php');

	require_once('session_check.php');

	$shortname = $_GET['shortname'];
	$name = $_POST['name'];
	$leader = $_POST['owner'];
	$deadline = $_POST['deadline'];
	$goal = $_POST['goal'];
	$newShortname = $_POST['shortname'];



	if ($link){
		$result = mysql_query("UPDATE `dcspg21`.`projects` SET `name` = '$name', `leader` = '$leader', `goal` = '$goal', `shortname` = '$newShortname',`deadline`='$deadline' WHERE `projects`.`shortname` = '$shortname'");
		//echo "UPDATE `dcspg21`.`projects` SET `name` = '$name', `leader` = '$leader', `goal` = '$goal', `shortname` = '$newShortname',`deadline`=$deadline WHERE `projects`.`shortname` = '$shortname'";
		if ($result){

		echo "<META HTTP-EQUIV='Refresh' Content='0; URL=http://130.18.209.166/~dcspg21/project.php?shortname=$newShortname'>";
		}
		else {
		echo "UGH";
		}
	}
	else {
		echo "NO CONN";
	}
?>

