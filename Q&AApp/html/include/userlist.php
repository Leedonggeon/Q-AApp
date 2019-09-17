<?php
session_start();
$conn = mysqli_connect('localhost','root','2467','team4');
$sql = "select * from ACCOUNT";
$result = mysqli_query($conn, $sql);
while($row=mysqli_fetch_array($result)){
  if($row['Role']!='M'){
   echo $row['ID'];
   echo "   ";
   echo $row['Name'];
   echo "   ";
   echo $row['Gender'];
   echo "   ";
   echo $row['BirthDate'];
   echo "   ";
   echo $row['Phone'];
   echo "   ";
   echo $row['Address'];
   echo "   ";
   echo $row['Role'];
   echo "   ";
   echo "<form action = 'manager.php?page=userprofile' method='post' name='user'>";
   echo "<input type = 'hidden' name = 'userid' value='".$row['ID']."'>";
   echo "<input type = 'hidden' name = 'userrole' value='".$row['Role']."'>";
   echo "<input type = 'submit' name = 'sub' value='정보보기'></form><br>";
 }
}
?>
