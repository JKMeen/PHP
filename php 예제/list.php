<?php
	include("db_info.php");
	
	$page_size=10;
	$page_list_size=10;
	$no = $_GET[no];
	if(!$no || $no <0) $no=0;
	
	$query = "SELECT * FROM board ORDER BY id DESC LIMIT $no, $page_size";
	$result = mysql_query($query,$conn);
	
	$result_count=mysql_query("SELECT count(*) FROM board",$conn);
	$result_row=mysql_fetch_row($result_count);
	$total_row=$result_row[0];

	if($total_row <= 0) $total_row=0;
	$total_page=ceil($total_row / $page_size);
	
	$current_page=ceil(($no+1)/$page_size);
?>
<html>
<head>
<title>게 시 판</title>
<style>

</style>
</head>
<body topmargin=0 leftmargin=0 text=#464646>
<center>
<br>
<font size=2>게시판에 오신걸 화녕합니다!</a>
<br>
<br>
<table width=580 border=0 cellpadding=2 cellspacing=1 bgcolor=#777777>
   <tr height=20 bgcolor=#999999>
	<td width=40 align=center>
	  <font color=white>번호 </font>
	</td>
  	<td width=370 align=center>
	  <font color=white>제 목</font>
	</td>
  	<td width=60 align=center>
	  <font color=white>글쓴이</font>
	</td>
	<td width=80 align=center>
	  <font color=white>날 짜</font>
	</td>
	<td width=60 align=center>
	  <font color=white>조회수</font>
	</td>
   </tr>
<?php
   while($row=mysql_fetch_array($result)){
?>
   <tr>
	<td height=20 bgcolor=white align=center>
		<?php echo"$row[id]";?>
	</td>
	<td height=20 bgcolor=white>&nbsp;
		<a href="read.php?id=<?php echo"$row[id]";;?>&no=<?=$no?>">
		<?php strip_tags($row[title]);echo"$row[title]";?></a>
	</td>
	<td align=center height=20 bgcolor=white>
		<font color=black>
		<a href="mailto:<?php echo"$row[email]";?>"><?php echo"$row[name]";?></a>
		</font>	
	</td>
	<td align=center height=20 bgcolor=white>
		<font color=black><?php echo"$row[wdate]"; ?></font>
	</td>
	<td align=center height=20 bgcolor=white>
		<font color=black><?php echo"$row[view]";?></font>
		<?php strip_tags($row[title]);?>
	</td>
   </tr>
<?php
}
mysql_close($conn);
?>
</table>
<table border=0>
<tr>
	<td width=600 height=20 align=center rowspan=4>
	<font color=gray>
	&nbsp;
<?php
	$start_page = floor(($current_page-1)/$page_list_size)*$page_list_size+1;
	$end_page = $start_page + $page_list_size - 1;
	
	if($total_page < $end_page) $end_page = $total_page;

	if($start_page >= $page_list_size){
		$prev_list = ($start_page-2)*$page_size;
		echo("<a href=$PHP_SELF?no=$prev_list>◀ </a>");
	}
	for($i=$start_page;$i <= $end_page;$i++){
		$page=($i-1)*$page_size;
		if($no!=page) echo("<a href=PHP_SELF?no=$page>");
	}
	for($i=$start_page;$i<=$end_page;$i++){
		$page=($i-1)*$page_size;
		if($no != $page){
			echo("<a href=$PHP_SELF?no=$page>");
		}
		echo "$i";
		if($no != $page) echo"</a>";
	}
	if($total_page > $end_page){
		$next_list = $end_page * $page_size;
		echo"<a href=$PHP_SELF?no=$next_list>▶ </a><p>";
	}
?>
	</font>
	</td>
</tr>
</table>
<a href=write.php>글쓰기</a>
</center>
</body>
</html>
