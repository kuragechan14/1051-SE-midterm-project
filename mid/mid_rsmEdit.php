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
$birth=mysqli_real_escape_string($conn,$_POST['birth']);
$skill=mysqli_real_escape_string($conn,$_POST['skill']);
$salary=mysqli_real_escape_string($conn,$_POST['salary']);
$status=mysqli_real_escape_string($conn,$_POST['status']);

if ($skill && $salary) { //not empty
	$sql = "update resume set birth='$birth',skill='$skill',salary='$salary',status='$status' where uID='$uID';";
	mysqli_query($conn, $sql) or die("Update failed, SQL query error"); //執行SQL
	echo "<br>修改履歷成功！<br><br>";
	echo "<a href='mid_rsmForm.php'>返回我的履歷</a>";
} else {
	echo "<br>請確認所有欄位！<br><br>";
	echo "<a href='mid_rsmEditForm.php'>重新填寫資料</a><br><br>";
	echo "<a href='mid_rsmForm.php'>返回我的履歷</a><br><br>";
}

?>