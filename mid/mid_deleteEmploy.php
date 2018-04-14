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
$pn=$_POST['pn'];
$asmsg=mysqli_real_escape_string($conn,$_POST['asmsg']);

$sql = "insert into assess (uID,eID,pn,asmsg) values ('$sID','$uID','$pn','$asmsg');";
mysqli_query($conn, $sql) or die("Update failed, SQL query error1"); //執行SQL
echo "<br>已送出評價！<br><br>";

$sql2 = "delete from employ where uID='$sID' and eID='$uID';";
mysqli_query($conn, $sql2) or die("Update failed, SQL query error2"); //執行SQL
echo "<br>解雇完成！<br><br>";

echo "<a href='mid_listEmploy.php'>返回雇員清單</a>";
?>