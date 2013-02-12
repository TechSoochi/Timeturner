<?php
include('class_lib.php');
include('session_check.php');
include('conn_db.php');

if ($session == 0){
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';    
}

$project = Project::getProjectInfo();

$title = $project->getName();
$email = $project->getLeader();
require_once('header.php');
$shortname = $project->getShortName();
$_SESSION['shortname'] = $shortname;
$project->hasUser($userEmail);
?>




	<div id=project>

		<div id=projectdata>
			<h3> Project Information </h3>
					<ul id=commands>
						<li><a href=addtask.php title="Add Task"><img src=style/images/icons/linedpaperplus32.png alt=\"Add Task to Project\"></a></li>
			<?php if ($userEmail == $project->getLeader()){
				echo "			
					
						<li><a href=deleteproject.php?shortname=$shortname title=\"Delete Project\"><img src=style/images/icons/stop32.png alt=\"Delete Project\"></a></li>
				                <li><a href=completeproject.php?shortname=$shortname title=\"Toggle Project Completion\"><img src=style/images/icons/check32.png alt=\"Complete Project\"></a></li>
						<li><a href=useradd.php title=\"Add a User\"><img src=style/images/icons/user32.png alt=\"Add User to Project\"></a></li>
						<li><a href=removeusers.php?shortname=$shortname title=\"Remove a User\"><img src=style/images/icons/userminus32.png alt=\"Remove User from Project\"></a></li>
						<li><a href=addusertask.php title=\"Add Task to User\"><img src=style/images/icons/userplus32.png alt=\"Add Task to User\"></a></li>
						<li><a href=editproject.php?shortname=$shortname title=\"Edit Project\"><img src=style/images/icons/pencil32.png alt=\"Edit Project\"></a></li>
					</ul>";
				}
			?>
			<table>
				<tr><td>Name:</td><td><?php echo $project->getName() ?><td></tr>
				<tr><td>Leader:</td><td><?php echo $project->getLeaderName() ?><td></tr>
				<tr><td>Goal:</td><td><?php echo $project->getGoal() ?><td></tr>
				<tr><td>Deadline:</td><td><?php echo $project->getDeadline() ?><td></tr>
                                <tr><td>Completed:</td><td><?php echo $project->getCompletion() ?><td></tr>
			</table>
		</div>

		<div class=tasks>
		<h3> Your Project Tasks </h3>
			<ul>
				<?php
					
					$project->getUserTasks($userEmail);					
				
				?>
			</ul>
		</div>
		<div class=tasks>
		<h3> All Project Tasks </h3>
			<ul>
				<?php
					$project->getNotUserTasks($userEmail)
				?>
			</ul>
		</div>	
		<div class=tasks>
		<h3> Completed Project Tasks </h3>
			<ul>
				<?php
					$project->getCompletedTasks($userEmail)
				?>
			</ul>
		</div>	
	</div>

		

	</div>


	

	
</section>
</body>
</html>
