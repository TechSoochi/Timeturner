<?php
	require_once('conn_db.php');

	require_once('class_lib.php');

	require_once('session_check.php');
        
        $project = Project::getProjectInfo();

	$shortname = $_GET['shortname'];
        $completion = $project->getCompletion();

	if ($link){
                if($completion == "Yes")
                {
                    $result = mysql_query("UPDATE  `dcspg21`.`projects` SET  `completion` =  '0'
                        WHERE `projects`.shortname = \"$shortname\"");
                }

                else if($completion == "No")
                {
                    $result = mysql_query("UPDATE  `dcspg21`.`projects` SET  `completion` =  '1'
                        WHERE `projects`.shortname = \"$shortname\"");
                }
		
		if ($result){

		echo "<META HTTP-EQUIV='Refresh' Content='0; URL=http://130.18.209.166/~dcspg21/'>";
		}
		else {
                    echo "UGH";
		}
	}
	else {
		echo "NO CONN";
	}
?>

