<?php

require_once("database_detail.php");

$con = mysqli_connect($server,$username,$password,$database);



$result = mysqli_query($con, "SELECT * FROM specialty")
or die(mysqli_error());  
?>

<html>
<head>
	<title>Book A Doctor Online</title>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/foundation.css" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="js/scripts.js"></script>

</head>
<body>

<div id="login-wrapper">
	<div class="small-12 columns">
		<div class="row" id="header">

			<img src="img/bdf-logo-300x40.png">
			<p><em>Book a Doctor Online </em></p>
		</div>
		<div class="row" id="form">
			<span id="free">It's Free!</span>			
			<label>Specialty:</label>
			<select id="specialty">
				<option value="none">Select a Specialty</option>
				<?php					
					while($row = mysqli_fetch_array( $result )){
						echo "<option value=".$row['id'].">".$row['name']."</option>";
					}					
				?>
			</select>
			<span id="spec-error"></span>
			<label>Your Postal Code</label>
			<input type="text" id="postcode"></input>
			<span id="postal-error"></span>			
			<a class="button" onclick="validate();" id="search-button">Find Doctors</a>
			
			<a href="#">Need Help? 604-757-9723</a>
		</div>
	</div>
</div>

	<script src="js/modernizr.js"></script>
	<script src="js/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script type="text/javascript">$(document).foundation();</script>

</body>
