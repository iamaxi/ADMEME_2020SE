<?php
require("dbconnect.php");
$title=mysqli_real_escape_string($conn,$_POST['title']);
$content=mysqli_real_escape_string($conn,$_POST['content']);
$status=mysqli_real_escape_string($conn,$_POST['status']);
$who=mysqli_real_escape_string($conn,$_POST['who']);
$imp=mysqli_real_escape_string($conn,$_POST['imp']);


function addJob($jobProfile){
	//check the $jobProfile first
	//insert into DB with $jobProfile
	
	//return T/F
	
}

function canceJob($jobID){
    //check the $jobID first
	//1.delete the job with $jobID from DB
	//2. update the job'(s) with $jobID from DB
	//return T/F
	

}

function updateJob(){
	
	
}

function getJobList(){
	
	
}


function setFinished(){
	
	
}

function Rejectjob(){
	
	
}

function setClosed(){
	
	
}




if ($title) { //if title is not empty
	$sql = "insert into work (title, content, status, who, imp) values ('$title', '$content','$status','$who','$imp');";
	mysqli_query($conn, $sql) or die("Insert failed, SQL query error"); //執行SQL
	$msg = "Work added";
} else {
	$msg = "Work title cannot be empty";
}
header("Location: listMessage.php?m=$msg");
?>
<body>
<br>
<a href="listMessage.php">back</a>
</body>