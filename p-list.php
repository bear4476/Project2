<? include ("top.html"); ?>

<table border=1 width=900>
<tr height=600>
<td width=180 valign=top><? include ("left.html"); ?></td>
<td width=720 align=center valign=top>

<?	

$con = mysql_connect("localhost","shoproot","pw4shoproot");
mysql_select_db("shopmall",$con);
	     
if   (!isset($class)) $class=0;

switch($class) {
   case 0:      // 초기화면에 출력할 인기 상품 목록
       $result = mysql_query("select * from product order by hit desc", $con);
		break;
   default:     // 카테고리별 메뉴 화면에 출력할 상품 목록
       $result = mysql_query("select * from product where class=$class order by hit desc", $con);
		break;
}

$total = mysql_num_rows($result);
	
echo   ("<table border=0 width=690><tr>");

if (!$total){
	echo ("<td align=center><font color=red>아직 등록된 상품이 없습니다</td>");
} else {

	$counter = 0;
	while ($counter < $total &&   $counter < 15) :

		if ($counter > 0 && ($counter % 5) == 0) echo ("</tr><tr><td colspan=5><hr size=1   color=green width=100%></td></tr><tr>");

		$code=mysql_result($result,$counter,"code");
		$name=mysql_result($result,$counter,"name");
		$userfile=mysql_result($result,$counter,"userfile");
		$price2=mysql_result($result,$counter,"price2");

		switch(strlen($price2)) {
			case 6: 
			   $price2 = substr($price2, 0, 3) . "," . substr($price2, 3,   3);
			   break;
			case 5:
			   $price2 = substr($price2, 0, 2) . "," . substr($price2, 2,   3);
			   break;
			case 4:
			   $price2 = substr($price2, 0, 1) . "," . substr($price2, 1,   3);
			   break;	   
		}
		
		echo ("<td width=135  align=center><a href=p-show.php?code=$code> <img src='./photo/$userfile' width=100 border=0><br><font color=blue style='text- decoration:none;   font-size:10pt;'>$name</a></font><br>");
		echo ("<font color=red   size=2>$price2&nbsp;원</font></td>");

		$counter++;
	endwhile;
}
echo ("</tr></table>");
mysql_close($con);

?>

</td></tr>
</table>
<? include ("bottom.html");   ?>
