<?php
include('class_lib.php');
include('session_check.php');
include('conn_db.php');

if ($session == 0){
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';    
}

$project = Project::getProjectInfo();

$title = "Users of ".$project->getName();
$email = $project->getLeader();
require_once('header.php');

$shortname = $_GET['shortname'];
$project->hasUser($userEmail);
?>

	
	<div id=project>
		<div id=taskinfo>
			<h3> <?php echo $title; ?> </h3>
				<table>
					<?php $project->getUsers($shortname) ?>

				</table>
				<?php
				$done = $task->getCompletion();
					if ($userEmail == $owner &&  $done == "No"){
						echo "
							<table id=actions>
								<tr><td><a href='edittask.php?id=$id'> Edit Task </a></td>
						                    <td><a href='delete.php?id=$id'> Delete Task </a></td>
						                    <td> <a href='completetask.php?id=$id'>Mark Task as Done</a></td></tr>
							</table>";
					}
					else {
						echo "
							<table id=actions>
								<tr><td><a href='edittask.php?id=$id'> Edit Task </a></td>
						                    <td><a href='delete.php?id=$id'> Delete Task </a></td>
						                    <td> <a href='undotask.php?id=$id'>Mark Task as Undone</a></td></tr>
							</table>";
					}
	
				?>
		</div>
	</div>

	

	
</section>
</body>
</html>
