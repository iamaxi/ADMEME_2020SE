<?php
session_start();
require("dbconnect.php");
if (isset($_GET['m'])){
	$msg="<font color='red'>" . $_GET['m'] . "</font>";
} else {
	$msg="Good morning";
}
$sql = "select * from work where status=0 order by title, imp;";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>

<p>my guest book !! </p>
<hr />
<div><?php echo $msg; ?></div><hr>

<table width="200" border="1">
  <tr>
    <td>id</td>
    <td>title</td>
    <td>content</td>
    <td>status</td>
	<td>who</td>
	<td>Emergency</td>
  </tr>
<?php
while (	$rs=mysqli_fetch_assoc($result)) {
	echo "<tr><td>" . $rs['id'] . "</td>";
	echo "<td>{$rs['title']}</td>";
	echo "<td>" , $rs['content'], "</td>";
	echo "<td>" . $rs['status'] . "</td>";
	echo "<td>" . $rs['who'] . "</td>";
	
	if($rs['imp']== 'urgent'){
    echo "<td><font color='red'>" . $rs['imp'], "</font></td>";
    }
  if($rs['imp']== 'important'){
    echo "<td><font color='orange'>" . $rs['imp'], "</font></td>";
    }
  if($rs['imp']== 'normal'){
    echo "<td><font color='blue'>" . $rs['imp'], "</font></td>";
    
	}
	echo "<td><br><a href='workdone.php?id={$rs['id']}'>OK</a>";
}
?>
</table>
<a href="listDoneMessage.php">工作報表</a>
<a href="listMessage2.php">list by who</a></br>
<a href="bossMessage.php">To boss</a>

</body>
</html>
