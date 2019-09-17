<?php
	$db = mysql_connect("172.24.116.98:3306", "a", "a");
	if(!$db)
	{
		echo "connection failed.";
	}
	mysql_select_db("test");
	$query = "Select * from PARSING  where PNP=\"P\" ";
	$queryresult = mysql_query($query);
	$num = mysql_num_rows($queryresult);
	for($j=0; $j<$num; $j++)
	{
		$rowresult = mysql_fetch_array($queryresult);
		$query = "Select * from TASK, PARSING where ID=\"" . $rowresult["ID"] . "\" and PARSING.Taskname = TASK.Taskname";
		echo $query . "<br/>\n";
		$queryresult2 = mysql_query($query);
		$target = mysql_fetch_array($queryresult2);
		$targettable = $target["Tablename"];
		$targettask = $target["Taskname"];
		$query = "load data infile \"" . $target["Filename"] . "\" into table ". $targettable . " fields terminated by ',' (ID, SubmitterID, bank_log, bank)";
		echo $query;

	}
?>





















