<?php
require_once('conn_db.php');
require_once('class_lib.php');
$task = Task::getTaskInfo();
$title = $task->getName();
require_once('header.php');
?>

	
	<div id=member>
		<div id=taskinfo>
			<h3> <?php echo $title; ?> </h3>
				
				<form action=http://adamthrash.ipower.com/timeturner/addproject.php method=post>
					<fieldset>
						<p><label for=name>Name: </label><input type=text name=name placeholder="Enter your name"></p>
						<p><label for=email>Email: </label><input type=text name=email placeholder="Enter your email"></p>
						<p><label for=message>Message: </label><textarea rows="2" cols="20" name=message placeholder="Your Message"></textarea></p>
						
	<br>

						<p><input type=submit value="Send Message"></p>
					</fieldset>
				</form>
		</div>
	</div>

	

	
</section>
</body>
</html>
