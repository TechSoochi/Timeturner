<?php

require_once('conn_db.php');
require_once('class_lib.php');
$title = "Edit Task";
$task = Task::getTaskInfo();
$name = $task->getName();
$details = $task->getDetails();
$duedate = $task->getDueDate();
require_once('header.php');
$id = $task->getID();

?>




	
	<div id=project>
		<div id=taskinfo>
			<h3> <?php echo $title; ?> </h3>
				
				<form action=http://130.18.209.166/~dcspg21/changetask.php?id=<?php echo $id; ?> method=post>
					<fieldset>
						<p><input type=text name=name value="<?php echo $name; ?>"></p>
						<p><input type=text name=details value="<?php echo $details; ?>"></p>
						<p><input type=text name=duedate value="<?php echo $duedate ?>"></p>
						
	<br>

						<p><input type=submit value="Edit Task" class=logInButton></p>
					</fieldset>
				</form>


		</div>
	</div>

	

	
</section>
</body>
</html>
