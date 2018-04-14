<?php
session_start();
require("mid_dbconnect.php");
$uID=$_SESSION['uID'];
$sql= "select * from resume where uID='$uID' ;";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
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
		<h4>編輯履歷</h4>
		<form method="post" action="mid_rsmEdit.php">
			<?php
			while (	$rs=mysqli_fetch_assoc($result)) {
				$skill=$rs['skill'];
				$salary=$rs['salary'];
				$birth=$rs['birth'];
				if($rs['status']){$status="開放";}
				else{$status="關閉";}
				echo "生日：<input name='birth' type='text' id='birth' value='".$birth."'/><br><br>";
				echo "技能專長：<textarea cols='50' rows='5' name='skill' id='skill'>"
					.$skill."</textarea><br><br>";
				echo "期待薪資：<input name='salary' type='text' id='salary' value='".$salary."'/><br><br>";
				echo "履歷狀態：<select name='status'><option value='1'>開放　 　　　</option>".
					"<option value='0'>關閉　 　　　</option></select> <br /><br />";
			}
			?>
			<input type="submit" name="Submit" value="送出" />
		</form>	
	</div>
</body>
</html>
