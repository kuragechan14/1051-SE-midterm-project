<?php
session_start();
require("mid_dbconnect.php");
$uID=$_SESSION['uID'];
$sql = "select * from message where uID='$uID' ;";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>收到的提問</title>
</head>

<body>
<a href="index.php">首頁</a>
<div align="center"><h1>收到的提問</h1><hr /><br>
<table width="500" border="1">
  <tr bgcolor='#FFD78C'>
    <td>編號</td>
	<td>提問者</td>
    <td>主旨</td>
    <td>提問內容</td>
	<td>回答</td>
    <td>訊息狀態</td>
  </tr>
<?php
while (	$rs=mysqli_fetch_assoc($result)) {
	$eID=$rs['eID'];
	$sql_name="select * from user where ID='$eID'; ";
	$rs_name=mysqli_query($conn,$sql_name);
	while($name_row=mysqli_fetch_assoc($rs_name))
	{$name=$name_row['name'];}
	
	echo "<tr><td>" . $rs['mID'] . "</td>";
	echo "<td>" ,$name, "</td>";
	echo "<td>".$rs['title']."</td>";
	echo "<td>" , $rs['question'], "</td>";
	echo "<td>" , $rs['answer'], "</td>";
	if($rs['status']==0)
	{echo "<td><form method='get' action='mid_msgReturnForm.php'>
		<input type='hidden' value='".$rs['mID']."' name='mID'/>".
		"<input type='submit' value='尚未回復'>
		</form></td></tr>";}
	else {echo "<td>已回復</td></tr>";}
	
}
?>
</table>
</div>
</body>
</html>
