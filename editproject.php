<?php

require_once('conn_db.php');
require_once('class_lib.php');
$title = "Edit Project";
$project = Project::getProjectInfo();


$title = $project->getName();
$owner = $project->getLeader();
$duedate = $project->getDeadline();
$goal = $project->getGoal();
$shortname = $project->getShortName();
require_once('header.php');




?>




	
	<div id=project>
		<div id=taskinfo>
			<h3> <?php echo $title; ?> </h3>
				
				<form action=http://130.18.209.166/~dcspg21/changeproject.php?shortname=<?php echo $shortname; ?> method=post>
					<fieldset>
						<p><input type=text name=name value="<?php echo $title; ?>"></p>
						<p><input type=text name=goal value="<?php echo $goal; ?>"></p>
						<p><input type=text name=deadline value="<?php echo $duedate ?>"></p>
						<p><input type=text name=owner value="<?php echo $owner; ?>"></p>
						<p><input type=text name=shortname value="<?php echo $shortname ?>"></p>
						
	<br>

						<p><input type=submit value="Edit Project" class=logInButton></p>
					</fieldset>
				</form>


		</div>
	</div>

	

	
</section>
</body>
</html>
