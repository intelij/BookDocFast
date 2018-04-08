 <?php
require_once("database_detail.php");

$con = mysqli_connect($server,$username,$password);

mysqli_select_db($con,$database) or die(mysql_error());

$docId = $_GET['id'];
$docDate = $_GET['date'];
$docTime = $_GET['doc_time_slot'];

$result = mysqli_query($con,"SELECT * FROM doctor WHERE id = '".$docId."'")
or die(mysql_error());  


$result_reasons = mysqli_query($con,"SELECT * FROM specialtyreasons, doctor, doctorspecialty, visitreason WHERE doctor.id = '".$docId."' AND specialtyreasons.specialty_id = doctorspecialty.specialty_id
AND visitreason.id = specialtyreasons.visitreason_id
AND doctorspecialty.doctor_id = doctor.id")
or die(mysql_error());  

/*

SELECT * 
FROM specialtyreasons, doctor, doctorspecialty, visitreason
WHERE doctor.id = '1'
AND specialtyreasons.specialty_id = doctorspecialty.specialty_id
AND visitreason.id = specialtyreasons.visitreason_id
AND doctorspecialty.doctor_id = doctor.id
*/
?>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	
        <title>Book A Doctor Online</title>
	
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link rel="stylesheet" href="css/foundation.css" />
      <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/style.css">
    
       
	<link rel="stylesheet" href="style/validationEngine.jquery.css" type="text/css"/>

	<script src="jquery/jquery-1.8.2.min.js" type="text/javascript">
	</script>
	<script src="jquery/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8">
	</script>
	<script src="jquery/jquery.validationEngine.js" type="text/javascript" charset="utf-8">
	</script>
	<script>
		jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery("#myForm").validationEngine('attach');
		});
	</script>
</head>
<body>
	


<div id="booking-wrapper">
	<div class="small-12 columns">
		<div class="row" id="header">

			<img src="img/bdf-logo-300x40.png">
			<p><em>Please confirm your booking with</em></p>

			<?php
				while($row = mysqli_fetch_array( $result )){
                        	 if($row['photourl'] > " ") {
					$docphoto = $row['photourl'];}
  				 else {
					$docphoto = "img/default-doc.jpg";
				      } 

					echo "<div><img class='profileImg' src='".$docphoto."'></div><br/><div><strong>Dr ".$row['first_name']." ".$row['last_name']."</strong><br/>
							".$row['address']."<br/>".$row['city'].", ".$row['province']."<br/><br/> Time: $docTime & Date: $docDate </div>";

                $docName = $row['first_name'] . " " . $row['last_name'];
                $docAddr = $row['address'];
                $docCity = $row['city'];
                $docProvince = $row['province'];
               
				}
				?>				
			
		</div>

     <div class="row" id="form">
 		<label id = "errorMsg">*Required Fields </label>
	<form id="myForm"  name="confirmation-form" method="post" action="confirmation.php">
		
				


	
            <?php
                echo "<input type=\"hidden\" value=\"$docId\" name=\"docId\" id = \"docId\">";
                echo "<input type=\"hidden\" value=\"$docTime\" name=\"docTime\" id = \"docTime\">";
                echo "<input type=\"hidden\" value=\"$docDate\" name=\"docDate\" id = \"docDate\">";
                echo "<input type=\"hidden\" value=\"$docName\" name=\"docName\" id = \"docName\">";
                echo "<input type=\"hidden\" value=\"$docAddr\" name=\"docAddr\" id = \"docAddr\">";
                echo "<input type=\"hidden\" value=\"$docCity\" name=\"docCity\" id = \"docCity\">";
                echo "<input type=\"hidden\" value=\"$docProvince\" name=\"docProvince\" id = \"docProvince\">";
                echo "<input type=\"hidden\" value=\"$docphoto\" name=\"docphoto\" id = \"docphoto\">";

            ?>
				<label>Reason for visit:</label>
				
				<select id="reason" name="reason" class="validate[required]">
					<!-- update with SELECT * reasons for the chosen doctor's specialty --> 
					<?php					
						while($row_reasons = mysqli_fetch_array( $result_reasons )){
                            $reason = $row_reasons['name'];
							echo "<option value=\"$reason\">".$row_reasons['name']."</option>";
						}					
					?>
				</select>
				
				<label>Patient First Name*</label>
				<input type="text" name="patFirstname" id="patFirstname" value="" class="validate[required]"></input>
				<label>Patient Last Name*</label>
				<input type="text" name="patLastname" id="patLastname" value="" class="validate[required]"></input>
				<label>Email Address*</label>
				<input value="forced_error" class="validate[required,custom[email]] text-input" type="text" name="emailAddress" id="emailAddress" />
					<label>Phone*</label>
				<input value="+1 305 768 23 34 ext 23 BUG" class="validate[custom[phone]] text-input" type="text" name="phone" id="phone" />
							
                <input type = "submit" value = "Book For Free" class = "button" id = "search-button">
			</form>
			<a href="#">Need Help? 604-757-9723</a>
		</div>
	</div>
</div>

	<script src="js/modernizr.js"></script>
	
    <script src="js/foundation.min.js"></script>
    <script type="text/javascript">$(document).foundation();</script>

 
        
</body>
</html>
