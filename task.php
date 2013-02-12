<?php
require_once('conn_db.php');
require_once('class_lib.php');
$task = Task::getTaskInfo();
$title = $task->getName();
require_once('header.php');
$id = $task->getID();
?>

	
	<div id=project>
		<div id=taskinfo>
			<h3> <?php echo $title; ?> </h3>
				<table>
					<tr><td> Belongs to: </td><td><?php 
									$owner = $task->getOwner(); 
									$ownerQuery = mysql_query("SELECT * FROM users where email=\"$owner\""); 
									$ownerRow = mysql_fetch_array($ownerQuery); 
									$ownerName = $ownerRow{'name'}; 
									echo $ownerName; ?>
								</td></tr>
					<tr><td> Due date: </td><td> <?php echo $task->getDueDate(); ?> </td><tr>
					<tr><td> Project: </td><td> <?php echo $task->getProject(); ?> </td><tr>
					<tr><td> Details: </td><td><?php echo $task->getDetails(); ?></td></tr>
                                        <tr><td> Complete: </td><td><?php echo $task->getCompletion(); ?></td></tr>

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
					else if ($userEmail == $owner &&  $done != "No"){
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
