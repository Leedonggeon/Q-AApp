<html>
<head>
		<title> 태스크 참여 승인 결과</title>
    <meta charset="utf-8">
</head>
<body>
<?php

      $SIGN = addslashes($_POST['RESULT']);
      $USER_ID = addslashes($_POST['USER_ID']);
      $TASKNAME = addslashes($_POST['TASKNAME']);

      $DB = mysqli_connect("localhost","root","2467","team4");
      if(!$DB)
      {
        exit;
      }


      if( $SIGN == "SIGN" )
			{
        $query = "update SUBMIT set Pass='P' where Taskname='$TASKNAME' and SubmitterID = '$USER_ID'";
        $result = mysqli_query($DB, $query);
			}else{
        echo "$SIGN";
        $query = "delete from SUBMIT where Taskname='$TASKNAME' and SubmitterID = '$USER_ID'";
        $result = mysqli_query($DB, $query);
      }
			header("Location:manager.php?page=taskmanage");

?>
</body>
</html>
