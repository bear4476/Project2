<?

if (!$writer){
	echo("
		<script>
		window.alert('이름이 없습니다. 다시 입력하세요')
		history.go(-1)
		</script>
	");
	exit;
}

if (!$topic){
	echo("
		<script>
		window.alert('제목이 없습니다. 다시 입력하세요')
		history.go(-1)
		</script>
	");
	exit;
}

if (!$content){
	echo("
		<script>
		window.alert('내용이 없습니다. 다시 입력하세요')
		history.go(-1)
		</script>
	");
	exit;
}

$con =   mysql_connect("localhost","shoproot","pw4shoproot");
mysql_select_db("shopmall",$con);


//JSP - 여기부터 입력하세요
$result = mysql_query("select * from $board where id=$id", $con);

$space = mysql_result($result, 0 , "space");
$hit = mysql_result($result, 0 , "hit");

$wdate = date("Y-m-d");

mysql_query("update $board set writer='$writer', email='$email', passwd='$passwd', topic=$'topic', content='$content', hit=$hit, wdate='$wdate', space= $space where id=$id", $con);

//JSP - 여기까지
echo("<meta http-equiv='Refresh' content='0; url=show.php?board=$board'>");

mysql_close($con);

?>
