<?php
	include("db_info.php");
	$id = $_GET[id];
	$name = $_POST[name];
	$email = $_POST[email];
	$pass = $_POST[pass];
	$title = $_POST[title];
	$content = $_POST[content];
	$REMOTE_ADDR = $_SERVER[REMOTE_ADDR];

	$query="INSERT INTO board (id,name,email,pass,title,content,wdate,ip,view) VALUES ('','$name','$email','$pass','$title','$content',now(),'$REMOTE_ADDR',0)";	
	
	$result=mysql_query($query,$conn) or die(mysql_error());	
	mysql_close($conn);
	echo("<meta http-equiv='Refresh' content='1; URL=list.php'>");
?>
