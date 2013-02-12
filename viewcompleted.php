<?php
include('class_lib.php');
include('session_check.php');
include('conn_db.php');

if ($session == 0){
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';    
}
$title = "Completed Projects";
require_once('header.php');

?>
<div id=project>
		<div id=completedprojects>
		<h3> All Projects </h3>
			<ul>
				<?php
				
					$user->viewCompletedProjects($userEmail);
				
				?>
			</ul>
		</div>
	
		<div class="clear"></div>
	</div>
</div>
	

	
</section>
</body>
</html>
