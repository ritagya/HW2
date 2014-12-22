<!DOCTYPE html>
<?php
include 'db.php';
?>
<html>
<head>
</head>

<body>

<?php
$results = testSelect();
while($row = mysql_fetch_array($results, MYSQL_ASSOC)){
	echo $row['student_name'] . ' has an appointment on ' . $row['appointment_d'];




}
?>
	

</body>

</html>