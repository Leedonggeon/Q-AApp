<?php
session_start();
echo $_POST['gender'];
$id = strtolower($_POST['id']);
$conn=mysqli_connect('localhost', 'root', '2467', 'team4');
$sql="insert into ACCOUNT (ID,Password,Name,Gender,Birthdate,Phone,Address,Role)
values ('".$id."','".$_POST['pw1']."','".$_POST['name']."','".$_POST['gender']."','".$_POST['birth']."','".$_POST['phone']."','".$_POST['addr']."
','".$_POST['classification']."')";
$result = mysqli_query($conn, $sql);
Header("Location:login.php");
?>


<!--
<?php
session_start();
echo $_POST['gender'];
date_default_timezone_set('Asia/Seoul');
$id = strtolower($_POST['id']);
$time = date('Y-m-d H:i:s');
$conn=pg_connect('user=postgres password=2467 dbname=DB');
$sql="insert into 계정 (ID,패스워드,이름,성별,주소,생년월일,계정타입)
values ('".$id."','".$_POST['pw1']."','".$_POST['name']."','".$_POST['gender']."','".$_POST['addr']."','".$_POST['birth']."', '".$_POST['classification']."')";
$result = pg_query($conn, $sql);
?>
-->
