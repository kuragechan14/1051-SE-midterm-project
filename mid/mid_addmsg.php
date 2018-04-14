<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>工讀生媒合網站</title>
</head>
<a href="index.php">首頁</a>
<div align="center">
<h1>工讀生媒合網站</h1><hr/>
<?php
session_start();
$uID=$_SESSION['uID'];
$sID=$_POST['sID'];
require("mid_dbconnect.php");
$title=mysqli_real_escape_string($conn,$_POST['title']);
$msg=mysqli_real_escape_string($conn,$_POST['msg']);

if ($title) { //if title is not empty
	$sql = "insert into message (eID,uID,title,question,status) 
			values ('$uID','$sID','$title', '$msg','0');";
	mysqli_query($conn, $sql) or die("Insert failed, SQL query error"); //執行SQL
	echo "<br>成功送出提問！<br><br><a href='mid_listResume.php'>繼續流覽其他履歷</a>";
	
} else {
	echo "<br>請填寫提問主旨！";
}

?>