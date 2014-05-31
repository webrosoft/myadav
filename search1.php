<?php
$pin=$_REQUEST['pincode'];	
require_once 'page.php';

$con=mysql_connect('localhost','mynetai_pin2','pin234')or die("Error in connection");

$mydb=mysql_select_db('mynetai_pininfo')or die("Error : database is not  connected");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
//$pincode=$_POST['pincode'];
$query="select  tool_constituency_id from insert_pin where pincode ='$pin' ";
$result=mysql_query($query);
list($as_id)=mysql_fetch_row($result);

 $query="select tool_pconstituency_id,  tool_constituency_name from map_constituencies where tool_constituency_id='$as_id' ";
$result=mysql_query($query);
list($pc_id,$ac)=mysql_fetch_row($result);
 
 $query="select tool_pname,tool_state_district from parliamentary_constituency where tool_pconstituency_id='$pc_id'";
$result=mysql_query($query);
list($pc,$s_id)=mysql_fetch_row($result);

 $query="select  name from par_states_districts where state_district_id='$s_id' ";
$result=mysql_query($query);
list($state_name)=mysql_fetch_row($result);


$body = <<< EOD
<center>
<h1> Pin code Mapping Detail</h1>
<table border=1>
<tr><td>Pincode</td><td>$pin</td></tr>
<tr><td>Assembly Constituency</td><td>$ac</td><td><a href='assembly.php?s_id=$s_id&pin=$pin'><b>Edit</b></a></td></tr>
<tr><td>Parliament Constituency</td><td>$pc</td></tr>
<tr><td>State</td><td>$state_name</td></tr>
</table>
</center>
EOD;
sendPage($body);
?>
