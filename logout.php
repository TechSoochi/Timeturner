<?php
// open the session
session_start();

// unset all session variables
session_unset();

// destroy the session
session_destroy();

// set the $session variable as logged out
$session = 0;

// redirect the user to the log in page
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=http://130.18.209.166/~dcspg21/">';      
?>

