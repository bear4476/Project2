<?

$con =   mysql_connect("localhost","shoproot","pw4shoproot");
mysql_select_db("shopmall",$con);


mysql_query("delete from $board where id=$id",$con);
echo("
  <script>
  window.alert('글이 삭제 되었습니다.');
  </script>
");

//JSP – 여기부터 입력하세요
// 삭제된 글보다 글 번호가 큰 게시물은 글 번호를 1씩 감소

$tmp = mysql_query("select id from $board order by id desc", $con);
$last = mysql_result($tmp, 0, "id");

$i = $id + 1;
while($i <= $last):
	mysql_query("update $board set id=id-1 where id=$i", $con);
	$i++;
endwhile;

//JSP – 여기까지

// 글 삭제 결과를 보여주기 위한 글 목록 보기 프로그램 호출
echo("<meta http-equiv='Refresh' content='0; url=show.php?board=$board'>");

mysql_close($con);

?>
