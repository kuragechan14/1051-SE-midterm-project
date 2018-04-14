<?php
session_start();
require("mid_dbconnect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>註冊新帳號</title>
</head>
<body>
<a href="index.php">首頁</a>
<div align="center">
	<h1>註冊新帳號</h1><hr/>
	<h4>用戶基本資料</h4>
		<form method="post" action="mid_userRegister.php">

			帳號：<input name="ac" type="text" id="ac" /> <br /><br />

			密碼：<input name="pwd" type="password" id="pwd" /> <br /><br />

			確認密碼：<input name="r_pwd" type="password" id="r_pwd" /> <br /><br />
			  
			姓名：<input name="usrname" type="text" id="usrname" /> <br /><br />
			  
			身分別: 
			<select name="identity">
				<option value="1" select="true">學生　　　　</option>
				<option value="0">雇主　　　　</option>
			</select> <br /><br />
			<input type="submit" name="Submit" value="註冊" />
		</form>
</div>
</body>
</html>
