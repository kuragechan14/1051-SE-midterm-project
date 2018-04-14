<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>工讀生媒合網站</title>
</head>
<a href="index.php">首頁</a>
<div align="center">
<h1>工讀生媒合網站</h1><hr/>
<?php
session_start();
require("mid_dbconnect.php");
$uID=$_SESSION['uID'];
$mID=$_POST['mID'];
$msg=mysqli_real_escape_string($conn,$_POST['msg']);

if ($msg) { //not empty
	$sql = "update message set answer='$msg',status='1' WHERE mID='$mID'";
	mysqli_query($conn, $sql) or die("Insert failed, SQL query error"); //執行SQL
	echo "<br>回覆成功！<br><br>";
	echo "<a href='mid_listMessage.php'>返回收到的提問</a>";
} else {
	echo "<br>請填寫回覆！<br><br>";
	echo "<a href='mid_listMessage.php'>重新填寫資料</a>";
}
?>
