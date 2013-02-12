<?php
	require_once('conn_db.php');

	require_once('class_lib.php');

	require_once('session_check.php');

        $user = unserialize($_SESSION['loggedIn']);
        $email = $user->getEmail();
        
        $passwordtoverify = $user->getPassword();

	$oldpassword = $_POST['oldpassword'];
	$newpassword = $_POST['newpassword'];
	$newpasswordverify = $_POST['newpassword2'];

        if(!(crypt($oldpassword, $passwordtoverify) == $passwordtoverify))
        {
            echo("Old Password does not match");
        }

        else if($newpassword != $newpasswordverify)
        {
            echo("New Password does not match");
        }

        else
        {
            $newpassword = crypt($newpassword);

            if ($link){
		$result = mysql_query("UPDATE `dcspg21`.`users` SET `password` = '$newpassword' WHERE `users`.`email` = '$email'");
		//echo "UPDATE `dcspg21`.`projects` SET `name` = '$name', `leader` = '$leader', `goal` = '$goal', `shortname` = '$newShortname',`deadline`=$deadline WHERE `projects`.`shortname` = '$shortname'";
		if ($result){
//                        session_start();
//			$name = $user->getName();
//			$password = $user->getPassword();
//			$email = $user->getEmail();
//			$user = new User($name, $password, $email);
//			$_SESSION['loggedIn'] = serialize($user);
                        session_destroy();
			// redirects to logged in home page
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=http://130.18.209.166/~dcspg21/">';
			exit;
		}
		else {
                    echo "UGH";
		}
	}
            else {
		echo "NO CONN";
            }
        }

	
?>

