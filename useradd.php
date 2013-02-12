<?php

require_once('conn_db.php');
require_once('class_lib.php');
$title = "Add User";
require_once('header.php');
?>




	
	<div id=project>
		<div id=taskinfo>
			<h3> <?php echo $title; ?> </h3>
				
				<form action=http://130.18.209.166/~dcspg21/adduser.php method=post>
					<fieldset>
						<p><input type=text name=email placeholder="User Email"></p>
						
	<br>

						<p><input type=submit value="Add User" class=logInButton></p>
					</fieldset>
				</form>


		</div>
	</div>

	

	
</section>
</body>
</html>
