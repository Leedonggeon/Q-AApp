<?php
session_start();
$conn=mysqli_connect('localhost', 'root', '2467', 'team4');
$sql = "select * from task";
$result = mysqli_query($conn, $sql);
echo "<form action='manager.php?page=tasktypeadd' method='post' name='type'>";
while($row = mysqli_fetch_array($result)){
  $list[$i] = $row['Taskname'];
  echo "<input type = 'radio' name = 'taskname' value ='$list[$i]'>";
  echo $list[$i]."<br>";
  $i = $i + 1;
}
echo "<input type='submit' name='type' value='추가'></form>";
?>
