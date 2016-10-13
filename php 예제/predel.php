<html>
<head>
<title> 게 시 판 </title>
</head>
<body topmargin=0 leftmargin=0 text=#464646>
<br>
<form action=del.php?id=<?php echo"$_GET[id]";?> method=post>
<table width=300 border=0 cellpadding=2 cellspacing=1 bgcolor=#777777>
<tr>
	<td height=20 align=center bgcolor=#999999>
		<font color=white><B>비 밀 번 호 확 인</B></font>
	</td>
</tr>
<tr>
	<td align=center>
		<font color=white><B>비밀번호 : </B>
		<INPUT type=password name=pass size=8>
		<INPUT type=submit value="확인">
		<INPUT type=button value="취소" oneclick="history.back(-1)">
	</td>
</tr>
</table>
</body>
</html>
