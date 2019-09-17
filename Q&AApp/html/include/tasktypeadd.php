<?php
session_start();
echo $_POST['taskname']."의 데이터 타입 추가<br>";
?>


<p><테스크 타입 설정></p>
<p>
  <form action='manager.php?page=tasktype_proc' method='POST' name='tasktype'>
  &middot 테스크타입ID : <input type ='text' name ='typeid' id='typeid'>
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
  <input type = 'hidden' name = 'taskname' value = ''>

</p>
<p>
<input type ='submit' name = 'submit' value = '추가하기'>
</form>
</p>
<script>
var taskname = <?php echo json_encode($_POST['taskname']);?>;
document.tasktype.taskname.value = taskname;
</script>
