<?php
require("dbconnect.php");
$title=mysqli_real_escape_string($conn,$_POST['title']);
$content=mysqli_real_escape_string($conn,$_POST['content']);
$who=mysqli_real_escape_string($conn,$_POST['who']);
$imp=mysqli_real_escape_string($conn,$_POST['imp']);
$id=(int)$_POST['id'];

if ($title) { //if title is not empty
	$sql = "update work set title='$title', content='$content', who='$who', imp='$imp' where id=$id;";
	mysqli_query($conn, $sql) or die("Insert failed, SQL query error"); //執行SQL
	$msg = "Work $id updateded";
} else {
	$msg =  "Work title cannot be empty";
}
header("Location: listMessage.php?m=$msg");
?>
</table>
<a href="listMessage.php">Back</a><br>

</body>
</html>