
<? include ("top.html"); ?>

<table width=900 style='border:1px solid #f3a5b6;'>
<tr height=600>
<td width=180 valign=top ><? include ("left.html"); ?></td>
<td width=720 align=center valign=top style='border:1px dotted #f3a5b6;'>
<?

$con = mysql_connect("localhost","shoproot","pw4shoproot");
mysql_select_db("shopmall",$con);



$result = mysql_query("DELETE FROM member WHERE uid = '$uid'", $con);

if ($result) {
	echo ("<script>
			 window.alert('삭제가 완료되었습니다');
			 history.go(1);
			</script>");
} else {
	echo ("<script>
		 window.alert('회원 상태 변경에 실패했습니다');
		 history.go(1);
		</script>");
}	
	
mysql_close($con);

echo ("<meta http-equiv='Refresh' content='0; url=membershow.php'>");

?>

</td></tr>
</table>
<? include ("bottom.html");   ?>
