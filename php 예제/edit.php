<html>
<head>
<title>Test Board</title>
<head>
<body topmargin=0 leftmargin=0 text=#464646>
<center>
<br>
<form action=update.php?id=<?php echo"$_GET[id]"; ?> method=post>
<table width=580 border=0 cellpadding=2 cellspacing=5 bgcolor=#777777>
    <tr>
	 <td height=20 align=center bgcolor=#999999>
	 <font color=white><B>글 수 정 하 기</B></font>
	 </td>
    </tr>
<?php
	include("db_info.php");

	$id = $_GET[id];
	$no = $_GET[no];

	$result=mysql_query("SELECT * FROM board WHERE id=$id",$conn);
	$row=mysql_fetch_array($result);
?>
    <tr>
	 <td bgcolor=white> &nbsp;
	 <table>
	    <tr>
	 	<td width=80 align=left >이름 </td>	
	 	<td align=left >
	     	    <INPUT type text name=name size=20 
			value="<?php echo"$row[name]"; ?>">
	 	</td>
    	    </tr>
    	    <tr>
		 <td width=80 align=left>이메일 </td>
		 <td align=left >
		    <INPUT type=text name=email size=20 
			value="<?php echo"$row[email]"; ?>">
		 </td>
	    </tr>
	    <tr>
		 <td width=80 align=left>비밀번호</td>
		 <td align=left>
		    <INPUT type=password name=pass size=8 maxlength=8>
		    (비밀번호가 맞아야 수정가능)
	    	 </td>
	    </tr>
	    <tr>
		 <td witdh=80 align=left>제 목</td>
		 <td align=left>
		    <INPUT type=text name=title size=60 
			value="<?php echo"$row[title]"; ?>">
		 </td>
	    </tr>
	    <tr>
		 <td witdh8. align=left>내 용</td>
		 <td align=left>
		    <TEXTAREA name=content cols=62 rows=15>
			<?php echo"$row[content]";?></TEXTAREA>
		 </td>
	    </tr>
	    <tr>
		 <td colspan=10 align=center>
	 	 &nbsp;&nbsp;
		 <INPUT type=submit value="저  장">
		 &nbsp;&nbsp; 
		 <INPUT type=reset value="다시 쓰기"> 
	 	 &nbsp;&nbsp;
		 <INPUT type=button value="되돌아가기" 
		  oneclick="history.back(-1)">
	    	 </td>
	    </tr>
	 </table>	
</table>
</form>
</center>
</body>
</html>
