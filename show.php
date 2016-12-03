<? include ("top.html"); ?>

<table border=1 width=900>
<tr height=600>
<td width=180 valign=top><? include ("left.html"); ?></td>
<td width=720 align=center valign=top>

<?
 
$con =   mysql_connect("localhost","shoproot","pw4shoproot");
mysql_select_db("shopmall",$con);
$result = mysql_query("select * from $board order by id desc", $con);
$total = mysql_num_rows($result);

echo("
  <table border=0 width=720>
  <tr><td colspan=2 align=center><h1>게시판</h1></td></tr>
  <tr><td align=center>
  <form method=post action=search.php?board=$board>
  <select name=field>
  <option value=writer>글쓴이</option>
  <option value=topic>제목</option>
  <option value=content>내용</option>
  </select>
  검색어<input type=text name=key size=13>
  <input type=submit value=찾기>
  </td>
  </form>
  <td align=right>[<a href=input.php?board=$board>쓰기</a>]</td></tr>
  </table>
  <table border=1 width=700>
  <tr><td align=center width=50><b>번호<b></td>
  <td align=center width=100><b>글쓴이</b></td>
  <td align=center width=400><b>제목</b></td>
  <td align=center width=150><b>날짜</b></td>
  <td align=center width=50><b>조회</b></td>
  </tr>
");

if (!$total){
  echo("
    <tr><td colspan=5 align=center>아직 등록된 글이 없습니다.</td></tr>
  ");
} else {

  if ($cpage=='') $cpage=1; // $cpage - 현재 페이지 번호
  $pagesize = 3;            // $pagesize - 한 페이지에 출력할 목록 개수

  $totalpage = (int) ($total/$pagesize);
  if (($total%$pagesize) !=0) $totalpage = $totalpage + 1;

  $counter=0;
  
  while($counter<$pagesize):
    $newcounter=($cpage-1)*$pagesize+$counter;
    if ($newcounter == $total) break;
   
    $id=mysql_result($result,$newcounter,"id");
	$writer=mysql_result($result,$newcounter,"writer");
	$topic=mysql_result($result,$newcounter,"topic");
	$hit=mysql_result($result,$newcounter,"hit");
	$wdate=mysql_result($result,$newcounter,"wdate");
	$space=mysql_result($result,$newcounter,"space");

	$t="";

	if ($space>0) {
		for ($i=0; $i<=$space; $i++)
			$t=$t . "&nbsp;"; // 답변 글의 경우 제목 앞 부분에 공백 채움
    }


    echo("
      <tr><td align=center>$id</td>
      <td align=center>$writer</td>
      <td align=left>$t<a href=content.php?board=$board&id=$id>$topic</a></td>
      <td align=center>$wdate</td><td align=center>$hit</td>
      </tr>
    ");

    $counter = $counter + 1;

  endwhile;

  echo("</table>");
  
  echo ("<table border=0 width=700>
      <tr><td align=center>");

  // 화면 하단에 페이지 번호 출력
  if ($cblock=='') $cblock=1; 
  $blocksize = 2;

  $pblock = $cblock - 1;
  $nblock = $cblock + 1;

  // 현재 블록의 첫 페이지 번호
  $startpage = ($cblock - 1) * $blocksize + 1;

  $pstartpage = $startpage - 1;
  $nstartpage = $startpage + $blocksize;

  if ($pblock > 0) // 이전 블록이 존재하면 [이전블록] 버튼을 활성화
	  echo ("[<a href=show.php?board=$board&cblock=$pblock&cpage=$pstartpage>이전블록</a>]");
  
  //현재 블록에 속한 페이지 번호 출력
  $i = $startpage;
   while($i <$nstartpage) :
	   if ($i > $totalpage) break; // 마지막 페이지를 출력했으면 종료함

       echo("[<a href=show.php?board=$board&cblock=$cblock&cpage=$i>$i</a>]");
       $i = $i + 1;
  endwhile;
  // 다음 블록의 시작 페이지가 전체 페이지 수보다 작으면 [다음블록] 버튼 활성화
  if ($nstartpage <= $totalpage)
	  echo ("[<a href=show.php?board=$board&cblock=$nblock&cpage=$nstartpage>다음블록</a>]");

  echo ("</td></tr></table>");

}

mysql_close($con);

?>

</td></tr>
</table>
<? include ("bottom.html");   ?>
