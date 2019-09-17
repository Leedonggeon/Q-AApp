<?php
         if( !$_SESSION['id'])
         {
                exit;
         }
         $USER_ID = addslashes($_SESSION['id']);
         $DB = mysqli_connect('localhost', 'root', '2467', 'team4');
         if(!$DB)
         {
            exit;
         }

         $query = "Select * from TASK";
         $result = mysqli_query($DB, $query);
         $num_results = mysqli_num_rows($result);


        echo "<form name='type' method='post' action='/manager.php?page=tasktype'>";
        for($i=0; $i<$num_results; $i++){
          $row = mysqli_fetch_array($result);
          $TMP = htmlspecialchars(stripslashes($row ["Taskname"]));
            if($i==0){
              echo "<input type='radio' name='sel_task' value='$TMP' >$TMP";

              echo "<br>";
            }else{
              echo "<input type='radio' name='sel_task' value='$TMP'>$TMP";
              echo "<br>";
            }
        }
        echo "<input type='button' name='TASKNAME' value='Add task type' onclick=createtasktype()><br>";
        echo "</form>";


?>
<script>
function createtasktype(){
		document.type.submit();
  }
    </script>
