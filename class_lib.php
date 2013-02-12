<?php 
// this file contains all the classes used in Timeturner


// Project class
	class Project{
		
		// set all variables to public, so they can't be directly modified
		public $projname;
		public $projleader;
		public $projgoal;
		public $projdeadline;
		public $projshortname;
		public $projcompletion;
	
		// call the construct function (legacy support)
		public function Project($tempname, $templeader, $tempgoal, $tempdeadline, $tempshortname, $tempcompletion) {
			$this->__construct($tempname, $templeader, $tempgoal, $tempdeadline, $tempshortname, $tempcompletion);
		}	
		
		// constructor
		public function __construct($tempname, $templeader, $tempgoal, $tempdeadline, $tempshortname, $tempcompletion){
			$this->projname = $tempname;
			$this->projleader = $templeader;
			$this->projgoal = $tempgoal;
			$this->projdeadline = $tempdeadline;
			$this->projshortname = $tempshortname;
			$this->projcompletion = $tempcompletion;
		}

		// get the name		
		public function getName(){
			return $this->projname;
		}

		// get the leader's email
		public function getLeader(){
			return $this->projleader;
		}

		public function getLeaderName(){
			$ownerQuery = mysql_query("SELECT * FROM users where email=\"$this->projleader\"");
			$ownerRow = mysql_fetch_array($ownerQuery);
			$ownerName = $ownerRow{'name'};
			return $ownerName;
		}

		// get the goal of the project
		public function getGoal(){
			return $this->projgoal;
		}

		// get the deadline
		public function getDeadline(){
			return $this->projdeadline;
		}

		// get the shortname
		public function getShortName(){
			return $this->projshortname;
		}
		
		public function getCompletion(){
			if ($this->projcompletion == 0){
				$var = "No";
			}
			else {
				$var = "Yes";
			}
			return $var;
		}

		public function hasUser($userEmail){
			$shorts = $_GET['shortname'];
			$result = mysql_query("SELECT * FROM projects where projects.leader=\"$userEmail\" and projects.shortname = '$shorts'");
			$result2 = mysql_query("SELECT * FROM projects, WorkingOn where WorkingOn.userEmail=\"$userEmail\" and projectshortname = shortname and projects.shortname = '$shorts'");

			$rows = mysql_num_rows($result);
			$rows2 = mysql_num_rows($result2);
						
			if (($rows == 0) && ($rows2 == 0)){
				echo '<META HTTP-EQUIV="Refresh" Content="0; URL=http://130.18.209.166/~dcspg21/notauthorized.php">';    
			}
			
		}

		public function getUsers($shortname){
			$result = mysql_query("SELECT * FROM WorkingOn where (projectshortname = '$shortname')");
			while ($row = mysql_fetch_array($result)){
				$email = $row{'userEmail'};
				echo "<tr><td>$email</td><td><a href=removeuser.php?userEmail=$email&shortname=$shortname>Remove User</a></td></tr>";
			}
			


		}

		
		static public function getProjectInfo(){
			$shortname = $_GET["shortname"];
			$result = mysql_query("SELECT * FROM projects where shortname=\"$shortname\"");

			while ($row = mysql_fetch_array($result)){
				$projname = $row{'name'};
				$projleader = $row{'leader'};
				$projgoal = $row{'goal'};
				$projdeadline = $row{'deadline'};
				$projshortname = $row{'shortname'};
				$projcompletion = $row{'completion'};
				$tempProject = new Project($projname, $projleader, $projgoal, $projdeadline, $projshortname,$projcompletion);
			}
			
			return $tempProject;
		}

		public function getUserTasks($userEmail){

			$result = mysql_query("SELECT * FROM tasks where projectshortname=\"$this->projshortname\" AND Owner=\"$userEmail\" AND completion != 1");
			$taskArray = array();
			while ($row = mysql_fetch_array($result)){
				$tempID = $row{'uniqueID'};
				$tempname = $row{'Name'};
				$tempdetails = $row{'Details'};
				$tempduedate = $row{'DueDate'};
				$tempproject = $row{'projectshortname'};
				$tempcompletion = $row{'Completion'};
				$tempowner = $row{'Owner'};
				$tempTask = new Task($tempID, $tempname, $tempdetails, $tempduedate, $tempproject, $tempcompletion, $tempowner);
				$taskArray[] = $tempTask;
			}

			for ($i = 0; $i < count($taskArray); $i++){
				$temp = $taskArray[$i];
				$id = $temp->getID();
				$dueDate = $temp->getDueDate();
				$details = $temp->getDetails();
	
				// notice that the URL is dynamically generated as a parameter of the project.php URL
				echo "<li class=undone><a href=task.php?id=$id>".$temp->getName()."</a><a href='delete.php?id=$id' class=tack title=\"Delete Project\"></a><p>Due on $dueDate</p><p>$details</p></li>";
			}

		}

		public function getNotUserTasks($userEmail){

			$result = mysql_query("SELECT * FROM tasks where projectshortname=\"$this->projshortname\" AND Owner!=\"$userEmail\" AND completion != 1");
			$taskArray = array();
			while ($row = mysql_fetch_array($result)){
				$tempID = $row{'uniqueID'};
				$tempname = $row{'Name'};
				$tempdetails = $row{'Details'};
				$tempduedate = $row{'DueDate'};
				$tempproject = $row{'projectshortname'};
				$tempcompletion = $row{'Completion'};
				$tempowner = $row{'Owner'};
				$tempTask = new Task($tempID, $tempname, $tempdetails, $tempduedate, $tempproject, $tempcompletion, $tempowner);
				$taskArray[] = $tempTask;
			}

			for ($i = 0; $i < count($taskArray); $i++){
				$temp = $taskArray[$i];
				$id = $temp->getID();
				$dueDate = $temp->getDueDate();
				$owner = $temp->getOwner();
				$ownerQuery = mysql_query("SELECT * FROM users where email=\"$owner\"");
				$ownerRow = mysql_fetch_array($ownerQuery);
				$ownerName = $ownerRow{'name'};
				$details = $temp->getDetails();
	
				// notice that the URL is dynamically generated as a parameter of the project.php URL
				echo "<li class=undone><a href=task.php?id=$id>".$temp->getName()."&nbsp;($ownerName)</a><p>Due on $dueDate</p><p>$details</p></li>";
			}

		}

		public function getCompletedTasks(){

			$result = mysql_query("SELECT * FROM tasks where projectshortname=\"$this->projshortname\" AND completion = 1");
			$taskArray = array();
			while ($row = mysql_fetch_array($result)){
				$tempID = $row{'uniqueID'};
				$tempname = $row{'Name'};
				$tempdetails = $row{'Details'};
				$tempduedate = $row{'DueDate'};
				$tempproject = $row{'projectshortname'};
				$tempcompletion = $row{'Completion'};
				$tempowner = $row{'Owner'};
				$tempTask = new Task($tempID, $tempname, $tempdetails, $tempduedate, $tempproject, $tempcompletion, $tempowner);
				$taskArray[] = $tempTask;
			}

			for ($i = 0; $i < count($taskArray); $i++){
				$temp = $taskArray[$i];
				$id = $temp->getID();
				$dueDate = $temp->getDueDate();
				$owner = $temp->getOwner();
				$ownerQuery = mysql_query("SELECT * FROM users where email=\"$owner\"");
				$ownerRow = mysql_fetch_array($ownerQuery);
				$ownerName = $ownerRow{'name'};
				$details = $temp->getDetails();
	
				// notice that the URL is dynamically generated as a parameter of the project.php URL
				echo "<li class=undone><a href=task.php?id=$id>".$temp->getName()."&nbsp;($ownerName)</a><p>Due on $dueDate</p><p>$details</p></li>";
			}

		}

		public function addProject($newProjectName, $newProjectLeader, $newProjectGoal, $newProjectDeadline, $newShortName, $newCompletion){
	
			 	$checker = 0;
				$result = mysql_query("SELECT * FROM projects");
				$projectArray = array();
				// loop through the results of the query and store them in userArray	
				while ($row = mysql_fetch_array($result)){
					$tempname = $row{'name'};
					$templeader = $row{'leader'};
					$tempgoal = $row{'goal'};
					$tempdeadline = $row{'deadline'};
					$tempshortname = $row{'shortname'};
					$tempcompletion = $row{'completion'};
					$tempProject = new Project($tempname, $templeader, $tempgoal, $tempdeadline, $tempshortname, $tempcompletion);
					$tempProject = new Project($tempname, $templeader, $tempgoal, $tempdeadline, $tempshortname, $tempcompletion);
					$projectArray[] = $tempProject;
				} 	


					// iterate over userArray[] and check newUser
					for ($i = 0; $i < count($projectArray); $i++){
						
						$temp = $projectArray[$i];
						$tempshortname = $temp->getShortName();
						if ($newShortName != $tempshortname){
							$checker++;

						}
						else {
							$checker--;
						}
					}
					// if the user is not found in the userArray
					if ($checker == count($projectArray)) {
						// insert the user
						$result = mysql_query("INSERT INTO projects (name, leader, goal, deadline, shortname) VALUES (\"$newProjectName\", \"$newProjectLeader\", \"$newProjectGoal\", \"$newProjectDeadline\", \"$newShortName\")");
						// if the insert works, log the user in
					
						if ($result) {
							echo '<META HTTP-EQUIV="Refresh" Content="0; URL=http://130.18.209.166/~dcspg21/added.php">';    
							exit;   
						}

						else if (!$result){
							echo "DURGH";
						} 
					}
					else {   
						session_start();			
						echo '<META HTTP-EQUIV="Refresh" Content="0; URL=http://130.18.209.166/~dcspg21/fail.php">';       
						exit;    
					}  

		}

	}

	// User class
	class User {

		// set all variables to public, so they can't be directly modified
		public $name;
		public $password;
		public $email;

		// call the construct function (legacy support)
		public function User($tempname, $temppassword, $tempemail){
			$this->__construct($tempname, $temppassword, $tempemail);
		}

		// constructor
		public function __construct($tempname, $temppassword, $tempemail){
			$this->name = $tempname;
			$this->password = $temppassword;
			$this->email = $tempemail;
		}

		// get the name of the user
		public function getName(){
			return $this->name;
		}

		// get the email of the user
		public function getEmail(){
			return $this->email;
		}

		public function getPassword(){
			return $this->password;
		}
		
		public function viewProjects($userEmail){
			$shorts = $_GET['projshortname'];
			$result = mysql_query("SELECT * FROM projects where (projects.leader=\"$userEmail\") and completion = \"0\"");
			$result2 = mysql_query("SELECT * FROM projects, WorkingOn where (WorkingOn.userEmail=\"$userEmail\" and projectshortname = shortname) and completion = \"0\"");

			
			$projectArray = array();
			while ($row = mysql_fetch_array($result)){
				$tempname = $row{'name'};
				$templeader = $row{'leader'};
				$tempgoal = $row{'goal'};
				$tempdeadline = $row{'deadline'};
				$tempshortname = $row{'shortname'};
				$tempcompletion = $row{'completion'};
				$tempProject = new Project($tempname, $templeader, $tempgoal, $tempdeadline, $tempshortname, $tempcompletion);
				$projectArray[] = $tempProject;
			}
			while ($row = mysql_fetch_array($result2)){
				$tempname = $row{'name'};
				$templeader = $row{'leader'};
				$tempgoal = $row{'goal'};
				$tempdeadline = $row{'deadline'};
				$tempshortname = $row{'shortname'};
				$tempProject = new Project($tempname, $templeader, $tempgoal, $tempdeadline, $tempshortname);
				$projectArray[] = $tempProject;
			}
			for ($i = 0; $i < count($projectArray); $i++){
				$temp = $projectArray[$i];
				$shortname = $temp->getShortName();
				
				// notice that the URL is dynamically generated as a parameter of the project.php URL
				echo "<li ";
				if ($shorts == $shortname){
					echo " id=active ";
				}
				echo "><a href=project.php?shortname=$shortname>".$temp->getName()."</a></li>";
			}
				echo "<li><a href=addproject.php>New Project...</a></li>";
			
		}

		public function viewTasks($userEmail){
			// query the database and get all projects that belong to the person or that the person is working on

			$result = mysql_query("SELECT * FROM tasks where Owner=\"$userEmail\" and completion = \"0\"");			

			// create an empty array, make the results of the query into Task objects, and cramm the into the array
			$taskArray = array();
			while ($row = mysql_fetch_array($result)){
				$tempID = $row{'uniqueID'};
				$tempname = $row{'Name'};
				$tempdetails = $row{'Details'};
				$tempduedate = $row{'DueDate'};
				$tempproject = $row{'projectshortname'};
				$tempcompletion = $row{'completion'};
				$tempowner = $row{'Owner'};
				$tempTask = new Task($tempID, $tempname, $tempdetails, $tempduedate, $tempproject, $tempcompletion, $tempowner);
				$taskArray[] = $tempTask;

			}

			// generate an <li> element for each project in the database by pulling
			// a Project from the array and looking at its attributes
			// needs to be done with a getter method instead of direct access.
			for ($i = 0; $i < count($taskArray); $i++){
				$temp = $taskArray[$i];
				$id = $temp->getID();
				$dueDate = $temp->getDueDate();
				$details = $temp->getDetails();
				$project = $temp->getProject();
				$completion = $temp->getCompletion();
				if ($completion == "No"){
					$class = "undone";
				}
				else {
					$class = "done";
				}
	
				// notice that the URL is dynamically generated as a parameter of the project.php URL
				echo "<li class=$class><a href=task.php?id=$id>".$temp->getName()."&nbsp;in $project</a><p>Due on $dueDate</p><p>$details</p><p>Completed: $completion<p></li>";
			}

		}

		public function viewCompletedProjects($userEmail){
			$shorts = $_GET['projshortname'];
			$result = mysql_query("SELECT * FROM projects where (projects.leader=\"$userEmail\") and completion != \"0\"");
			$result2 = mysql_query("SELECT * FROM projects, WorkingOn where (WorkingOn.userEmail=\"$userEmail\" and projectshortname = shortname) and completion != \"0\"");

			
			$projectArray = array();
			while ($row = mysql_fetch_array($result)){
				$tempname = $row{'name'};
				$templeader = $row{'leader'};
				$tempgoal = $row{'goal'};
				$tempdeadline = $row{'deadline'};
				$tempshortname = $row{'shortname'};
				$tempcompletion = $row{'completion'};
				$tempProject = new Project($tempname, $templeader, $tempgoal, $tempdeadline, $tempshortname, $tempcompletion);
				$projectArray[] = $tempProject;
			}
			while ($row = mysql_fetch_array($result2)){
				$tempname = $row{'name'};
				$templeader = $row{'leader'};
				$tempgoal = $row{'goal'};
				$tempdeadline = $row{'deadline'};
				$tempshortname = $row{'shortname'};
				$tempcompletion = $row{'completion'};
				$tempProject = new Project($tempname, $templeader, $tempgoal, $tempdeadline, $tempshortname, $tempcompletion);
				$projectArray[] = $tempProject;
			}
			for ($i = 0; $i < count($projectArray); $i++){
				$temp = $projectArray[$i];
				$shortname = $temp->getShortName();
				
				// notice that the URL is dynamically generated as a parameter of the project.php URL
				echo "<li><a href=project.php?shortname=$shortname>".$temp->getName()."</a></li>";
			}

			
		}
	}

	class Task {
		public $id;
		public $name;
		public $details;
		public $dueDate;
		public $project;
		public $completion;
		public $owner;
		
		// call the construct function (legacy support)
		public function User($tempid, $tempname, $tempdetails, $tempdueDate, $tempproject, $tempcompletion, $tempowner){
			$this->__construct($tempid, $tempname, $tempdetails, $tempdueDate, $tempproject, $tempcompletion, $tempowner);
		}

		// constructor
		public function __construct($tempid, $tempname, $tempdetails, $tempdueDate, $tempproject, $tempcompletion, $tempowner){
			$this->id = $tempid;
			$this->name = $tempname;
			$this->details = $tempdetails;
			$this->dueDate = $tempdueDate;
			$this->project = $tempproject;
			$this->completion = $tempcompletion;
			$this->owner = $tempowner;
		}

		public function getID() {
			return $this->id;
		}

		public function getName() {
			return $this->name;
		}

		public function getDetails() {
			return $this->details;
		}

		public function getDueDate() {
			return $this->dueDate;
		}

		public function getProject() {
			$result = mysql_query("SELECT * FROM projects where shortname=\"$this->project\"");

			while ($row = mysql_fetch_array($result)){
				$projname = $row{'name'};
			}
			return $projname;
		}

		public function getShortName() {
			return $this->project;
		}

		public function getCompletion(){
			if ($this->completion == 0){
				$var = "No";
			}
			else {
				$var = "Yes";
			}
			return $var;
		}

		public function getOwner() {
			return $this->owner;
		}

		static public function getTaskInfo(){
			$taskID= $_GET['id'];
			// query the database
			$result = mysql_query("SELECT * FROM tasks where uniqueID=\"$taskID\"");			

			// create an empty array, make the results of the query into Task objects, and cramm the into the array
			$taskArray = array();
			while ($row = mysql_fetch_array($result)){
				$tempID = $row{'uniqueID'};
				$tempname = $row{'Name'};
				$tempdetails = $row{'Details'};
				$tempduedate = $row{'DueDate'};
				$tempproject = $row{'projectshortname'};
				$tempcompletion = $row{'completion'};
				$tempowner = $row{'Owner'};
				$tempTask = new Task($tempID, $tempname, $tempdetails, $tempduedate, $tempproject, $tempcompletion, $tempowner);
			}
			return $tempTask;


		}

		static public function addTask($name, $details, $duedate, $owner, $shortname){
						$_SESSION['taskname'] = $name;
						$result = mysql_query("INSERT INTO `dcspg21`.`tasks` (`uniqueID`, `Name`, `Details`, `DueDate`, `projectshortname`, `Completion`, `Owner`) VALUES (NULL, '$name', '$details', '$duedate', '$shortname', '0', '$owner');");

						if ($result) {
							echo '<META HTTP-EQUIV="Refresh" Content="0; URL=http://130.18.209.166/~dcspg21/addedtask.php">';    
							exit;   
						} 
						else {   
							session_start();			
							echo '<META HTTP-EQUIV="Refresh" Content="0; URL=http://130.18.209.166/~dcspg21/fail.php">';       
							exit;    
						}  

				}
			
	}

?>


