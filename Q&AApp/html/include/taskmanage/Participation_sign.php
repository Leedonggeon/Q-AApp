<html>
<head>
		<title> 태스크 참여 승인</title>
      <meta charset="utf-8">
</head>
<body>
<?php
			$DB = mysqli_connect("localhost","root","2467","team4");
			if(!$DB)
			{
				exit;
			}
      $query = "select * from SUBMIT WHERE Pass='NP' order by SubmitterID ";
			$result = mysqli_query($DB, $query);
      $num_results = mysqli_num_rows($result);

      if($num_results==0){
        echo "승인 할 태스크 참여 요청이 없습니다";
        exit;
      }

      echo "<form action ='manager.php?page=taskmanage/Participation_sign_result' method='post'>";
        for($i=0; $i<$num_results; $i++){
          $row = mysqli_fetch_array($result);
          $TMP = htmlspecialchars(stripslashes($row ["Taskname"]));
          $TMP2 = htmlspecialchars(stripslashes($row ["SubmitterID"]));
            echo "TASKNAME : $TMP<br>SUBMITTER_ID : $TMP2";
            echo "<input type='hidden' name='USER_ID' value='$TMP2'>";
            echo "<input type='hidden' name='TASKNAME' value='$TMP'>";
            echo "<br>";
            echo "<input type='submit' name='RESULT' value='SIGN'>";
            echo "<input type='submit' name='RESULT' value='REJECT'>";
            echo "</form><br><br><br>";
        }
?>
</body>
</html>
