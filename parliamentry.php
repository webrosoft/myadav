<?php
$con=mysql_connect('localhost','root','')or die("Error in connection");
$mydb=mysql_select_db('loksabha_sms14')or die("Error : database is not  connected");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$state_id=$_REQUEST['state_id'];
$pin_code=$_REQUEST['pin'];
$result=mysql_query('SELECT tool_pconstituency_id,tool_pname from  parliamentary_constituency  where tool_state_district='$state_id' order by tool_pname ');

if(isset($_POST['submit']))
{
$pincode=$_POST['pincode'];
$tool_id=$_POST['tool_id'];
 $update="update insert_pin set tool_constituency_id='$tool_id' where pincode='$pincode' ";
$updateresult=mysql_query($update);
if($updateresult)
{
echo "Pincode updated Successfully";
}


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
<form name="edit_pin" action="" method="post">
<select name="tool_id" id="tool_id" >
<option value=""> Select Constituency</option>
<?php while($row=mysql_fetch_array($result))
{
/*print_r($row);
echo "this is test  massage";
die;
*/?>

<option value="<?php echo $row['tool_constituency_id']; ?>"><?php echo $row['tool_constituency_name']; ?></option>
<?php }?>
</select>
<input type="submit" name="submit" value="Update Pin" />
</form>
</center>
</body>
</html>
