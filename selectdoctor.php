<?php

    require_once("database_detail.php");

    $con = mysqli_connect($server,$username,$password);

    mysqli_select_db($con,$database) or die(mysqli_error());
$result = mysqli_query($con,"SELECT * FROM doctor, doctorspecialty WHERE doctor.postal = '"
              . mysqli_real_escape_string($con,$_GET['postcode']) 
              ."' AND doctorspecialty.specialty_id = '"
              . mysqli_real_escape_string($con,$_GET['id']) 
              ."' AND doctorspecialty.doctor_id = doctor.id")
              or die(mysqli_error());  

    $num_rows = mysqli_num_rows($result);

?>

<html>
<head>
	<title>Book A Doctor Online - Select a Doctor</title>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/foundation.css" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="js/scripts.js"></script>
    <script type="text/javascript" src="js/time_slot.js"></script>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="gmaps/gmaps.js"></script>
    <link rel="stylesheet" href="http://twitter.github.com/bootstrap/1.3.0/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="gmaps/examples.css" />


</head>

<body>
	<div id="select-wrapper">
	<div class="small-12 columns">
    <div class="row" id="header">
	    <a href="index.php" id="back-button" class="button tiny">&lt;&lt; Back</a>
        <?php 
            echo 'Displaying ' . $num_rows . ' result(s)!'; 
        ?>
	</div>


	<div class="row" id="map-canvas"></div>
	<div class="row" id="results">
        
	<?php 
	    if ($num_rows == 0)
        {
		    echo 'Sorry, we couldn\'t find any doctors matching your search';
		}
		else
        {
            $j = 0;
		    while($row = mysqli_fetch_array( $result ))
            {

                if($row['photourl'] > " ") 
                {
                    $docphoto = $row['photourl'];
                }
                else 
                {
                    $docphoto = "img/default-doc.jpg";
                }

                $address[$j] = $row['address'] . ", " . $row['city'];

			    echo "<div class='docDetails'><img class='profileImg' src='"
                    .$docphoto."'></div><div><strong>Dr "
                    .$row['first_name']." ".$row['last_name']."</strong><br/>"
                    .$row['address']."<br/>".$row['city'].", "
                    .$row['province']
                    ."</div>";

				if ($row['moreinfourl'] != '')
                {
				    echo "<div><a href='".$row['moreinfourl']
                        ."' target='_blank'>Read Reviews</a></div>";
                    
                    $doc_id = $row['id'];
                    $current_date = date('Y-m-d');
                    $current_day = date('l');

                    // Reading doctor time slot from database
                    $doc_time_slot_result = mysqli_query($con, "select * from doctortimeslot where doctor_id = '"
                        .$doc_id."' and dayofweek_text = '"
                        .$current_day."' ") or die(mysqli_error());

                     // ADDING SELECT FIELD FOR DISPLAYING DATE
                     echo "<br><br><br><br>";

                     echo "<form id = \"myform\" method=\"get\" 
                          action=\"bookappointment.php\" 
                          onsubmit=\"return validate_form();\">";

                     echo "<input type=\"hidden\" value=\"$doc_id\" name=\"id\" id = \"id\">";
                     echo "<input type=\"hidden\" value=\"yes\" name=\"booked\" id = \"booked\">";

                     echo "<label>Date</label>";
                     // 7 days from current date
                     echo "<select name = \"date\" id = \"$doc_id\" 
                          onchange=\"showTime(this.value,this.id)\" >";
                     echo "<option value=\"Select Date\" selected>Select Date</option>";
                     echo "<option value=\"$current_date\" >$current_date, $current_day</option>";
    
                     for($i = 1; $i <= 7; $i++)
                     {
                        $date = strtotime("+$i day");
                        $select_date = date('Y-m-d', $date);
                        $select_day = date('l', $date);
                        echo "<option value=\"$select_date\">$select_date, $select_day</option>";
                     }
                     
                     echo "</select>";

                     echo "<div id=\"doc_time_slot\"></div>";
                     echo "<br>";
                     echo "<input type = \"submit\" class=\"button\" value=\"Select Doctor\" id = \"selButton\">";
                     echo "</form>";

                     $j++;

				}
                 
							
			}	
            include 'map.php';
		}
	?>
    <br>
    </div>
	</div>
	</div>

	
	<script src="js/modernizr.js"></script>
	<script src="js/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script type="text/javascript">$(document).foundation();</script>

</body>
