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
$name=mysqli_real_escape_string($conn,$_POST['name']);
$status=mysqli_real_escape_string($conn,$_POST['status']);

if ($name) { //not empty
	$sql = "update user set name='$name',status='$status' where ID='$uID';";
	mysqli_query($conn, $sql) or die("Update failed, SQL query error"); //執行SQL
	echo "<br>修改個人資料成功！<br><br>";
	echo "<a href='index.php'>返回首頁</a>";
} else {
	echo "<br>請確認所有欄位！<br><br>";
	echo "<a href='mid_personalForm.php'>重新填寫資料</a>";
}

?>