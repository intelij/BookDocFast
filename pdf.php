<html>
<head>
	<style>
	body {font-family:Helvetica, Arial, sans-serif; font-size:10pt;}
	table {width:100%; border-collapse:collapse; border:1px solid #CCC;}
	td {padding:5px; border:1px solid #CCC; border-width:1px 0;}
	</style>
</head>
<body>

	<h1>Doctor Appointment Letter</h1>
	
	<table>
		<tr>
			<td>Patient Name:</td>
			<td><?php echo $firstname . " " . $lastname ?></td>
        </tr>
        <tr>
			<td>Patient Email:</td>
			<td><?php echo $email; ?></td>
		</tr>
		<tr>
			<td>Doctor Name</td>
			<td><?php echo $docName; ?></td>
		</tr>
		<tr>
			<td>Doctor Address</td>
			<td><?php echo $docAddr; ?></td>
		</tr>
		<tr>
			<td>Doctor City</td>
			<td><?php echo $docCity; ?></td>
		</tr>
		<tr>
			<td>Appointment Date</td>
			<td><?php echo $date; ?></td>
		</tr>
		<tr>
			<td>Appointment Time</td>
			<td><?php echo $time; ?></td>
		</tr>
		<tr>
			<td>Appointment Reason</td>
			<td><?php echo $reason; ?></td>
		</tr>

	</table>
	
</body>
</html>
