<?

$con =   mysql_connect("localhost","shoproot","pw4shoproot");
mysql_select_db("shopmall",$con);


$result=mysql_query("select passwd from $board where id=$id",$con);
$passwd=mysql_result($result,0,"passwd");

if ($pass != $passwd) {            // 암호가 일치하지 않는 경우
  echo   ("<script>
    window.alert('입력 암호가 일치하지 않네요');
    history.go(-1);
   </script>");
    exit;	
} else {                  // 암호가 일치하는 경우
  //JSP - 여기부터 입력
	switch ($mode){
		case 0:
			echo ("<meta http-equiv='Refresh' content='0; url=modify.php?board=$board&id=$id'>");
			break;
		case 1:
			echo ("<meta http-equiv='Refresh' content='0; url=delete.php?board=$board&id=$id'>");
			break;
	}

  //JSP - 여기까지
}  

mysql_close($con);

?>
