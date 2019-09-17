<!DOCTYPE html>
<head>
  <title>login</title>
  <script type="text/javascript" src="checklogin.js"></script>
</head>
<body>
  <div id='loginbox'>
    <form action='login_proc.php' method='post' name='login'>
      <input type='text' class='loginbox' id='id' name='id' placeholder='아이디'>
      <input type='password' class='loginbox' id='pw' name='pw' placeholder='비밀번호' onKeypress="if(event.keyCode ==13){checklogin(); return;}">
      <input type='submit' class='button' value='로그인'>
    </form>
  </div>
  <div id='register'>
    <a href='register.php'>아직 계정이 없어요!</a>
  </div>
</body>
