<?php
	$db = mysql_connect("172.24.116.98:3306" , "a", "a");
	if(!$db)
	{
		echo "connection failed.";
	}
	mysql_select_db("test");
	$targetdb = "parsing";
	$evaluator = "2011147107";
	$avg = 0;


	$query = "Select avg(Quality) from ".$targetdb. " where SubmitterID=\"" . $submitter . "\" Group by SubmitterID";
	$result = mysql_query($query);
	$rowresult = mysql_fetch_array($result);
	echo $rowresult[0];
		
	
?>


