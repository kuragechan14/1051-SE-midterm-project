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
<title>提問</title>
</head>
<body>
<a href="index.php">首頁</a>
	<div align="center">
		<h1>撰寫提問</h1><hr /><br>
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
		<form method="post" action="mid_addmsg.php">
			主旨：<input name="title" type="text" id="title" /><br><br>
			提問內容：<textarea cols="50" rows="5" name="msg" id="msg"></textarea>
			<?php echo "<input type='hidden' value='".$sID."' name='sID'/>"; ?>
			<input type="submit" name="Submit" value="送出" />
		</form>
	</div>
</body>
</html>
