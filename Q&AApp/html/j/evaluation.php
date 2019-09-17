<?php
	$db = mysql_connect("172.24.116.98:3306" , "test", "0000");
	if(!$db)
	{
		echo "connection failed.";
	}
	mysql_select_db("test");
	$query = "select * from ACCOUNT, PARSING, EVALUATION where ACCOUNT.ID = EvaluatorID and PARSING.ID = ParsingID and ACCOUNT.ID=\"221\" ";
	$queryresult = mysql_query($query);
	$num = mysql_num_rows($queryresult);
	for($j=0; $j<$num; $j++)
	{
		$rowresult = mysql_fetch_array($queryresult);
		
		$resultarray = array();
		$result = array($resultarray);
		$duplicated= 0;
		$nullrow=0;
		$counter=0;
		$fcsv = fopen($rowresult["Filename"], "r");
		while(($data = fgetcsv($fcsv, 1000, ","))!==False) {
			$result[$counter] = $data;
			$counter++;
		}

			$temp = $result[$j];
			for($k=$j; $k < count($result)-1; $k++) {
				if($temp == $result[$k+1])
				{
					$duplicated++;
				}
			}
		}


	
		for($j=0; $j < count($result); $j++) {
			for($k=0; $k < count($result[$j]); $k++) {
	
				if($result[$j][$k]=="")
				{
					$nullrow++;
				}
			}
		}


		$value = 10 - ($duplicated)/ count($result) - $nullrow / (count($result) * count($result[0]));	


		echo "Value : ". $value . "<br/>\n";

		if($value>7)
		{
			$query = "update PARSING set PNP=\"1\" where ID=\"" . $rowresult["ID"]. "\"";
			mysql_query($query);
		}
		fclose($fcsv);
	}
?>