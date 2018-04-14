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
$sID=$_POST['sID'];

$sql = "insert into employ (uID,eID) values ('$sID','$uID');";
mysqli_query($conn, $sql) or die("Update failed, SQL query error3"); //執行SQL
echo "<br>完成聘雇！<br><br>";
echo "<a href='mid_listEmploy.php'>查看雇員清單</a>";
?>