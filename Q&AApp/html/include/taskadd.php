<form action = "include/taskadd_proc.php" name ="taskadd" method="post">
  <p>&middot테스크이름 : <input type = 'text' name = 'taskname'></p>
  <p>&middot테이블이름 : <input type = 'text' name = 'tablename'></p>
  <p>&middot설명 : <input type = 'text' name = 'description' style ='width : 600px'></p>
  <p>&middot제출주기 : <input type="radio" name="period" value="1">매일
  <input type="radio" name="period" value="2" >1주
  <input type="radio" name="period" value="3" >2주
  <input type="radio" name="period" value="4" >1개월
  <input type="radio" name="period" value="5" >2개월
  <input type="radio" name="period" value="6" >3개월
  <input type="radio" name="period" value="7" >6개월
  <input type="radio" name="period" value="8" >1년</p>
  <p>&middot데이터 테이블 스키마 : </p>
  <p><textarea name = 'dtschema' style ='width : 600px; height: 200px'></textarea></p>
  <p><br><br></p>
  <p><테스크 타입 설정></p>
  <p>
    &middot 테스크타입ID : <input type ='text' name ='typeid'>
  </p>
  <p>
    &middot Mapping정보 :
  </p>
  <p>
    <textarea name = 'mapping' style = 'width : 600px; height : 200px;'></textarea>
  </p>
  <p>
    &middot 스키마정보 :
  </p>
  <p>
    <textarea name = 'typeschema' style ='width : 600px; height: 200px'></textarea>
  </p>
  <p>
  <input type ='submit' name = 'submit' value = '생성하기'>
</p>
</form>
