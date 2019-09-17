<html>
<head>
	<title> 회원검색 </title>
  <meta charset="utf-8">
</head>

<form action = "manager.php?page=taskmanage/Search_Id" method="post">
 	<input type="submit" value="ID별 검색">
</form>
<form action = "manager.php?page=taskmanage/Search_Role" method="post">
 	<input type="submit" value="역할별 검색">
</form>
<form action = "manager.php?page=taskmanage/Search_Gender" method="post">
 	<input type="submit" value="성별별 검색">
</form>
<form action = "manager.php?page=taskmanage/Search_Task" method="post">
 	<input type="submit" value="참여 태스크별 검색">
</form>

<form action = "manager.php?page=taskmanage/Participation_sign" method="post">
  <input type="submit" value="태스크 참여 승인 or 거부">
</form>

<form action = "manager.php?page=taskmanage/upload_form" method="post">
  <input type="submit" value="파일제출">
</form>


 </body>
 </html>
