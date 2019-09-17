<html>
<head>
	<title> 회원검색 </title>
  <meta charset="utf-8">
</head>

 <?php
 			$DB = mysqli_connect("localhost","root","2467","team4");
 			if(!$DB)
 			{
 				exit;
 			}

 			$query = "Select Taskname from SUBMIT where Pass='P'";
 			$result = mysqli_query($DB, $query);
 			$num_results = mysqli_num_rows($result);


       if($num_results == 0){
         echo "태스크에 참여하는 제출자가 없습니다<br>";
         exit;
       }

       echo "<br>SELECT TASK<br>";
       echo "<form action ='manager.php?page=taskmanage/search_for_task' method='post'>";
       echo "<input type='hidden' name='searchtype' value='Taskname'>";
       echo "<select name = 'searchterm'>";
           for($i=0; $i<$num_results; $i++){
             $row = mysqli_fetch_array($result);
             $TMP = htmlspecialchars(stripslashes($row ["Taskname"]));
              echo "<option value='$TMP'>$TMP";
           }
         echo "<input type='submit' value='Search'>";
         echo "<br>";
         echo "</select>";
         echo "</form>";
 ?>
 </body>
 </html>
