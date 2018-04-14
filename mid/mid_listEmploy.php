<?php
session_start();
require("mid_dbconnect.php");
$uID=$_SESSION['uID'];
$sql = "select * from employ where eID='$uID' ;";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>雇員清單</title>
</head>

<body>
<a href="index.php">首頁</a>
<div align="center"><h1>雇員清單</h1><hr /><br>
<table width="800" border="1">
  <tr  bgcolor="#FFD78C">
    <td>編號</td>
	<td>學生姓名</td>
	<td>生日</td>
	<td>專業技能</td>
	<td>期待薪資</td>
    <td>解雇</td>
  </tr>
<?php
while (	$rs=mysqli_fetch_assoc($result)) {
	$sID=$rs['uID'];
	echo "<tr><td>".$sID."</td>";
	//學生姓名
	$sql_name="select * from user where ID='$sID'; ";
	$rs_name=mysqli_query($conn,$sql_name);
	while($name_row=mysqli_fetch_assoc($rs_name))
	{$name=$name_row['name'];}
	echo "<td>".$name."</td>";
	//學生技能
	$sql_sk="select * from resume where uID='$sID';";
	$rs_sk=mysqli_query($conn,$sql_sk);
	while($sk_row=mysqli_fetch_assoc($rs_sk))
	{
		$birth=$sk_row['birth'];
		$skill=$sk_row['skill'];
		$salary=$sk_row['salary'];
	}
	echo "<td>".$birth."</td>";
	echo "<td>".$skill."</td>";
	echo "<td>".$salary."</td>";
	
	echo "<td><form method='post' action='mid_deleteEmployForm.php'>
		<input type='hidden' value='".$sID."' name='sID'/>".
		"<input type='submit' value='解雇'>
		</form></td>";
}
?>
</table>
</div>
</body>
</html>
