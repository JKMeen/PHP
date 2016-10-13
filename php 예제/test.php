<?php
	$conn=mysql_connect("localhost","root","P@ssw0rd");
	mysql_select_db("CBS",$conn);
	
	$REMOTE_ADDR=$_SERVER[REMOTE_ADDR];	
	$name = 'hahaha';

	$query="INSERT INTO insertDate (name,adr) VALUES ('$name','$REMOTE_ADDR')";
	$result=mysql_query($query,$conn) or die(mysql_error());
	
	mysql_close($conn);
	echo"asdfasdf";
?>
<center>
<font size=2> 정상적으로 저장되었습니다.</font>

