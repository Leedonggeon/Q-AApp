<?php
session_start();
			if( !$_SESSION['id'])
			{
				 	exit;
			}
			$USER_ID = addslashes($_SESSION['id']);
			$DB = mysqli_connect("localhost","root","2467","team4");
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

        echo "<form action ='submitter.php?page=taskapply_result' name = 'result' method='post'>";
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
        echo "<input type='button' value='태스크신청' onclick='agree()'>";
        echo "<br>";
        echo "</form>";
?>
<script>
function agree(){
	var agree = confirm("개인정보 이용에 동의하십니까?");
	if(agree == true){
		document.result.submit();
	}
}
</script>
