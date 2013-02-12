<?php
require_once('conn_db.php');
require_once('class_lib.php');
$title = "Add Task";
require_once('header.php');
?>

	
	<div id=project>
		<div id=taskinfo>
			<h3> <?php echo $title; ?> </h3>
				
				<form action=http://130.18.209.166/~dcspg21/processusertask.php method=post>
					<fieldset>
						<p><input type=text name=name placeholder="Task Name"></p>
						<p><input type=text name=details placeholder="Details"></p>
						<p><input type=text name=duedate placeholder="Due Date (YYYY-MM-DD)"></p>
						<p><input type=text name=useremail placeholder="User Email"></p>
						
	<br>

						<p><input type=submit value="Create Task" class=logInButton></p>
					</fieldset>
				</form>


		</div>
	</div>

	

	
</section>
</body>
</html>
