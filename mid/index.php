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
if (! isset($_SESSION["uID"]))
	$_SESSION["uID"] = 0;
if ($_SESSION["uID"] <= 0) {
	//header("Location: login.php");
	echo "<p>尚未登入！</p><a href='mid_loginForm.php'>請登入</a>";
	exit(0);
}
?>
<?php
	$uID=$_SESSION["uID"];
	$sql= "select * from user where ID='$uID' ;";
	$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
	while (	$rs=mysqli_fetch_assoc($result)) {
		echo "<h4>".$rs['name']."，您好！</h4>";
		$_SESSION['identity']=$rs['identity'];
	}
	
	if($_SESSION['identity']==0)
	{
		echo "<a href='mid_listResume.php'>查看可雇用清單</a><br /><br />
			<a href='mid_myMsgList.php'>提問記錄</a><br /><br />
			<a href='mid_listEmploy.php'>雇用員工清單</a><br /><br />
			<a href='mid_companyForm.php'>修改雇主資料</a><br /><br />";
	}
	if($_SESSION['identity']==1)
	{
		$sql2= "select * from employ where uID='$uID' ;";
		$result2=mysqli_query($conn,$sql2) or die("DB Error: Cannot retrieve message.");
		while ($rs2=mysqli_fetch_assoc($result2)){
			$eID=$rs2['eID'];
			$sql_name="select * from user where ID='$eID'; ";
			$rs_name=mysqli_query($conn,$sql_name);
			while($name_row=mysqli_fetch_assoc($rs_name))
			{$c_name=$name_row['name'];}
			echo "<h4>您現在受雇於".$c_name."！</h4>";
		}
		echo "<a href='mid_rsmForm.php'>個人履歷</a><br /><br />
			<a href='mid_listMessage.php'>收到的提問</a><br /><br />
			<a href='mid_personalForm.php'>修改個人資料</a><br /><br />";
	}
?>
</div>
<div align="right"><a href="mid_logout.php">登出</a></div>
