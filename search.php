<?php
  $pin=$_REQUEST['pincode'];
$con=mysql_connect('localhost','root','')or die("Error in connection");

$mydb=mysql_select_db('loksabha_sms14')or die("Error : database is not  connected");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

//$pincode=$_POST['pincode'];
$select_res="select  tool_constituency_id from insert_pin where pincode ='$pin' ";
$selected_row=mysql_query($select_res);
$tool_id=mysql_fetch_array($selected_row);
$tool_id=$tool_id['tool_constituency_id'];

$query = "";
$result = mysql_query($query);
while(list($id,$name,$name2,$score) = mysql_fetch_row($result))
{
	$tr .= "<tr></tr>";
}

$table = "<table>$tr</table>";

$query ="select tool_pconstituency_id,  tool_constituency_name from map_constituencies where tool_constituency_id='$tool_id' ";
$result =mysql_query($query);

$asm_name=mysql_fetch_array($selected_asm);
$tool_pid=$asm_name['tool_pconstituency_id'];
 $query="select tool_pname,tool_state_district from parliamentary_constituency where tool_pconstituency_id='$tool_pid'";
$selected_par=mysql_query($query);
$p_row=mysql_fetch_array($selected_par);
$p_name=$p_row['tool_pname'];
$p_state=$p_row['tool_state_district'];

 $select_res="select  name from par_states_districts where state_district_id='$parli_state' ";
$selected_state=mysql_query($select_res);
$state_row=mysql_fetch_array($selected_state);
$state_name=$state_row['name'];




?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>

<center>
<h1> Pin Code Mapping Detail  </h1>
<table width="505" border="1">
  <tr>
    <td width="151">Pin Code</td>
    <td width="117"><?php echo $pin;?></td>
    <td width="102">&nbsp;</td>
    <td width="107">&nbsp;</td>
  </tr>
  <tr>
    <td>Assembly Name </td>
    <td><?php echo $asm_name['tool_constituency_name'];  ?></td>
    <td>&nbsp;</td>
    <td><a href="assembly.php?p_id=<?php echo $tool_pid; ?>&pin=<?php echo $pin?>"><b>Edit</b></a></td>
  </tr>
  <tr>
    <td>Parliament Assembly Name </td>
    <td><?php echo $parli_name;  ?></td>
    <td>&nbsp;</td>
    <td><a href="parliamentry.php?state_id=<?php echo $p_state; ?>&pin=<?php echo $pin?>"><b>Edit</b></a></td>
  </tr>
  <tr>
    <td>State Name </td>
    <td><?php echo $state_name;?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</center>
</body>
</html>
