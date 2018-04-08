<?php

    require_once("database_detail.php");

    $con = mysqli_connect($server,$username,$password);

    mysqli_select_db($con,$database) or die(mysqli_error());

    $email = $_POST['emailAddress'];
    $firstname = $_POST['patFirstname'];
    $lastname = $_POST['patLastname'];
    $phone = $_POST['phone'];
    $docid = $_POST['docId'];
    $time = $_POST['docTime'];
    $date = $_POST['docDate'];
    $docName = $_POST['docName'];
    $docAddr = $_POST['docAddr'];
    $docCity = $_POST['docCity'];
    $docphoto = $_POST['docphoto'];
    $docProvince = $_POST['docProvince'];
    $reason = $_POST['reason'];

    $sql_patient = "INSERT INTO patient(first_name, last_name, 
                    email, phone) VALUES('$firstname', '$lastname', 
                    '$email', $phone)";

    $result=mysqli_query($con, $sql_patient);

    // if successfully insert data into database, displays message "Successful". 
    if($result)
    {
        //    echo "Successful";
        //    echo "<BR>";
    }

    else 
    {
        echo "ERROR";
    }

    $patient_id = mysqli_insert_id($con);

   $sql_appointment = "INSERT INTO appointment(date, time, patient_id
                        , doctor_id) VALUES('$date', '$time', $patient_id
                        , $docid)";

    $result=mysqli_query($con, $sql_appointment);

    // if successfully insert data into database, displays message "Successful". 
    
    if($result)
    {
        //    echo "Successful";
        //    echo "<BR>";
    }

    else 
    {
        echo "ERROR";
    }

    // SEND EMAIL CODE

    if (!empty($_POST)) 
    {
	    // Used for later to determine result
    	$success = $error = false;

    	// Object syntax looks better and is easier to use than arrays to me
	    $post = new stdClass;
	
    	// Usually there would be much more validation and filtering, but this
	    // will work for now.
    	foreach ($_POST as $key => $val)
	    	$post->$key = trim(strip_tags($_POST[$key]));
		
    	// Check for blank fields
        //	if (empty($post->name) OR empty($post->email) OR empty($post->about))
        //		$error = true;
		
        //	else {
        {
		
	    	// Get this directory, to include other files from
    		$dir = dirname(__FILE__);
		
		    // Get the contents of the pdf into a variable for later
	    	ob_start();
    		require_once($dir.'/pdf.php');
	    	$pdf_html = ob_get_contents();
    		ob_end_clean();

	    	// Load the dompdf files
    		require_once($dir.'/dompdf/dompdf_config.inc.php');
		
	    	$dompdf = new DOMPDF(); // Create new instance of dompdf
    		$dompdf->load_html($pdf_html); // Load the html
    		$dompdf->render(); // Parse the html, convert to PDF
	    	$pdf_content = $dompdf->output(); // Put contents of pdf into variable for later
		
		    // Get the contents of the HTML email into a variable for later
    		ob_start();
	    	require_once($dir.'/html.php');
    		$html_message = ob_get_contents();
	    	ob_end_clean();
		
		    // Load the SwiftMailer files
    		require_once($dir.'/swift/swift_required.php');

	    	$mailer = new Swift_Mailer(new Swift_MailTransport()); // Create new instance of SwiftMailer

    		$message = Swift_Message::newInstance()
				       // Message subject
                       ->setSubject('Doctor Appointment Letter') 
					   // Array of people to send to
                       ->setTo(array($email => $firstname )) 
					   // From:
                       ->setFrom(array('no-reply@bookdocfast.com' => 'BookDocFast'))                        
                       // Attach that HTML message from earlier
					   ->setBody($html_message, 'text/html') 
                       // Attach the generated PDF from earlier
					   ->attach(Swift_Attachment::newInstance($pdf_content, 
                                'appointment-letter.pdf', 'application/pdf')); 		

            // Send the email, and show user message
    		if ($mailer->send($message))
	    		$success = true;
    		else
	    		$error = true;
		}
    }

?>

<html>
<head>
	<title>Book A Doctor Online - Booking Confirmed!</title>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/foundation.css" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="js/scripts.js"></script>

</head>
<body>

	<div class="small-12 md-6 columns">
		<div class="row" id="header">
			<h2>Booking Confirmed!</h2>
		</div>

        <div class="row" id="confirmation-content">
			<p>Your booking has now been confirmed. We've sent you a 
               confirmation email to <strong><em>

            <?php 
				echo $email; 
			?>
			
            </em><strong></p>
			
            <p>If you have any questions regarding your booking, please call us on: 604-757-9723 </p>
			<p><a href="#">Click Here</a> to go back to the home page.</p>

		</div>
    
        <div id="table" align="center">
        <br> <br>

        <table>               
            <tr>
                <td colspan="2">
                    <?php 
                        echo "<center><img style='width:50%;' 
                             src=\"$docphoto\" /></center>"; 
                    ?>
                </td>
            </tr>
            <tr>
                <td>Patient Name:</td>
                <td>
                    <?php 
                        echo $firstname . " " . $lastname 
                    ?>
                </td>
            </tr>
            <tr>
                <td>Patient Email:</td>
                <td>
                    <?php 
                        echo $email; 
                    ?>
                </td>
            </tr>
            <tr>
                <td>Doctor Name</td>
                <td>
                    <?php 
                        echo $docName; 
                    ?>
                </td>
            </tr>
            <tr>
                <td>Doctor Address</td>
                <td>
                    <?php 
                        echo $docAddr; 
                    ?>
                </td>
            </tr>
            <tr>
                <td>Doctor City</td>
                <td>
                    <?php echo  $docCity ;  ?>
                </td>
            </tr>
            <tr>
                <td>Appointment Date</td>
                <td>
                    <?php 
                        echo $date; 
                    ?>
                </td>
            </tr>
            <tr>
                <td>Appointment Time</td>
                <td>
                    <?php 
                        echo $time; 
                    ?>
                </td>
            </tr>
            <tr>
                <td>Appointment Reason</td>
                <td>
                    <?php 
                        echo $reason; 
                    ?>
                </td>
            </tr>
        </table>

    </div>

</div>
    
	<script src="js/modernizr.js"></script>
	<script src="js/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script type="text/javascript">$(document).foundation();</script>

</body>
