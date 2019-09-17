<?php
			$USER_ID = addslashes($_POST['USER_ID']);
      $TASKNAME = addslashes($_POST['TASKNAME']);
      if( !$_POST['USER_ID']||!$_POST['TASKNAME'] )
			{
				 	exit;
			}
			$DB = mysqli_connect("localhost","root","2467","team4");

			if(!$DB)
			{
				exit;
			}
      $query = "insert into SUBMIT values('$TASKNAME','$USER_ID',2)";
			$result = mysqli_query($DB, $query);
			Header("Location:submitter.php")
?>
