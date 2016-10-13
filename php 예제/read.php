<html>
<head>
<title>게 시 판</title>
<style></style>
</head>

<body topmargin=0 leftmargin=0 text=#464646>
<center>
<br>
<?php
	include("db_info.php");
	
	$id = $_GET[id];
	$no = $_GET[no];
	$result=mysql_query("SELECT * FROM board WHERE id=$id",$conn);
	$row=mysql_fetch_array($result);	
?>
<table width=580 boarder=0 cellpadding=2 cellspacing=1
bgcollor=#777777>
<tr>
	<td height=20 colspan=4 align=center bgcolor=#999999>
		<font color=white><B><?php echo"$row[title]"; ?></B><font>
	</td>
</tr>
<tr>	
	<td width=50 height=20 align=center bgcolor=#EEEEEE>글쓴이</td>
	<td width=240 bgcolor=white><?php echo"$row[name]"; ?></td>
	<td width=60 height=20 align=center bgcolor=#EEEEEE>이메일</td>
	<td width=240 bgcolor=white><?php echo"$row[email]";?></td>
</tr>
<tr>
	<td width=50 height=20 align=center bgcolor=#EEEEEE>
	날&nbsp;&nbsp;&nbsp;짜</td>
	<td width=240 bgcolor=white><?php echo"$row[wdate]"; ?></td>
	<td width=60 height=20 align=center bgcolor=#EEEEEE>조회수</td>
	<td width=240 bgcolor=white><?php echo"$row[view]"; ?></td>
</tr>
<tr>
	<td colspan=4 bgcolor=white>
	<font color=black>
	<pre style="white-space: pre-wrap;"><?php echo"$row[content]"; ?></pre>
	</font>
	</td>
</tr>

<tr>
	<td colspan=4 bgcolor=#999999>
	<table width=100%>
		<tr>
		<td width=250 align=left height=20>
		  <a href=list.php?no=<?php $no?>><font color=white>
		  [목록보기]</font></a>
		  <a href=write.php><font color=white>
		  [글쓰기]</font></a>
		  <a href=edit.php?id=<?php echo"$id";?>><font color=white>
	 	  [수정]</font></a>
		  <a href=predel.php?id=<?php echo"$id";?>>
		  <font color=white>[삭제]</font></a>
		</td>
		<td align=right>
<?php
	$query=mysql_query("SELECT id FROM board WHERE id >$id LIMIT 1",$conn);
	$prev_id=mysql_fetch_array($query);

	if($prev_id[id]){
		echo("<a href=read.php?id=$prev_id[id]><font color=white>[이전]</font></a>");
	}
	else echo("[이전]");

	$query=mysql_query("SELECT id FROM board WHERE id < $id LIMIT 1",$conn);
	
	$next_id=mysql_fetch_array($query);
	if($next_id[id]){
		echo("<a href=read.php?id=$next_id[id]>
		<font color=white>[다음]</font></a>");
	}
	else echo("[다음]");
?>
		</td>
	</tr>
	</table>
	</b></font>
	</td>
</tr>
</table>
</center>
</body>
</html>
<?php
	$result=mysql_query("UPDATE board SET view=view+1 WHERE id=$id",$conn);
	mysql_close($conn);
?>
