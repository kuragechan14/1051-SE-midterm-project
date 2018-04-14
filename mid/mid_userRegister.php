<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>工讀生媒合網站</title>
</head>
<a href="index.php">首頁</a>
<div align="center">
<h1>工讀生媒合網站</h1><hr/>

<?php
require("mid_dbconnect.php");
$ac=mysqli_real_escape_string($conn,$_POST['ac']);
$pwd=mysqli_real_escape_string($conn,$_POST['pwd']);
$usrname=mysqli_real_escape_string($conn,$_POST['usrname']);
$identity=mysqli_real_escape_string($conn,$_POST['identity']);

$r_pwd=mysqli_real_escape_string($conn,$_POST['r_pwd']);
$check=0;
if ($pwd == $r_pwd){$check=1;}

if ($check && $ac && $pwd && $usrname) { //not empty
	$sql = "insert into user (ac,pwd,name,identity) values ('$ac', '$pwd','$usrname','$identity');";
	mysqli_query($conn, $sql) or die("Insert failed, SQL query error1"); //執行SQL
	
	$sql2="select * from user where ac='$ac'";
	$result=mysqli_query($conn, $sql2) or die("Insert failed, SQL query error2");//執行SQL2
	while ($rs=mysqli_fetch_assoc($result)){ $uID=$rs['ID'];}	
	
	$sql3= "insert into resume (uID) values ('$uID');";
	mysqli_query($conn, $sql3) or die("Insert failed, SQL query error3"); //執行SQL3
	
	echo "<br>成功新增用戶！<br><br>";
	echo "<a href='mid_loginForm.php'>返回登入頁面</a>";
} else {
	echo "請確認所有欄位及密碼！";
	echo "<a href='mid_userRegisterForm.php'>重新填寫資料</a>";
}

?>