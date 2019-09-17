<?php
session_start();
$conn=mysqli_connect('localhost', 'root', '2467', 'team4');
$sql2="insert into SOURCE
values ('".$_POST['typeid']."','".$_POST['mapping']."','".$_POST['typeschema']."')";
$result2=mysqli_query($conn, $sql2);
$sql="insert into COLLECT values ('".$_POST['taskname']."','".$_POST['typeid']."')";
$result=mysqli_query($conn, $sql);
echo $sql;
Header("Location:/manager.php");
?>
