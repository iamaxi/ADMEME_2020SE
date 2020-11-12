<?php
require("dbconnect.php");

$msgID=(int)$_GET['id'];
if ($msgID) {
	$sql = "delete from work where id=$msgID;";
	mysqli_query($conn,$sql) or die("MySQL query error"); //執行SQL
}
$msg = "Message:$msgID deleted.";
header("Location: bossMessage.php?m=$msg");
?>

