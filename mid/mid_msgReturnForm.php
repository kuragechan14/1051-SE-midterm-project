<?php
session_start();
$uID=$_SESSION['uID'];
require("mid_dbconnect.php");
$mID=$_GET['mID'];
$sql= "select * from message where mID='$mID' ;";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>回覆提問</title>
</head>
<body>
<a href="index.php">首頁</a>
<div align="center">
	<h1>回覆提問</h1><hr/>
	<table width='400'>
	<?php
		while ($rs=mysqli_fetch_assoc($result)) {
			$eID=$rs['eID'];
			$sql_name="select * from user where ID='$eID'; ";
			$rs_name=mysqli_query($conn,$sql_name);
			while($name_row=mysqli_fetch_assoc($rs_name))
			{$name=$name_row['name'];}
			echo "<tr><td width='100'>提問人：</td><td>".$name."</td></tr>";
			echo "<tr><td>主旨：</td><td>".$rs['title']."</td><tr>";
			echo "<tr><td>提問內容：</td><td>".$rs['question']."</td></tr>";
			echo "<tr><td>回覆：</td></tr>";
		}
	?>
	</table><br>
		<form method="post" action="mid_msgReturn.php">
			<?php echo "<input type='hidden' value='".$mID."' name='mID'/>";?>
			<textarea cols='50' rows='5' name='msg' id='msg'></textarea><br><br>
			<input type="submit" name="Submit" value="送出回復" />
		</form>
</div>
</body>
</html>
