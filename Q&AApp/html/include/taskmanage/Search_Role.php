<html>
<head>
	<title> 회원검색 </title>
  <meta charset="utf-8">
</head>

<form action = "manager.php?page=taskmanage/results" method="post">
  <br>
  SELECT ROLE
	<br>
	<select name = "searchterm">
		<option value="S">제출자
    <option value="E">평가자
	</select>

  <input type="hidden" name ="searchtype" value="Role">
 	<input type="submit" value="Search">
 </form>

 </body>
 </html>
