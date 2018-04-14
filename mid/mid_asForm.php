<?php
session_start();
$uID=$_SESSION['uID'];
$sID=$_POST['sID'];
require("mid_dbconnect.php");

$sql = "select * from resume where uID='$sID' ;";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
$sql2 = "select * from assess where uID='$sID' ;";
$result2=mysqli_query($conn,$sql2) or die("DB Error: Cannot retrieve message2.");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>評價記錄</title>
</head>
<body>
<a href="index.php">首頁</a>
	<div align="center">
		<h1>評價記錄</h1><hr /><br>
		<table width="800" border="1">
		  <tr  bgcolor="#FFD78C">
			<td>編號</td>
			<td>姓名</td>
			<td>生日</td>
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
				echo "<td>".$rs['birth']."</td>";
				echo "<td>".$rs['skill']."</td>";
				echo "<td>",$rs['salary'],"</td>";
				if ($status==0){echo "<td>待業中</td>";}
				if ($status==1){echo "<td>就業中</td>";}
				if ($status==2){echo "<td>請假中</td>";}
				
				
			}
		  ?>
		</table>
		
		<?php 
			$sql_ep="select * from employ where uID='$sID'; ";
			$rs_ep=mysqli_query($conn,$sql_ep);
			$ep_c=0;
			while($ep_row=mysqli_fetch_assoc($rs_ep))
			{
				$ep=$ep_row['eID'];
				$ep_c=1;
				if($ep != "")
				{echo "<h4>此學生目前受僱於 ".$ep." ！</h4>";}
			}
			if($ep_c==0){echo "<br><br>";}
		?>
		<table width="800" border="1">
		  <tr  bgcolor="#FFD78C">
			<td>編號</td>
			<td>評價來源</td>
			<td>評價</td>
			<td>評語內容</td>
		  </tr>
		  <?php 
			while (	$rs2=mysqli_fetch_assoc($result2)) {
				$eID=$rs2['eID'];
				$sql_ename="select * from user where ID='$eID'; ";
				$rs_ename=mysqli_query($conn,$sql_ename);
				while($ename_row=mysqli_fetch_assoc($rs_ename))
				{$ename=$ename_row['name'];}
				echo "<tr><td>".$rs2['aID']."</td>";
				echo "<td>" ,$ename, "</td>";
				if ($status==0){echo "<td>正面</td>";}
				if ($status==1){echo "<td>反面</td>";}
				echo "<td>".$rs2['asmsg']."</td></tr>";
			}
		  ?>
		  
		</table><br><br>
		<a href='mid_listResume.php'>流覽其他履歷</a>
	</div>
</body>
</html>
