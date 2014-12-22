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
<link rel="stylesheet" href="css/style.css">
<link href='http://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>

<style type="text/css">
table{width:100%;}
table th{background-color: #333; color: #fff;}
table th, table td{padding:8px;}
</style>

<script>
$(document).ready(function() {
    $('#checkSchedule').bootstrapValidator();
});
</script>

</head>

<body>

<?php include 'menu.php'; ?>
<div class="container">
	<!-- all code goes here -->
<h3>Welcome! Check your schedule here </h3>



	<div class="row">
		<div class="col-md-6">

<form id="checkSchedule" role="form" action='schedule.php' method="post"
 data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
                    data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
                    data-bv-feedbackicons-validating="glyphicon glyphicon-refresh"
>
  

<div class="form-group">
    <label>Email address</label>
    <input type="email" class="form-control" name="studentemail" placeholder="Enter email"
                                data-bv-notempty="true"
                                data-bv-notempty-message="This field is required and cannot be empty">
  </div>  

  
<div class="form-group">
    <label>Date of birth</label>
    <input type="text" class="form-control" name="DoB" placeholder="MM/DD/YYYY Format"
                                data-bv-notempty="true"
                                data-bv-notempty-message="The date of birth is required"

                                data-bv-date="true"
                                data-bv-date-format="MM/DD/YYYY"
                                data-bv-date-message="The date of birth is not valid">
  </div>  


  <button type="submit" class="btn btn-default">Submit</button>

  
</form>
</div>
</div>


<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   echo "<table>
	<thead>
	<tr>
		<th>Student Name</th>
		<th>Student Email</th>
		<th>Student Phone</th>
		<th>Student Address</th>
		<th>Appointment Date</th>
		<th>Appointment Time</th>
		<th>Reason</th>

	</tr>
</thead>" ;
    $semail = $_POST['studentemail'];
        $sdob = $_POST['DoB'];

$results = checkSchedule($semail,$sdob);

while($row = mysql_fetch_array($results, MYSQL_ASSOC)){
	echo '<tr>';
	echo '<td>'.$row['student_name'].'</td>';
	echo '<td>'.$row['student_email'].'</td>';
	echo '<td>'.$row['student_phone'].'</td>';
	echo '<td>'.$row['student_add_1'] .'<br>' . $row['student_add_2'] .'<br>' .$row['student_city'] . ',' . $row['student_state'] . '<br>' . $row['student_zip'] .'</td>';
	$source = $row['appointment_d'];
$date = new DateTime($source);
	echo '<td>'.$date->format('m.d.Y') .'</td>'
;

	echo '<td>'.$row['appointment_t'].'</td>';
		echo '<td>'.$row['student_notes'].'</td>';

    

    

    echo '</tr>';


}
}
?>
</table>
</div>

<?php include 'footer.php'; ?>
</body>

</html>