<?php
session_start();
require("dbconnect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>
<body>
<h1>Add New Work</h1>
<form method="post" action="addMessage.php">

      Title: <input name="title" type="text" id="title" /> <br>

      Content : <input name="content" type="text" id="content" /> <br>

      Status: <td><input name="status" type="text" id="status" value="0"/> <br> </td>
	  
	  Who: <input name="who" type="text" id="who" /> <br> <td>
	  
	  Emergency type: <select name="imp" type= "text" id="imp" >
        <option>Choose</option>
		
        <option>urgent</option>
        <option>important</option>
        <option>normal</option>
        </select> <br>
	  
      <input type="submit" name="Submit" value="送出" />
	</form>
  </tr>
</table>
</body>
</html>
