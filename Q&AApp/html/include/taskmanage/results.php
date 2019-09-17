<html>
<head>
		<title> 검색결과</title>
</head>
<body>
<?php
			trim($searchterm);
			if(!$_POST['searchtype'] || !$_POST['searchterm'])
			{
				 	exit;
			}
			$searchtype = addslashes($_POST['searchtype']);
			$searchterm = addslashes($_POST['searchterm']);
			$DB =mysqli_connect("localhost","root","2467","team4");
			if(!$DB)
			{
				exit;
			}

			$query = "select * from ACCOUNT where ".$searchtype."= '".$searchterm."'";
			$result = mysqli_query($DB, $query);
			$num_results = mysqli_num_rows($result);

			for($i=0; $i<$num_results; $i++){
				$row = mysqli_fetch_array($result);
				echo htmlspecialchars(stripslashes($row ["ID"]));
				echo "\t";
				echo htmlspecialchars(stripslashes($row ["Name"]));
				echo "\t";
				echo htmlspecialchars(stripslashes($row ["Gender"]));
				echo "\t";
				echo htmlspecialchars(stripslashes($row ["Role"]));
				echo "\n";
				echo "<br>";
			}
		?>
</body>
</html>
