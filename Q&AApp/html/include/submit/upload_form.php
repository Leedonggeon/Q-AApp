<?php
 session_start();
 $conn=mysqli_connect('localhost', 'root', '2467', 'team4');
 $sql="select SourceID from collect where Taskname = '".$_POST['TASKNAME']."'";
 $result=mysqli_query($conn,$sql);
?>

<html>
<head>
	<title> 파일제출 </title>
  <meta charset="utf-8">
</head>

<form name="form1" method="post" enctype="multipart/form-data" action="submitter.php?page=upload">
	회차 : <input type = 'text' name = 'num'><br>
  타입 : <br>
  <?php
  while($row = mysqli_fetch_array($result)){
    echo "<input type='radio' name = 'type' value='".$row['SourceID']."'>".$row['SourceID']."<br>";
    $sql2 = "select `Schema` from source where ID=".$row['SourceID'];
    $result2 = mysqli_query($conn, $sql2);
    while($row2 = mysqli_fetch_array($result2)){
      echo $row2[0];
    };
    echo "<br>";
  }
   ?>
<table width="600" border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
   <td colspan="2" bgcolor="#FFFFFF">PHP를 이용한 파일업로드 기능의 구현</td>
</tr>
<tr>
   <td width="150" align="center" bgcolor="#FFFFFF">업로드할 파일</td>
   <td width="464" bgcolor="#FFFFFF"><input type="file" name="myFile" size="60" /></td>
</tr>
<tr>
   <td colspan="2" bgcolor="#FFFFFF"><input type="submit" value="파일 업로드" />
   <input type="reset" value="취소" /></td>
</tr>
</table>
</form>
 </body>
 </html>
