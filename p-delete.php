<?

$con = mysql_connect("localhost","shoproot","pw4shoproot");
mysql_select_db("shopmall", $con);

$result = mysql_query("select * from product where code='$code'", $con);

$name=mysql_result($result,0,"name");
		
echo ("
    <table border=0 width=650 align=center>
	<tr><td width=100 align=center>상품코드</td>
     <td width=550><b>$code</b></td></tr>
	<tr><td align=center>상품이름</td><td><b>$name</b></td></tr>
	<tr><td colspan=2 height=50 align=center valign=center>위 상품을 삭제하시겠습니까?</td></tr> 
	<tr><td colspan=2 align=center><form method=post action=p-delete2.php?code=$code><input type=submit value='삭제 확인'></form></td></tr>
	<tr><td colspan=2 align=center>[<a href=p-adminlist.php>돌아가기</a>]</td></tr>
	</table>");
	
mysql_close($con);

?>
