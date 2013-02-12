<?php
$title = "Password Reset";

include 'header.php';
$value = $_GET['id'];
?>
<!-- contact support -->
	<div class=member>
		<div id=login>
			<h3> What's your new password? </h3>
				<form action=http://130.18.209.166/~dcspg21/passwordfixer.php?value=<?php echo $value; ?> method=post>
					<fieldset>
						<p><input type=text name=password placeholder="New password"></p>

						<p><input type=submit value="Change password!"></p>
					</fieldset>
				</form>
		</div>
	</div>
</section>
</body>
</html>
