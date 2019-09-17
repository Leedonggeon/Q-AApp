<html>
  <head>
    <title>DBDB</title>
    <meta charset="UTF-8">
    <script type="text/javascript" src="js/checkfield.js"></script>
  </head>
  <body>
    <div id='wrap'>
      <form action = "register_proc.php" name ="register" method="post">
      <div class='line' style='border-top: 1px solid gray;'>
          <div class="label">&middot아이디</div><input type= "text" name="id" id = "id"/>
          <a id = "idcheck" >[중복확인]</a>(영문, 숫자 6~12자)
          <script>
          document.querySelector('#idcheck').addEventListener('click', function(event){
              var xhr = new XMLHttpRequest();
              xhr.open('POST', './overlapid.php');
              xhr.onreadystatechange = function(){
                  if(xhr.readyState === 4 && xhr.status === 200){
                      checkidnum = xhr.responseText;
                                  if(checkidnum == 0){
                                      var idtext = /^([a-zA-Z0-9]{6,12})/;
                                      if(idtext.test(document.register.id.value)==false){
                                          alert("아이디 형식이 올바르지 않습니다!");
                                          document.resgister.id.focus();
                                      }
                                      else{
                                      alert ("사용가능한 id입니다");
                                  }
                              }
                                  else{
                                      alert ("사용불가능한 id입니다");
                                  }
                  }
              }
                  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
              var data = '';
                  data += 'id='+document.getElementById('id').value;
              xhr.send(data);

          });
          document.querySelector('#id').addEventListener('keyup', function(event){
            checkidnum = 1;
          });
          </script>
      </div>
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
        <div class='label'>&middot성별</div>
        <input type='radio' name='gender' id='gender' value='1'/><label for='gender' style='top:-20px;'>남자</label>&nbsp;&nbsp;
        <input type='radio' name='gender' id='gender' value='2'/><label for='gender'>여자</label>
      </div>
      <div class='line'>
        <div class='label'>&middot생년월일</div><input type="date" name='birth' id='birth'/>
      </div>
      <div class='line'>
        <div class='label'>&middot전화번호</div><input type="text" name='phone' id='phone'/>
      </div>
      <div class='line'>
        <div class="label">&middot주소</div><input type ="text" name='addr' id='adder'/>
      </div>

      <div class='line'>
        <div class='label'>&middot직업</div>
        <input type='radio' name='classification' id='classification' value='2'/><label for='classification' style='top:-20px;'>제출자</label>&nbsp;&nbsp;
        <input type='radio' name='classification' id='classification' value='3'/><label for='classification'>평가자</label>
      </div></form>
      <div class="buttons">
          <div class='button' onclick="checkfield()">회 원 가 입</div>
      </div>
    </div>
  </body>
</html>
