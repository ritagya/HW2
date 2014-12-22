<!DOCTYPE html>
<?php
include 'db.php';
date_default_timezone_set('America/Los_Angeles');

?>
<html>
<head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

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

		
		<h3>Filter Lists</h3>
<table>
	<thead>
	<tr>
		<th> Name</th>
		<th>Appointment Date From</th>
		<th>Appointment Date To</th>
		<th>Student DoB From</th>
		<th>Student DoB To</th>		
		<th>Reason</th>
	

	</tr>
</thead>
<?php

$results = getAllFilterLists();

while($row = mysql_fetch_array($results, MYSQL_ASSOC)){
	echo '<tr>';
	echo '<td>'.$row['name'].'</td>';
	echo '<td>'.$row['appFrom'].'</td>';
	echo '<td>'.$row['appTo'].'</td>';
		echo '<td>'.$row['dobFrom'].'</td>';
	echo '<td>'.$row['dobTo'].'</td>';
	echo '<td>'.$row['reason'].'</td>';

    echo '</tr>';


}
?>
</table>



</div>



<?php include 'footer.php'; ?>
</body>

</html>

