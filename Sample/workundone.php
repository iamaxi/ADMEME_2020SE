<?php
require("dbconnect.php");

$msgID=(int)$_GET['id'];
if ($msgID) {
	$sql = "update work set status=0 where id=$msgID;";
	mysqli_query($conn,$sql) or die("MySQL query error"); //執行SQL
}
$msg = "work:$msgID Reject.";
header("Location: listMessage.php?m=$msg");
?>
</table>
<a href="listMessage.php">Back</a><br>

</body>
</html>
