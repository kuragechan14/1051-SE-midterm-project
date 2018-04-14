<?php
session_start();
require("mid_dbconnect.php");
$uID=$_SESSION['uID'];
$sql= "select * from resume where uID='$uID' ;";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");

$sql2= "select * from employ where uID='$uID' ;";
$result2=mysqli_query($conn,$sql2) or die("DB Error: Cannot retrieve message.");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>個人履歷</title>
</head>
<body>
<a href="index.php">首頁</a>
	<div align="center">
		<h1>我的個人履歷</h1><hr />
		<?php
			$ep=0;
			while (	$rs2=mysqli_fetch_assoc($result2)) {
				$eID=$rs2['eID'];
				$sql_name="select * from user where ID='$eID'; ";
				$rs_name=mysqli_query($conn,$sql_name);
				while($name_row=mysqli_fetch_assoc($rs_name))
				{$name=$name_row['name'];}
				echo "<h4>您現在受雇於".$name."，但您可選擇是否公開履歷！</h4>";
				$ep=1;
			}
			while ($rs=mysqli_fetch_assoc($result)) {
				if($ep==0)
				{
					echo "<h4>您可選擇是否公開履歷！</h4>";
				}
				$skill=$rs['skill'];
				$salary=$rs['salary'];
				$birth=$rs['birth'];
				if($rs['status']){$status="開放";}
				else{$status="關閉";}
				echo "<table width='400' border='1'>";
				echo "<tr><td bgcolor='#FFD78C'>生日</td><td width='300'>".$birth."</td></tr>";
				echo "<tr><td bgcolor='#FFD78C'>技能專長</td><td width='300'>".$skill."</td></tr>";
				echo "<tr><td bgcolor='#FFD78C'>期待薪資</td><td width='300'>".$salary."</td></tr>";
				echo "<tr><td bgcolor='#FFD78C'>履歷狀態</td><td width='300'>".$status."</td></tr>";
				echo "</table></br>";
				echo "<a href='mid_rsmEditForm.php'>編輯個人履歷</a><br><br>";
			}
			
			
		?>
	</div>
</body>
</html>
