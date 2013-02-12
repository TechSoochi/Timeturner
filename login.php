<?php ?>
	<div class=member>
		<div id=login>
		<h3> 
<?php 

// if the user has failed the log in, title the form as "Please try again."
if ($_SESSION['fail'] == 1) 
{ 
	echo "Please try again.";
	$_SESSION['fail'] = 0;
} 
// if the user hasn't failed yet, title the form as "Log in."
else 
{ 
	echo "Log In";
} ?>		</h3>
			<!-- the actual login form -->
			<form action=validate.php method=post>
				<fieldset>
					<p><label for=email>Email: </label><input type=text name=username placeholder="Enter your email"></p>
					<p><label for=password>Password: </label><input type=password name=password placeholder="Enter your password"></p>
					<p><a href=forgot.php>Forgot your password?</a></p>
<br>

					<p><input type=submit value="Log In" class=logInButton></p>
				</fieldset>
			</form>
	</div>	
	</div>

	<div class=register>
		<p> Not a member? Click <a href=http://130.18.209.166/~dcspg21/register.php>here</a>.
		<p><a href=http://130.18.209.166/~dcspg21/contact.php>Contact us!</a>


	
</section>
</body>
</html>
