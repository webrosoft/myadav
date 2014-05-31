<?php
 $s_id=$_REQUEST['s_id'];
 $pin_code=$_REQUEST['pin'];
$con=mysql_connect('localhost','mynetai_pin2','pin234')or die("Error in connection");

$mydb=mysql_select_db('mynetai_pininfo')or die("Error : database is not  connected");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$result=mysql_query("select m.tool_constituency_id,m.tool_constituency_name,p.tool_pname from map_constituencies m,parliamentary_constituency p where (p.tool_pconstituency_id=m.tool_pconstituency_id) and p.tool_state_district='$s_id' order by p.tool_pname ");
if(isset($_POST['submit']))
{
$tool_id=$_POST['tool_id'];
 $update_query="update insert_pin set tool_constituency_id='$tool_id' where pincode='$pin_code' ";
$updateresult=mysql_query($update_query);
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
<h3>Pin code-- <?php echo $pin_code; ?></h3>
<select name="tool_id" id="tool_id" >
<option value=""> Select Assembly Constituency</option>
<?php while(list($ac_id,$ac_name,$pc_name)=mysql_fetch_array($result))
{
/*print_r($row);
echo "this is test  massage";
die;
*/?>

<option value="<?php echo $ac_id; ?>"><?php echo $pc_name."-".$ac_name ?></option>
<?php }?>
</select>
<input type="submit" name="submit" value="Update Pin" />
</form>
</center>
</body>
</html>
