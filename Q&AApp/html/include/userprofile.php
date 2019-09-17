<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '2467', 'team4');
$sql = "select * from submit where submitterID = '".$_POST['userid']."'";
$result = mysqli_query($conn, $sql);
if($_POST['userrole']=="S"){
  echo "참여중인 task list<br><br><br>";
  while($row = mysqli_fetch_array($result)){
    echo $row['Taskname'];
    echo " ";
    echo $row['SubmitterID'];
    echo "<br><br>";
  }
}
 ?>
