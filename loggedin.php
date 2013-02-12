<!-- Display the user's projects and tasks -->
<div id=project>
		<div class=tasks>
		<h3> All Tasks </h3>
			<ul>
				<?php
				
					$user->viewTasks($userEmail);
				
				?>
			</ul>
		</div>
	
		<div class="clear"></div>
	</div>
</div>
	

	
</section>
</body>
</html>
