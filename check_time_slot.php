<?php
require_once("database_detail.php");

$time = $_GET['time'];
$docID = $_GET['docId'];
$date = $_GET['date'];

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

if(in_array($time, $booked_time))
{
    echo "invalid";
}
else
{
    echo "valid";
}


mysqli_close($con);

?>
