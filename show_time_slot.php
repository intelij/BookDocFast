<?php
require_once("database_detail.php");

$date = $_GET['date'];
$docID = $_GET['docId'];
$timestamp = strtotime($date);
$day = date('l', $timestamp);

$con = mysqli_connect($server,$username,$password);

if (!$con)
{
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con, $database);

$sql="SELECT * FROM appointment WHERE date = '".$date."' AND doctor_id = '".$docID."' ";

$result = mysqli_query($con,$sql);
$i = 0;
while($row = mysqli_fetch_array($result))
{
    $booked_time[$i] = $row['time'];
    $i++;
}

$sql="SELECT * FROM doctortimeslot WHERE dayofweek_text = '".$day."' AND doctor_id = '".$docID."' ";
$time_result = mysqli_query($con,$sql);

$i = 0;

while($row = mysqli_fetch_array($time_result))
{
    $doc_time[$i] = $row['time'];
    $i++;
}

echo "<label>Available Timings</label>";
echo "<select name=\"doc_time_slot\" id=\"".$docID."\">";
 
echo "<option value=\"\">Select Time</option>";

foreach ($doc_time as $d_time)
{
    if(!in_array($d_time, $booked_time))
    {
        echo "<option value=\"". $d_time . "\">" . $d_time ."</option>";
     //echo "invalid";
    }
}

echo "</select>";

/*else
{
    echo "valid";
}*/

/*
$sql="SELECT * FROM doctortimeslot WHERE dayofweek_text = '".$day."' AND doctor_id = '".$docID."' ";
$time_result = mysqli_query($con,$sql);

$i = 0;

while($row = mysqli_fetch_array($time_result))
{
    $doc_time[$i] = $row['time'];
    $i++;
}
echo "<label>Doctor Timings</label>";
echo "<select name=\"doc_time\" id=\"".$docID."\" onchange=\"checkTime(this.value,this.id)\" >";
 
echo "<option value=\"\">Select Time</option>";

foreach ($doc_time as $d_time)
{
    echo "<option value=\"". $d_time . "\">" . $d_time ."</option>";
}

echo "</select>";
*/
mysqli_close($con);

?>
