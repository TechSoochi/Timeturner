<?php
ini_set('display_errors',1); 
 error_reporting(E_ALL);
require_once('conn_db.php');

require_once('class_lib.php');

require_once('session_check.php');

$taskname = $_POST['name'];
$taskduedate = $_POST['duedate'];
$taskdetails = $_POST['details'];
$taskowner = $_POST['useremail'];
$shortname = $_SESSION['shortname'];

if ($link){
	$_SESSION['shortname'] = $projname;
	Task::addTask($taskname, $taskdetails, $taskduedate, $taskowner, $shortname);


}

?>


