<?

if (!$writer){
	echo("
		<script>
		window.alert('이름이 없습니다. 다시 입력하세요.')
		history.go(-1)
		</script>
	");
	exit;
}

if(!$topic){
	echo("
		<script>
		window.alert('제목이 없습니다. 다시 입력하세요.');
		history.go(-1);
		</script>
	");
	exit;
}

if(!$content){
	echo("
		<script>
		window.alert('내용이 없습니다. 다시 입력하세요.');
		history.go(-1);
		</script>
	");
	exit;
}

// 데이터베이스에 연결
$con =   mysql_connect("localhost","shoproot","pw4shoproot");
mysql_select_db("shopmall",$con);


$result=mysql_query("select id from $board",$con);
$total=mysql_num_rows($result);

// 글에 대한 id부여
if (!$total){
	$id = 1;
} else {
	$id = $total + 1;
}

$wdate = date("Y-m-d");	//   글 쓴 날짜 저장

// 테이블에 입력 글 내용을 저장
mysql_query("insert into $board(id, writer, email, passwd, topic, content, hit, wdate, space) values($id, '$writer', '$email', '$passwd', '$topic', '$content', 0, '$wdate', 0)", $con);

mysql_close($con);	// 데이터베이스 연결해제

//show.php 프로그램을 호출하면서 테이블 이름을 전달
echo("<meta http-equiv='Refresh' content='0; url=show.php?board=$board'>");

?>
