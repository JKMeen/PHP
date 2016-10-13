<?php
	include("db_info.php");
	$id = $_GET[id];
	$name = $_POST[name];
	$email = $_POST[email];
	$pass = $_POST[pass];
	$title = $_POST[title];
	$content = $_POST[content];
	$REMOTE_ADDR = $_SERVER[REMOTE_ADDR];

	$query ="SELECT pass FROM board WHERE id=$id";	
	$result=mysql_query($query,$conn);	
	$row=mysql_fetch_array($result);
	if($pass==$row[pass]){
		$query="UPDATE board SET name='$name', email='$email', title='$title', content='$content' WHERE id=$id";
		$result=mysql_query($query,$conn);
	}
	else{
		echo ("
		<script>
		alert('비밀번호가 틀립니다.');
		history.go(-1);
		</script>
		");
		exit;
	}

	mysql_close($conn);
	echo("<meta http-equiv='Refresh' 
		content='1; URL=read.php?id=$id'>");
?>
<center>
<font size=2> 정상적으로 수정되었습니다.</font>
