<?php
session_start();
require("dbconnect.php");
if (isset($_GET['m'])){
	$msg="<font color='red'>" . $_GET['m'] . "</font>";
} else {
	$msg="Good morning Boss";
}
$sql = "select * from work order by imp;";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BOSS</title>
</head>

<body>

<p>BOSS GUEST BOOK </p>
<hr />
<div><?php echo $msg; ?></div><hr>
<a href="listMessage.php">未工作報表By員工</a><br><br>

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
$count = 0;
while (	$rs=mysqli_fetch_assoc($result)) {
	$count = $count +1;
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
	
	echo "<td><br><a href='workEditForm.php?id={$rs['id']}'>Edit</a></br></td>";
	echo "<td><br><a href='deleteMessage.php?id={$rs['id']}'>Delete</a></br></td>";
	echo "<td><br><a href='workundone.php?id={$rs['id']}'>NotOK</a></td>";
	echo "<td><br><a href='workComplete.php?id={$rs['id']}'>CloseFile</a></td></tr>";
}
echo "Total done work by employers: " ,$count;
?>
</table>
<a href="addMessageForm.php">Add Work</a><br>
<a href="listMessage.php">Back To employer</a><br>
<a href="bossMessage.php">List by Status</a><br>

</body>
</html>
