<?php
require_once('conn_db.php');
require_once('class_lib.php');
include 'session_check.php';


$title = "Added Project";
require_once('header.php');
$projectName = $_SESSION['newproject'];
?>

	
	<div id=project>
		<div id=taskinfo>
			<h3> <?php echo $title; ?> </h3>
				Your project <?php echo " ".$projectName." "; ?> has been created. You may now proceed to party.
				
				


		</div>
	</div>

	

	
</section>
</body>
</html>
