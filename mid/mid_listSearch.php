<?php
session_start();
require("mid_dbconnect.php");
$uID=$_SESSION['uID'];
$search=mysqli_real_escape_string($conn,$_POST['search']);
$sql = "select * from resume where status='1' and skill like '%$search%' order by salary desc ;";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>查看可雇用學生清單</title>
</head>

<body>
<a href="index.php">首頁</a>
<div align="center"><h1>查看可雇用清單</h1><hr />
<h4>以期待薪資由高至低排序！</h4>
<form method='POST' action='mid_listSearch.php'>
依專長查詢：<input type='text' name='search'/>
<input type='submit' value='搜尋'>
</form><br>
<table width="800" border="1">
  <tr bgcolor="#FFD78C">
    <td>編號</td>
	<td>姓名</td>
	<td>生日</td>
    <td>專業技能</td>
    <td>期望薪資</td>
	<td>工作狀態</td>
    <td>提問</td>
	<td>受雇情況</td>
  </tr>
<?php
$counter=1;
while (	$rs=mysqli_fetch_assoc($result)) {
	$ID=$rs['uID'];
	//學生姓名
	$sql_name="select * from user where ID='$ID'; ";
	$rs_name=mysqli_query($conn,$sql_name);
	while($name_row=mysqli_fetch_assoc($rs_name))
	{
		$name=$name_row['name'];
		$status=$name_row['status'];
	}
	//受雇情況
	$sql_ep="select * from employ where uID='$ID';";
	$rs_ep=mysqli_query($conn,$sql_ep);
	$ep=0;
	while($ep_row=mysqli_fetch_assoc($rs_ep))
	{
		if($ep_row!=""){$ep=1;}
	}
	echo "<tr><td>".$rs['uID']."</td>";
	echo "<td>" ,$name, "</td>";
	echo "<td>".$rs['birth']."</td>";
	echo "<td>".$rs['skill']."</td>";
	echo "<td>",$rs['salary'],"</td>";
	if ($status==0){echo "<td>待業中</td>";}
	if ($status==1){echo "<td>就業中</td>";}
	if ($status==2){echo "<td>請假中</td>";}	
	echo "<td><form method='POST' action='mid_addmsgForm.php'>
		<input type='hidden' value='".$ID."' name='sID'/>".
		"<input type='submit' value='提問'>
		</form></td>";
	if($ep==0){
		echo "<td><form method='POST' action='mid_employeeForm.php'>
				<input type='hidden' value='".$ID."' name='sID'/>".
				"<input type='submit' value='雇用'>
			</form></td></tr>";
	}
	else{
		echo "<td>履歷開放中</td></tr>";
	}
}
?>
</table>
</div>
</body>
</html>
