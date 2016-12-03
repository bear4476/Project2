<? include ("top.html"); ?>

<table border=1 width=900>
<tr height=600>
<td width=180 valign=top><? include ("left.html"); ?></td>
<td width=720 align=center valign=top>

<?

$con = mysql_connect("localhost","shoproot","pw4shoproot");
mysql_select_db("shopmall",$con);


$result = mysql_query("select status from receivers where ordernum='$ordernum'", $con);
$total = mysql_num_rows($result);

if ($total > 0) {
	$status = mysql_result($result, 0, "status");
	$status = $status + 1;
} else {
	$status = 1;
}

$result = mysql_query("update receivers set status=$status where ordernum='$ordernum'", $con);

mysql_close($con);	

echo ("<meta http-equiv='Refresh' content='0; url=orderlist.php'>");

?>
</td></tr>
</table>
<? include ("bottom.html");   ?>
