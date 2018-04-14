<?php
session_start();
require("mid_dbconnect.php");
$uID=$_SESSION['uID'];
$sID=$_POST['sID'];
$sql = "select * from resume where uID='$sID' ;";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>解雇評價</title>
</head>
<body>
<a href="index.php">首頁</a>
	<div align="center">
		<h1>解雇評價</h1><hr /><br>
		<table width="550" border="1">
		  <tr bgcolor="#FFD78C">
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
		<form method="post" action="mid_deleteEmploy.php">
			評價：<input name="pn" type="radio" id="pn" value="0"/>正面
			<input name="pn" type="radio" id="pn" value="1"/>負面<br><br>
			評語：<textarea cols="50" rows="5" name="asmsg" id="asmsg"></textarea>
			<?php echo "<input type='hidden' value='".$sID."' name='sID'/>"; ?>
			<input type="submit" name="Submit" value="送出" />
		</form>
	</div>
</html>