<?php
session_start();
$conn=mysqli_connect('localhost', 'root', '2467', 'team4');
$sql = "update ACCOUNT set password = '".$_POST['pw1']."', name = '".$_POST['name']."',
Phone='".$_POST['phone']."', Address='".$_POST['addr']."'
WHERE ID='".$_SESSION['id']."'";
$result = mysqli_query($conn,$sql);
if($_SESSION['role']=='M'){
  Header("Location:manager.php");
}
if($_SESSION['role']=='S'){
  Header("Location:summitter.php");
}
if($_SESSION['role']=='E'){
  Header("Location:evaluator.php");
}
?>
