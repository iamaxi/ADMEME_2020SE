<?php
session_start();
require("dbconnect.php");
if (isset($_GET['m'])){
	$msg="<font color='red'>" . $_GET['m'] . "</font>";
} else {
	$msg="Good morning";
}
$sql = "select * from work where status=0 order by who;";
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
<a href="listDoneMessage.php">工作報表</a><br>
<table width="200" border="1">
  <tr>
    <td>id</td>
    <td>title</td>
    <td>content</td>
    <td>status</td>
	<td>who</td>
  </tr>
<?php
while (	$rs=mysqli_fetch_assoc($result)) {
	echo "<tr><td>" . $rs['id'] . "</td>";
	echo "<td>{$rs['title']}</td>";
	echo "<td>" , $rs['content'], "</td>";
	echo "<td>" . $rs['status'] . "</td>";
	echo "<td>" . $rs['who'] . "</td>";
	echo "<td><br><a href='workdone.php?id={$rs['id']}'>OK</a>";
	echo "<br><a href='workEditForm.php?id={$rs['id']}'>Edit</a></td></tr>";
}
?>
</table>
<a href="addMessageForm.php">Add Work</a><br>
<a href="listMessage.php">list by id</a>  

</body>
</html>
