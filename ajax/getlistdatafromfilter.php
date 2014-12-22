<?php
include '../db.php';
date_default_timezone_set('America/Los_Angeles');

?>


<?php
$id = $_GET['id'];
					$results = getFilterData($id);

					while($row = mysql_fetch_array($results, MYSQL_ASSOC)){
						$appFrom = $row['appFrom'];
						$appTo = $row['appTo'];
						$dobFrom = $row['dobFrom'];
						$dobTo = $row['dobTo'];
						$reason = $row['reason'];


						}
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


<?php
$count =  mysql_num_rows($results);
if($count <= 0)
 exit();
?>

<div style="border:1px solid #eee; padding:20px; position: relative;">

		<div class="row" >
			<br><br>
			<div class="col-sm-10">
					Existing Email Templates
					<select class="form-control" id="drpTemplate"> 
					<?php
					$results = getTemplates();

					while($row = mysql_fetch_array($results, MYSQL_ASSOC)){
						echo '<option value='.$row['template_id'].'>'.$row['template_name'].'</option>';

						}
					?>
					</select>
			</div>
				
		</div>
		<div class="row" style="margin-top:25px;"></div>

		<div class="row text-center" style="margin-top:25px;">

		<button id="btnEmail" type="button" class="btn btn-primary" onclick="sendTemplateEmail();">Send email to this list</button>


		</div>
	</div>