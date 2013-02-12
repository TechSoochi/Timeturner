<?php

require_once('conn_db.php');
require_once('class_lib.php');
$title = "Added Task";
require_once('header.php');
$name = $_SESSION['taskname'];
?>

	
	<div id=project>
		<div id=taskinfo>
			<h3> <?php echo $title; ?> </h3>
				Your task <?php echo " ".$name." "; ?> has been created. You may now proceed to party.
				
				


		</div>
	</div>

	

	
</section>
</body>
</html>
