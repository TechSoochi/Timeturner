<?php
require_once('class_lib.php');
include 'session_check.php';
if ($session == 0){
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
}

require_once('conn_db.php');

$title = "Add Project";
require_once('header.php');
?>

	
	<div id=project>
		<div id=taskinfo>
			<h3> <?php echo $title; ?> </h3>
				
				<form action=http://130.18.209.166/~dcspg21/processproject.php method=post>
					<fieldset>
						<p><input type=text name=name placeholder="Project Name"></p>
						<p><input type=text name=deadline placeholder="Deadline (in YYYY-MM-DD format)"></p>
						<p><input type=text name=goal placeholder="Project Goal"></p>
						<p><input type=text name=shortname placeholder="Project Shortname (for example, testproj)"></p>
						
	<br>

						<p><input type=submit value="Create Project" class=logInButton></p>
					</fieldset>
				</form>


		</div>
	</div>

	

	
</section>
</body>
</html>
