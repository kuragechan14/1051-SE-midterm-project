<?php
session_start();
require("mid_dbconnect.php");
//set the login mark to empty
$_SESSION['uID'] = "";
?>
<a href="index.php">首頁</a>
<div align="center">
<h1>工讀生媒合網站-用戶登入</h1>
<hr /><br />
<form method="post" action="mid_loginCheck.php">
帳號：<input type="text" name="ac"><br /><br />
密碼：<input type="password" name="pwd"><br /><br />
<input type="submit" value="登入">
</form>
<a href="mid_userRegisterForm.php">註冊新帳號</a>
</div>