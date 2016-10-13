<?php

	include("db_info.php");
	$id = $_GET[id];
	$pass = $_POST[pass];
	
	$result=mysql_query("SELECT pass FROM board WHERE id=$id",$conn);
	$row=mysql_fetch_array($result);
	if($pass==$row[pass]){
		$query="DELETE FROM board WHERE id=$id";
		$result=mysql_query($query,$conn);
	}
	else{
		echo("<script> alert('비밀번호가 틀렸습니다.');
		 history.go(-1); </script>");
		exit;
	}
?>
<center>
	<meta http-equiv='Refresh' content='1; URL=list.php'>
	<FONT size=2> 삭제가 완료되었습니다.</font>
