<?php
ini_set('display_errors',1); 
 error_reporting(E_ALL);
require_once('conn_db.php');

require_once('class_lib.php');

require_once('session_check.php');

$projname = $_POST['name'];
$projdeadline = $_POST['deadline'];
$projgoal = $_POST['goal'];
$projleader = $userEmail;
$projshortname = $_POST['shortname'];
$projcompletion = 0;

$project = new Project($projname, $projleader, $projgoal, $projdeadline, $projshortname, $projcompletion);
if ($link){
	$project->addProject($projname, $projleader, $projgoal, $projdeadline, $projshortname, $projcompletion);
	$_SESSION['newproject'] = $projname;
}

?>
