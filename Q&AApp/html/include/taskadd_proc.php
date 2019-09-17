<?php
session_start();
$conn=mysqli_connect('localhost', 'root', '2467', 'team4');
$sql="insert into task (Taskname,Tablename,Description,Periodinfo,`Schema`)
values ('".$_POST['taskname']."','".$_POST['tablename']."
','".$_POST['description']."','".$_POST['period']."','".$_POST['dtschema']."')";
echo $sql;
$result=mysqli_query($conn, $sql);
$sql2="create table ".$_POST['tablename']."(".$_POST['dtschema'].
")ENGINE=InnoDB DEFAULT CHARSET=utf8;";
$result2=mysqli_query($conn, $sql2);
echo $sql2;
$sql3="insert into SOURCE
values ('".$_POST['typeid']."','".$_POST['mapping']."','".$_POST['typeschema']."')";
$result3=mysqli_query($conn, $sql3);
$sql4="insert into COLLECT values ('".$_POST['taskname']."','".$_POST['typeid']."')";
$result4=mysqli_query($conn, $sql4);
$sql5="insert into management values('".$_POST['taskname']."', '".$_SESSION['id']."')";
$result5=mysqli_query($conn, $sql5);
Header("Location:/manager.php");

?>
