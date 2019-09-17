제출자 페이지입니다
<?php
session_start();
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>관리자얌</title>
    <link rel="stylesheet" type="text/css" href="css/standard.css">

  </head>
  <body>
    <div id = 'header_w'>
      <div id = 'title'>
        관리자다
      </div>
      <div id = 'menu'>
        <a href='adjust.php'>정보수정</a>
        <a href='logout_proc.php'>로그아웃</a>
      </div>
    </div>
    <div id='body_w'>
      <div id = 'side'>
        <ul>
          <li><a href=submitter.php?page=taskapply>task신청</a></li>
          <li><a href=submitter.php?page=tasklist>task목록</a></li>
        </ul>
      </div>
      <div id = 'content'>
        <?php
        if (empty($_GET['page']) == false){
          if ($_SESSION['role'] == M){
            include ("include/".$_GET['page'].".php");
          }
          else if($_SESSION['role'] == S){
            include ("include/submit/".$_GET['page'].".php");
          }
          else{
            include ("include/evaluate/".$_GET['page'].".php");
          }
        }
        ?>
      </div>
    </div>
  </body>
</html>
