<?php
session_start();
$conn=mysqli_connect('localhost', 'root', '2467', 'team4');
$sql="delete from ACCOUNT where id='".$_SESSION['id']."'";
$result=mysqli_query($conn, $sql);
Header("Location:login.php");
 ?>
