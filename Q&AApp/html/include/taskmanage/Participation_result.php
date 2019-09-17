<html>
<head>
		<title> 태스크 참여 신청 결과</title>
</head>
<body>
<?php
			$USER_ID = addslashes($_POST['USER_ID']);
      $TASKNAME = addslashes($_POST['TASKNAME']);
      if( !$_POST['USER_ID']||!$_POST['TASKNAME'] )
			{
				 	exit;
			}
			$DB = mysqli_connect("165.132.121.29","team4","0000","team4");

			if(!$DB)
			{
				exit;
			}
      $query = "insert into SUBMIT values('$TASKNAME','$USER_ID',2)";
			$result = mysqli_query($DB, $query);
?>
</body>
</html>
