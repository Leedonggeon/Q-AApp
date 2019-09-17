<?php
session_start();
$conn=mysqli_connect('localhost', 'root', '2467', 'team4');
$sql = "select * from ACCOUNT";
$result = mysqli_query($conn, $sql);
$userid = strtolower($_POST['id']);
$userpw = $_POST['pw'];
while($row = mysqli_fetch_array($result)){
  $strid = strcmp($userid, $row['ID']);
  $strpw = strcmp($userpw, $row['Password']);
  if(!$strid&&!$strpw){
    $_SESSION['id']=$row['ID'];
    $_SESSION['role']=$row['Role'];
  }
}
if(!isset($_SESSION['id'])) {
  echo "<script>alert('check your id or password!');history.back();</script>";
  exit;
}
if($_SESSION['role']=='M'){
  Header("Location:manager.php");
}
if($_SESSION['role']=='S'){
  Header("Location:submitter.php");
}
if($_SESSION['role']=='E'){
  Header("Location:evaluator.php");
}
?>
