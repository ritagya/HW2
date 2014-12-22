
<?php
include '../db.php';
date_default_timezone_set('America/Los_Angeles');

?>
<h3>Student List</h3>
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
$appFrom = $_GET['appFrom'];
$appTo = $_GET['appTo'];
$dobFrom = $_GET['dobFrom'];
$dobTo = $_GET['dobTo'];
$reason = $_GET['reason'];

$results = studentListWithFilter($appFrom,$appTo,$dobFrom,$dobTo,$reason);

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