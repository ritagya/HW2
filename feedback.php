<!DOCTYPE html>
<?php
include 'db.php';
date_default_timezone_set('America/Los_Angeles');

?>
<html>
<head>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/style.css">
<link href='http://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>
<style type="text/css">
table{width:100%;}
table th{background-color: #333; color: #fff;}
table th, table td{padding:8px;}
</style>
</head>

<body>

		<?php include 'menu.php'; ?>
<div class="container">
	<h3>Feedback from Students</h3>
<table>
	<thead>
	<tr>
		<th>Student Sex</th>
		<th>Visits</th>
		<th>Insurance</th>
		<th>Accessibility</th>
		<th>Instate Insurance</th>
		<th>Appointment Process</th>
		<th>Follow ups</th>
		<th>Experience</th>
		<th>Improvements</th>
		<th>Suggestions</th>
	</tr>
</thead>
<?php
$results = getStudentFeedback();

while($row = mysql_fetch_array($results, MYSQL_ASSOC)){
	echo '<tr>';
	echo '<td>'.$row['sex'].'</td>';
	echo '<td>'.$row['visits'].'</td>';
	echo '<td>'.$row['insurance'].'</td>';
	echo '<td>'.$row['accessibility'].'</td>';
	echo '<td>'.$row['instate_insurance'].'</td>';
	echo '<td>'.$row['app_process'].'</td>';
	echo '<td>'.$row['follow_up'].'</td>';
	echo '<td>'.$row['experience'].'</td>';
	echo '<td>'.$row['improvement'].'</td>';
	echo '<td>'.$row['suggestions'].'</td>';
    echo '</tr>';

}
?>
</table>

</div>
<?php include 'footer.php'; ?>
</body>

</html>