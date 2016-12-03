<?

if(!$key) {
   echo ("<script>
		window.alter('검색어를 입력하세요');
		history.go(-1);
		</script>");
   exit;
}

$con =   mysql_connect("localhost","shoproot","pw4shoproot");
mysql_select_db("shopmall",$con);

$result = mysql_query("select * from $board where $field like '%$key%' order by id desc", $con);
$total = mysql_num_rows($result);

echo("
  <table border=0 width=700>
  <tr><td align=center colspan=2><h1>게시판</h1></td></tr>
  <tr><td>검색어:$key ,  찾은 개수:$total 개</td>
  <tr><td align=right><a href=show.php?board=$board>[전체목록]</a></td></tr>
  </table>
");

echo("

  <table border=1 width=700>
  <tr><td align=center   width=50><b>번호</b></td>
  <td align=center width=100><b>글쓴이</b></td>
  <td align=center width=400><b>제목</b></td>
  <td align=center width=150><b>날짜</b></td>
  <td align=center width=50><b>조회</b></td>
  </tr>
");

if (!$total){
  echo("
    <tr><td colspan=5 align=center>검색된 글이 없습니다.</td></tr>");
} else {
  $counter=0;
  
  while($counter<$total):
    //JSP: 여기부터 입력    
	  $id=mysql_result($result, $counter, "id");
	  $writer=mysql_result($result, $counter,"writer");
	  $topic=mysql_result($result, $counter, "topic");
	  $hit=mysql_result($result, $counter, "hit");
	  $wdate=mysql_result($result, $counter, "wdate");
	  $space=mysql_result($result, $counter, "space");
	  
	  $t="";
	  if ($space>0)  {
	  for ($i=0; $i<=$space; $i++)
			  $t=$t."$nbsp";
	  }

    echo("
      <tr><td align=center>$id</td>
      <td align=center>$writer</td>
      <td align=left>$t
      <a href=content.php?board=$board&id=$id>$topic</a></td>
      <td align=center>$wdate</td><td align=center>$hit</td>
      </tr>
    ");

    //JSP: 여기까지

    $counter = $counter + 1;

  endwhile;

  echo("</table>");
}

mysql_close($con);

?>
