<?php

$con=mysql_connect('localhost','mynetai_pin2','pin234')or die("Error in connection");

$mydb=mysql_select_db('mynetai_pininfo')or die("Error : database is not  connected");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Tool  for Updating Pincode With Constituency</title>
</head>

<body>
<center>
<h1>Tool  For Updating Pin Code</h1>
<form name="edit_pin" action="search1.php" method="post">
<input type="text" name="pincode" id="pincode" width="40" height="200" />

<input type="submit" name="submit" value="View Info" />
</form>
</center>
</body>
</html>
