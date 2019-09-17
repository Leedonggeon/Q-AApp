<?php
//업로드한 파일을 저장할 디렉토리
$save_dir = 'C:\nginx\html\sourcetask\\';
$save_dir2 = 'C:\nginx\html\sourcetype\\';
$date = date("Ymd");

$conn = mysqli_connect('localhost', 'root', '2467', 'team4');
$sql = "select mapping from source where ID = ".$_POST['type'];
$result = mysqli_query($conn, $sql);
while($row=mysqli_fetch_array($result)){
  $mapping = $row[0];
}
//mapping 정보를 가져와서 php함수로 나누기? 띄어쓰기단위로.
$mapping2 = explode(' ', $mapping, -1);
$num = count($mapping2)+1;
$mapping = explode(' ', $mapping, $num);
for($i=0; $i<$num; $i++){
  $nummap[] = (int)$mapping[$i];
  echo $mapping[$i];
}


if(is_uploaded_file($_FILES["myFile"]["tmp_name"]))
{
  echo "업로드한 파일명 : ".$_FILES["myFile"]["name"] ."<br />";
  echo "업로드한 파일의 크기 : ".$_FILES["myFile"]["size"] ."<br />";
  echo "업로드한 파일의 MIME Type : ".$_FILES["myFile"]["type"] ."<br />";
  echo "임시 디렉토리에 저장된 파일명 : ".$_FILES["myFile"]["tmp_name"]."<br />";
  $dest = $save_dir . $date . "_" . $_POST['type'] . "_". $_POST['num'] . "_" . $_SESSION['id'] .".csv";
  $dest2 = $save_dir2 . $date . "_" . $_POST['type'] . "_". $_POST['num'] . "_" . $_SESSION['id'] .".csv";
  if(!move_uploaded_file($_FILES["myFile"]["tmp_name"], $dest)){
    die("다이");
    exit;
  }
//파일 내용 다 불러와서 array저장
$fp = fopen($dest,"r");
while( $row3 = fgetcsv($fp)){
  for($j=0; $j<$num; $j++){
   $new[$j] = $row3[$nummap[$j]];
  }
  $address_book [] = $new;
}

$fp = fopen($dest2,"w");

foreach($address_book as $line){
  fputcsv($fp, $line);
}
}

//parsing 테이블 생성

$update = date(Ymd);
//테스크이름
$sql2="select taskname from collect where SourceID = '".$_POST['type']."'";
$result2=mysqli_query($conn, $sql2);
while($row=mysqli_fetch_array($result2)){
  $taskname = $row[0];
}
//duration
$sql3="select * from task where taskname = '".$taskname."'";
$result3=mysqli_query($conn, $sql3);
while($row=mysqli_fetch_array($result3)){
  $period = $row['Periodinfo'];
}
  if($period == 'daily'){
    $duedate = date(Ymd, strtotime("+1 day"));
  }
  else if($period == 'monthly'){
    $duedate = date(Ymd, strtotime("+1 month"));
  }
  else if($period == 'yearly'){
    $duedate = date(Ymd, strtotime("+1 year"));
  }

//랜덤 evaluator 배정
$randsql = "select * from account where role = 'E' order by rand() limit 1";
$randresult = mysqli_query($conn, $randsql);
while($row = mysqli_fetch_array($randresult)){
  $evaluator = $row['ID'];
}

//점수계산
$query = "select * from ACCOUNT, PARSING, EVALUATION where ACCOUNT.ID = EvaluatorID and PARSING.ID = ParsingID and ACCOUNT.ID=".$_SESSION['id'];
echo $query;
$queryresult = mysqli_query($conn, $query);
$num = mysqli_num_rows($queryresult);
for($j=0; $j<$num; $j++)
{
  $rowresult = mysqli_fetch_array($queryresult);

  $resultarray = array();
  $results = array($resultarray);
  $duplicated= 0;
  $nullrow=0;
  $counter=0;
  $fcsv = fopen($dest2, "r");
  while(($data = fgetcsv($fcsv, 1000, ","))!==False) {
    $results[$counter] = $data;
    $counter++;
  }

    $temp = $results[$j];
    for($k=$j; $k < count($results)-1; $k++) {
      if($temp == $results[$k+1])
      {
        $duplicated++;
      }
    }
  }



  for($j=0; $j < count($results); $j++) {
    for($k=0; $k < count($results[$j]); $k++) {

      if($results[$j][$k]=="")
      {
        $nullrow++;
      }
    }
  }

  $value = 10 - ($duplicated)/ count($results) - $nullrow / (count($results) * count($results[0]));

  $nullratio = $nullrow / (count($results));
  $dupliratio = ($duplicated)/ count($results);

//최종삽입
$sql10 = "insert into parsing (id,taskname,submitterID,Startdate,Enddate,Number,`Schema`,quality,filename,evalornot,Rownumber,Nullratio,`duplicated`)
values('".$_SESSION['id']."', '".$taskname."', '".$_SESSION['id']."',
$update, $duedate, '".$_POST['num']."', $dest2, $value, $dest2, 1, $num,
$nullratio, $dupliratio )";


//matching 테이블 생성
$sql3 = "insert matching values ('".$_POST['type']."', )"


?>
