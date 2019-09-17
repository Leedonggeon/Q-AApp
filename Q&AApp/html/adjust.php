<html>
  <head>
    <title>DBDB</title>
    <meta charset="UTF-8">
    <script type="text/javascript" src="js/deleteaccount.js"></script>
  </head>
  <body>
    <div id='wrap'>
      <form action = "adjust_proc.php" name ="register" method="post">
      <div class='line' style='border-top: 1px solid gray;'>

      <div class='line'><div class="label">&middot비밀번호</div><input type= "password" name="pw1" id="pw1"/></strong> (영문 숫자 혼합 8자이상 12자이내)</div>
      <div class='line'><div class="label">&middot비번확인</div><input type= "password" name="pw2" id="pw2"/></strong> <span id='compare'></span>
      <script>
      document.querySelector('#pw2').addEventListener('keyup', function(event){
          if(document.register.pw1.value==document.register.pw2.value){
                  document.querySelector('#compare').innerHTML = "";
                          }
                          else{
                              document.querySelector('#compare').innerHTML = "*비밀번호가 일치하지 않습니다";
                          }
              });
      </script>
      </div>
      <div class='line'>
          <div class="label">&middot이름</div><input type= "text" name="name" id = "name"/>
      </div>
      <div class='line'>
        <div class='label'>&middot전화번호</div><input type="text" name='phone' id='phone'/>
      </div>
      <div class='line'>
        <div class="label">&middot주소</div><input type ="text" name='addr' id='adder'/>
      </div>
</form>
      <div class="buttons">
          <input type='button' onclick="checkmodify()" value='정보수정'>
        <input type='button' onclick='deleteaccount()' value='회원탈퇴'></div>
      </div>
    </div>
  </body>
</html>
