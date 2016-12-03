<?    
$con =   mysql_connect("localhost","shoproot","pw4shoproot");
mysql_select_db("shopmall",$con);


$result=mysql_query("select * from $board where id=$id",$con);

$writer=mysql_result($result, $counter,"writer");
$topic=mysql_result($result, $counter, "topic");
$content=mysql_result($result, $counter, "content");
$email=mysql_result($result, $counter, "email");


echo("
  <center><h1>게시판</h1></center>
  <form method=post action=process.php?board=$board>
  <table width=700 border=0>
  <tr><td width=100 align=right>이름 </td>
    <td width=600><input type=text name=writer size=20 value='$writer'></td>
  </tr><tr><td align=right>Email </td>
    <td><input type=text name=email size=40 value='$email'></td>
  </tr><tr><td align=right>제목 </td>
    <td><input type=text name=topic size=60 value='$topic'></td>
  </tr><tr><td align=right>내용 </td>
    <td><textarea name=content rows=12 cols=60>$content</textarea></td>
  </tr><tr><td align=right>암호 </td>
    <td><input type=password name=passwd size=15></td>
  </tr>
  <tr>
    <td align=center colspan=2>
    <input type=submit value=수정완료>
    <input type=reset value=지우기></td>
  </tr>
  </table>
  </form>
");

?>
