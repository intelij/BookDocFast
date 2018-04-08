<?php
require_once("database_detail.php");

$con = mysql_connect($server,$username,$password);

mysql_select_db("markydtt_bookdocfast") or die(mysql_error());

$result = mysql_query("SELECT * FROM specialty")
or die(mysql_error());  


echo "Doctor Id: 1 <br/>";
echo "Doctor Name: Spence <br/>";

?>
