<?php
$title = "Register for Timeturner";
require_once('header.php');
?>
<!-- registration page -->
	<div class=member>
		<div id=login>
			<h3> Register </h3>
				<form action=registration.php method=post>
					<fieldset>
						<p><label for=name>Name: </label><input type=text name=name placeholder="Enter your first and last name"></p>
						<p><label for=email>Email: </label><input type=text name=email placeholder="Enter your email"></p>
						<p><label for=password>Password: </label><input type=password name=password placeholder="Enter your password"></p>
						<p><label for=confirmpassword>Confirm Password: </label><input type=password name=confirmpassword placeholder="Confirm your password"></p>
	<br>

						<p><input type=submit value="Register"></p>
					</fieldset>
				</form>
		</div>
	</div>
</section>
</body>
</html>
