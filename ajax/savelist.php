<?php
include '../db.php';
date_default_timezone_set('America/Los_Angeles');

?>
<?php
$appFrom = $_GET['appFrom'];
$appTo = $_GET['appTo'];
$dobFrom = $_GET['dobFrom'];
$dobTo = $_GET['dobTo'];
$reason = $_GET['reason'];
$name = $_GET['name'];

$results = insertListFilters($name,$appFrom,$appTo,$dobFrom,$dobTo,$reason);

echo 'List Saved Sucessfully';

?>