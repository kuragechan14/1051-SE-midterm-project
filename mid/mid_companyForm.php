<?php
session_start();
require("mid_dbconnect.php");
$uID=$_SESSION['uID'];
$sql= "select * from user where ID='$uID' ;";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>個人資料</title>
</head>
<body>
<a href="index.php">首頁</a>
	<div align="center">
		<h1>修改公司資料</h1><hr /><br>
		<form method="post" action="mid_companyEdit.php">
			<?php
			while (	$rs=mysqli_fetch_assoc($result)) {
				echo "公司名稱：<input name='name' type='text' id='name' value='".$rs['name']."'/><br><br>";
				/*
				if($rs['status']==0)
				{echo "工作狀態：<select name='status'>
					<option value='0' selected='true'>待業中　 　　　</option>
					<option value='1'>就業中　 　　　</option>
					<option value='2'>請假中　 　　　</option>
					</select><br /><br />";}
				if($rs['status']==1)
				{echo "工作狀態：<select name='status'>
					<option value='0'>待業中　 　　　</option>
					<option value='1' selected='true'>就業中　 　　　</option>
					<option value='2'>請假中　 　　　</option>
					</select><br /><br />";}
				if($rs['status']==2)
				{echo "工作狀態：<select name='status'>
					<option value='0'>待業中　 　　　</option>
					<option value='1'>就業中　 　　　</option>
					<option value='2' selected='true'>請假中　 　　　</option>
					</select><br /><br />";}
				*/
			}
			?>
			<input type="submit" name="Submit" value="送出" />
		</form>	
	</div>
</body>
</html>
