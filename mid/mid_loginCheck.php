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
$ac=mysqli_real_escape_string($conn,$_POST['ac']);
$pwd=mysqli_real_escape_string($conn,$_POST['pwd']);

$sql = "SELECT ID,pwd,name FROM user WHERE ac='$ac'";
if ($result = mysqli_query($conn,$sql)) {
	if ($row=mysqli_fetch_assoc($result)) {
		if ($row['pwd'] == $pwd) {
			//keep the user ID in session as a mark of login
			$_SESSION['uID'] = $row['ID'];
			//provide a link to the message list UI
			echo "<br>登入成功！<br><br><a href='index.php'>用戶首頁</a>";
		} else {
			echo "用戶帳號或密碼錯誤，請再試一次！<br>";
		}
	}
}
?>
