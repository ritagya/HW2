<?php

include 'db.php';
date_default_timezone_set('America/Los_Angeles');

$fn = $_GET['fn'];

if($fn == 'getAppointmentDayWise')
  getAppointmentDayWise();

function getAppointmentDayWise(){

echo countApp();

}
?>
