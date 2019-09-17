<html>
<head>
	<title> 회원검색 </title>
  <meta charset="utf-8">
</head>

<form action = "manager.php?page=taskmanage/results" method="post">
  <br>
  SELECT GENDER
	<br>
	<select name = "searchterm">
		<option value="M">남자
    <option value="F">여자
	</select>

  <input type="hidden" name ="searchtype" value="Gender">
 	<input type="submit" value="Search">
 </form>

 </body>
 </html>
