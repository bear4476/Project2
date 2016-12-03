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

$con =   mysql_connect("localhost","shoproot","pw4shoproot");
mysql_select_db("shopmall",$con);


$result = mysql_query("select space from $board where id=$id", $con);
$space = mysql_result($result, 0 , "space");
$space = $space +1;

$wdate=date("Y-m-d");

$tmp = mysql_query("select id from $board", $con);
$total = mysql_num_rows($tmp);

while($total >= $id):
	mysql_query("update $board set id=id+1 where id=$total", $con);
	$total--;
endwhile;

mysql_query("insert into $board(id, writer, email, passwd, topic, content, hit, wdate, space) values($id, '$writer', '$email', '$passwd', '$topic', '$content', 0,'$wdate', $space)",$con);

echo "insert into board(id, writer, email, passwd, topic, content, hit, wdate, space) values($id, '$writer', '$email', '$passwd', '$topic', '$content', 0,'$wdate', $space)";

mysql_close($con);

//echo("<meta http-equiv='Refresh' content='0; url=show.php?board=$board'>");

?>