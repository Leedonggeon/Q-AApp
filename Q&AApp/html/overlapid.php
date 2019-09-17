<?php
session_start();
$conn=mysqli_connect('165.132.121.29', 'team4', '0000', 'test');
$sql="select * from ACCOUNT";
$result = mysqli_query($conn, $sql);
$inputid = strtolower($_POST['id']);
$checkidnum = 0;
$checkidempty = 0;
$i=0;
if($inputid==""){
  $checkidempty = 1;
}
else{
  $checkidempty = 0;
}

while($row = mysqli_fetch_array($result)){
  $id[$i]=$row['ID'];
  if($inputid==$id[$i]){
    $checkidnum = 1;
  }
  $i+=1;
}
if($checkidempty == 1 ){
  $checkidnum = 2;
}

echo $checkidnum;
?>
