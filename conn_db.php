<?php

// PHPMyAdmin database login
$host = "130.18.209.166";
$user = "dcspg21";
$pass = '1234';

// create a connection to the database
$link = mysql_connect($host, $user, $pass);

// select the database
$selected = mysql_select_db("dcspg21",$link);


?>
