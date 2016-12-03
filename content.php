<? include ("top.html"); ?>

<table border=1 width=900>
<tr height=600>
<td width=180 valign=top><? include ("left.html"); ?></td>
<td width=720 align=center valign=top>

<?

$con =   mysql_connect("localhost","shoproot","pw4shoproot");
mysql_select_db("shopmall",$con);


$result=mysql_query("select * from $board where id=$id",$con);

// 각 필드에 해당하는 데이터를 뽑아 내는 과정
$id=mysql_result($result,0,"id");
$writer=mysql_result($result,0,"writer");
$topic=mysql_result($result,0,"topic");
$hit=mysql_result($result,0,"hit");

$hit = $hit +1;   //조회수를 하나 증가
mysql_query("update $board set hit=$hit where id=$id",$con);

$wdate=mysql_result($result,0,"wdate");
$email=mysql_result($result,0,"email");
$content=mysql_result($result,0,"content");

// 테이블로부터 읽은 내용을 화면에 디스플레이
echo("
  <table border=0 width=700>
  <tr><td align=center><h1>게시판</h1></td></tr>
  </table>

  <table border=1 width=700>
  <tr><td width=100>번호: $id</td>
    <td width=200>글쓴이: <a href=mailto:$email>$writer</a></td>
    <td width=300>글쓴날짜: $wdate</td>
    <td width=100>조회: $hit</td>
  </tr>
  <tr><td colspan=4>제목: $topic</td> </tr>
  <tr><td colspan=4><pre>$content</pre></td> </tr>
  </table>

  <table   border=0 width=700>
  <tr><td align=center>
    <a href=pass.php?board=$board&id=$id&mode=0>[수정]</a>
    <a href=pass.php?board=$board&id=$id&mode=1>[삭제]</a>
    <a href=reply.php?board=$board&id=$id>[답변]</a>
    <a href=show.php?board=$board>[리스트]</a>
    </td></tr>
  </table>
");

?>

</td></tr>
</table>
<? include ("bottom.html");   ?>
