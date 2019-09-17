<html>
<head>
		<title> 참여신청</title>
    <meta charset="utf-8">

    <script type="text/javascript">
		function mOnclick() {
			alert(document.sel_task.value);
		}

	   </script>
</head>
<body>
<?php
			if( !$_POST['USER_ID'])
			{
				 	exit;
			}
			$USER_ID = addslashes($_POST['USER_ID']);
			$DB = mysqli_connect("165.132.121.29","team4","0000","team4");
			if(!$DB)
			{
				exit;
			}

			$query = "Select t.Taskname from TASK as t left join
      (select Taskname from SUBMIT where SubmitterID='$USER_ID') as s on s.Taskname=t.Taskname where s.Taskname is null";
			$result = mysqli_query($DB, $query);
			$num_results = mysqli_num_rows($result);

      if($num_results == 0){
        echo "참여할 태스크가 없습니다<br>";
        exit;
      }

        echo "<form action ='manager.php?page=taskmanage/Participation_result' method='post'>";
          for($i=0; $i<$num_results; $i++){
            $row = mysqli_fetch_array($result);
            $TMP = htmlspecialchars(stripslashes($row ["Taskname"]));
              if($i==0){
                echo "<input type='radio' name='TASKNAME' value='$TMP' checked>$TMP";
                echo "<br>";
              }else{
                echo "<input type='radio' name='TASKNAME' value='$TMP'>$TMP";
                echo "<br>";
              }
          }
        echo "<input type='hidden' name='USER_ID' value=".$USER_ID.">";
        echo "<input type='submit' value='태스크신청'>";
        echo "<br>";
        echo "</form>";
?>
</body>
</html>
