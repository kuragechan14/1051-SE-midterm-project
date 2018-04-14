<?php
session_start();
$uID=$_SESSION['uID'];
$sID=$_POST['sID'];
require("mid_dbconnect.php");

$sql = "select * from resume where uID='$sID' ;";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>確認僱用</title>
</head>
<body>
<a href="index.php">首頁</a>
	<div align="center">
		<h1>確認僱用</h1><hr /><br>
		<table width="550" border="1">
		  <tr  bgcolor="#FFD78C">
			<td>編號</td>
			<td>姓名</td>
			<td>專業技能</td>
			<td>期望薪資</td>
			<td>工作狀態</td>
		  </tr>
		  <?php 
			while (	$rs=mysqli_fetch_assoc($result)) {
				$sql_name="select * from user where ID='$sID'; ";
				$rs_name=mysqli_query($conn,$sql_name);
				while($name_row=mysqli_fetch_assoc($rs_name))
				{
					$name=$name_row['name'];
					$status=$name_row['status'];
				}
				echo "<tr><td>".$rs['uID']."</td>";
				echo "<td>" ,$name, "</td>";
				echo "<td>".$rs['skill']."</td>";
				echo "<td>",$rs['salary'],"</td>";
				if ($status==0){echo "<td>待業中</td>";}
				if ($status==1){echo "<td>就業中</td>";}
				if ($status==2){echo "<td>請假中</td>";}
				
				
			}
		  ?>
		</table><br>
		<?php 
			$sql_ep="select * from employ where uID='$sID'; ";
			$rs_ep=mysqli_query($conn,$sql_ep);
			while($ep_row=mysqli_fetch_assoc($rs_ep))
			{
				$ep=$ep_row['eID'];
				if($ep != "")
				{
					echo "<h4>此學生目前受僱於 ".$ep." ，無法雇用！</h4>";
					echo "<a href='mid_listResume.php'>流覽其他履歷</a>";
				}
			}
			if($ep_row=="")
			{
				echo "<form method='post' action='mid_employ.php'>";
				echo "<input type='hidden' value='".$sID."' name='sID'/>";
				echo "<input type='submit' name='Submit' value='確認僱用' />";
			}
		?>
	</div>
</body>
</html>
