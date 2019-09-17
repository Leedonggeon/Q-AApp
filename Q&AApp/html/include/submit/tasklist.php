<?php
			$DB = mysqli_connect("localhost","root","2467","team4");
			if(!$DB)
			{
				exit;
			}
      $query = "select * from SUBMIT WHERE Pass='P' AND SubmitterID='".$_SESSION['id']."'";
			$result = mysqli_query($DB, $query);
      $num_results = mysqli_num_rows($result);

      if($num_results==0){
        echo "참여하고있는 task가 없습니다";
        exit;
      }

      echo "<form action ='submitter.php?page=upload_form' method='post'>";
        for($i=0; $i<$num_results; $i++){
          $row = mysqli_fetch_array($result);
          $TMP = htmlspecialchars(stripslashes($row ["Taskname"]));
          $TMP2 = htmlspecialchars(stripslashes($row ["SubmitterID"]));
            echo "TASKNAME : $TMP<br>SUBMITTER_ID : $TMP2";
            echo "<input type='hidden' name='USER_ID' value='$TMP2'>";
            echo "<input type='hidden' name='TASKNAME' value='$TMP'>";
            echo "<br>";
						echo "<input type='submit' name='upload' value='파일제출'>";
            echo "<br><br><br>";
        }
?>
