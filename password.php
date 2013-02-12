<?php
$title = "Change Password";

include 'header.php';

?>
<!-- change password -->
	<div class=member>
		<div id=login>
			<h3> Change Password </h3>
				<form action=changepassword.php method=post>
					<fieldset>
						<p><label for=oldpassword>Old Password: </label><input type=password name=oldpassword placeholder="Enter your old password"></p>
						<p><label for=newpassword>New Password: </label><input type=password name=newpassword placeholder="Enter your new password"></p>
						<p><label for=newpassword2>New Password: </label><input type=password name=newpassword2 placeholder="Enter your new password again"></p>
						
	<br>

						<p><input type=submit value="Change Password"></p>
					</fieldset>
				</form>
		</div>
	</div>
</section>
</body>
</html>
