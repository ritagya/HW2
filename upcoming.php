<!DOCTYPE html>
<?php
include 'db.php';
date_default_timezone_set('America/Los_Angeles');

?>
<html>
<head>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<link href='http://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<style type="text/css">
table{width:100%;}
table th{background-color: #333; color: #fff;}
table th, table td{padding:8px;}
</style>
</head>

<body>

		<?php include 'menu.php'; ?>
<div class="container">
	<h3>Upcoming Appointments</h3>
<table>
	<thead>
	<tr>
		<th>Student Name</th>
		<th>Student Email</th>
		<th>Student Phone</th>
		<th>Student DoB</th>
		<th>Student Address</th>
		<th>Appointment Date</th>
		<th>Appointment Time</th>
		<th>Reason</th>
	

	</tr>
</thead>
<?php
$results = getUpcomingAppointments();

while($row = mysql_fetch_array($results, MYSQL_ASSOC)){
	echo '<tr>';
	echo '<td>'.$row['student_name'].'</td>';
	echo '<td>'.$row['student_email'].'</td>';
	echo '<td>'.$row['student_phone'].'</td>';
		$source = $row['student_dob'];
$date = new DateTime($source);
	echo '<td>'.$date->format('m.d.Y') .'</td>';

	echo '<td>'.$row['student_add_1'] .'<br>' . $row['student_add_2'] .'<br>' .$row['student_city'] . ', ' .$row['student_state'] . '<br>' .$row['student_zip'] .'</td>';
	$source = $row['appointment_d'];
$date = new DateTime($source);
	echo '<td>'.$date->format('m.d.Y') .'</td>';


	echo '<td>'.$row['appointment_t'].'</td>';
	echo '<td>'.$row['student_notes'].'</td>';
    echo '</tr>';


}
?>
</table>

</div>
<?php include 'footer.php'; ?>
</body>

</html>