<!DOCTYPE html>
<?php
include 'db.php';
date_default_timezone_set('America/Los_Angeles');
?>
<html>
<head>
	  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css"/>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>

<style type="text/css">
table{width:100%;}
table th{background-color: #333; color: #fff;}
table th, table td{padding:8px;}
</style>

<script>
$(document).ready(function() {
});

function loadAppointments(type){
	$('#type').val(type);
	$('#days').val($('#daysCopy').val());
	$('#checkSchedule').submit();

}
</script>

</head>

<body>

<?php include 'menu.php'; ?>
<div class="container">
	<!-- all code goes here -->
<h3>Welcome! Get upcoming appointments for: </h3>


<div class="dropdown">
	<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
    Select here
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
    <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:void(0);" onclick="loadAppointments(1);">Next week</a></li>
    <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:void(0);" onclick="loadAppointments(2);">Next month</a></li>
    <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:void(0);" onclick="loadAppointments(3);">Next 
    		<input type="text" id="daysCopy" value="15" /> days</a></li>
  </ul>
</div>





<div class="row">
<br><br>
<form id="checkSchedule" role="form" action='groups.php' method="post"
 data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
                    data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
                    data-bv-feedbackicons-validating="glyphicon glyphicon-refresh"
>
<input type="hidden" name="type" id="type" />
<input type="hidden" name="days" id="days" />

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   echo "<table>
	<thead>
	<tr>
		<th>Student Name</th>
		<th>Student Email</th>
		<th>Student Phone</th>
		<th>Appointment Date</th>
		<th>Appointment Time</th>

	</tr>
</thead>" ;
    $type = $_POST['type'];
    $days = $_POST['days'];

        
if($type == 1)
$results = checkScheduleByWeek();

if($type == 2)
$results = checkScheduleByMonth();

if($type == 3)
$results = checkScheduleByNextXdays($days);

while($row = mysql_fetch_array($results, MYSQL_ASSOC)){
	echo '<tr>';
	echo '<td>'.$row['student_name'].'</td>';
	echo '<td>'.$row['student_email'].'</td>';
	echo '<td>'.$row['student_phone'].'</td>';
	$source = $row['appointment_d'];
    $date = new DateTime($source);
	echo '<td>'.$date->format('m.d.Y') .'</td>';
	echo '<td>'.$row['appointment_t'].'</td>';
    echo '</tr>';


}
}
?>
</table>
</div>




</div>





</body>

</html>