<?php
	$db = mysql_connect("172.24.116.98:3306" , "a", "a");
	if(!$db)
	{
		echo "connection failed.";
	}
	mysql_select_db("test");
	$targetdb = "bankaccount";
	$filepath = "csv/tmp.csv";
	$filepath2 = "C:/APM_Setup/Server/MySQL5/data/csv/tmp.csv";


	$query = "Select * from ".$targetdb. " into outfile \"". $filepath . "\" fields terminated by ',' escaped by '\\\' lines terminated by '\\n'";
	//echo $query;
	mysql_query($query);
	$filesize = filesize($filepath2);
	$path_parts = pathinfo($filepath2);
	$filename = $path_parts['basename'];
	$extension = $path_parts['extension'];
 
	header("Pragma: public");
	header("Expires: 0");
	header("Content-Type: application/octet-stream");
	header("Content-Disposition: attachment; filename=\"$filename\"");
	header("Content-Transfer-Encoding: binary");
	header("Content-Length: $filesize");
 
	ob_clean();
	flush();
	readfile($filepath);
	
?>


