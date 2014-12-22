<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
date_default_timezone_set('America/Los_Angeles');


function connectToDB(){
	$link = mysql_connect('us-cdbr-iron-east-01.cleardb.net', 'b21ea2aecbe285', '7b47a8e2');
	if (!$link) {
	    die('Could not connect: ' . mysql_error());
	}
	mysql_select_db('heroku_8629d5c11fbf7e8');
	return $link;
}

function closeDB($link){
	mysql_close($link);

}

function testSelect(){
	$dbConn = connectToDB();
	$sql = "select student_name , appointment_d from appscheduler_booking where appointment_d='2014-12-24' ";
	$results = mysql_query( $sql, $dbConn );
	if(! $results )
	{
	  die('Could not get data: ' . mysql_error());
	}

	closeDB($dbConn);

	return $results;
}

function getUpcomingAppointments(){
	$dbConn = connectToDB();
	$sql = " Select * from appscheduler_booking where appointment_d >'".date('Y/m/d')."' ORDER BY  appointment_d";
	$results = mysql_query( $sql, $dbConn );
	if(! $results )
	{
	  die('Could not get data: ' . mysql_error());
	}

	closeDB($dbConn);

	return $results;
}

function getFilterData($id){
	$dbConn = connectToDB();
	$sql = " Select * from  filterlist where id=".$id;
	$results = mysql_query( $sql, $dbConn );
	if(! $results )
	{
	  die('Could not get data: ' . mysql_error());
	}

	closeDB($dbConn);

	return $results;
}

function getAllFilterLists(){
	$dbConn = connectToDB();
	$sql = " Select * from  filterlist";
	$results = mysql_query( $sql, $dbConn );
	if(! $results )
	{
	  die('Could not get data: ' . mysql_error());
	}

	closeDB($dbConn);

	return $results;
}

function studentListWithFilter($appFrom,$appTo,$dobFrom,$dobTo,$reason){
	$dbConn = connectToDB();
	$sql = " Select * from appscheduler_booking";
	$sql .=" where ";
	$sql .= " 1=1  ";
	if($appFrom != '')
	  $sql .= " and (appointment_d between STR_TO_DATE('".$appFrom."','%m/%d/%Y') and STR_TO_DATE('".$appTo."','%m/%d/%Y') )" ;
	if($dobFrom != '')
	  $sql .= " and (MONTH(student_dob) between ".$dobFrom." and ".$dobTo." )" ;
	if($reason != '')
	  $sql .= " and student_notes like '%".$reason."%'" ;

	$sql .= " ORDER BY  appointment_d";
	$results = mysql_query( $sql, $dbConn );
	if(! $results )
	{
	  die('Could not get data: ' . mysql_error());
	}

	closeDB($dbConn);

	return $results;
}

function insertListFilters($name,$appFrom,$appTo,$dobFrom,$dobTo,$reason){
	$dbConn = connectToDB();
	$sql = "insert into filterlist(name,appFrom,appTo,dobFrom,dobTo,reason)";
	$sql .= " VALUES (";
	$sql .= "'".$name."'," ;
	$sql .= "'".$appFrom."'," ;
	$sql .= "'".$appTo."'," ;
	$sql .= "'".$dobFrom."'," ;
	$sql .= "'".$dobTo."'," ;
	$sql .= "'".$reason."'" ;
	$sql .= ")";


	$results = mysql_query( $sql, $dbConn );
	if(! $results )
	{
	  die('Could not get data: ' . mysql_error());
	}

	closeDB($dbConn);

	return $results;
}



function insertAppointment($sname,$semail,$sphone,$saddress,$saddress1,$saddress2,$saddress3,$saddress4,$sdob,$Appointmentdate,$Appointmenttime,$snotes){
	$dbConn = connectToDB();
	$sql = "insert into appscheduler_booking(student_name,student_email, student_phone, student_add_1, student_add_2, student_city, student_state, student_zip, student_dob, appointment_d, appointment_t,student_notes)";
	$sql .= " VALUES (";
	$sql .= "'".$sname."'," ;
	$sql .= "'".$semail."'," ;
	$sql .= "'".$sphone."'," ;
	$sql .= "'".$saddress."'," ;
	$sql .= "'".$saddress1."'," ;
	$sql .= "'".$saddress2."'," ;
	$sql .= "'".$saddress3."'," ;
	$sql .= "'".$saddress4."'," ;
    $sql .= "STR_TO_DATE('".$sdob."','%m/%d/%Y')," ;
     $sql .= "STR_TO_DATE('".$Appointmentdate."','%m/%d/%Y')," ;
    $sql .= "'".$Appointmenttime."'," ;
    $sql .= "'".$snotes."'" ;


	$sql .= ")";
	
	$results = mysql_query( $sql, $dbConn );
	if(! $results )
	{
	  die('Could not get data: ' . mysql_error());
	}

	closeDB($dbConn);

	return $results;
}


function checkSchedule($semail,$sdob){
	$dbConn = connectToDB();
	$sql = "select * from appscheduler_booking where (student_email='".$semail."' and student_dob=STR_TO_DATE('".$sdob."','%m/%d/%Y'))";

	$results = mysql_query( $sql, $dbConn );
	if(! $results )
	{
	  die('Could not get data: ' . mysql_error());
	}

	closeDB($dbConn);

	return $results;



}

function countApp (){
	$dbConn = connectToDB();
	$sql = "select count(appointment_d) as count, appointment_d from appscheduler_booking group by appointment_d";
	$results = mysql_query( $sql, $dbConn );
	if(! $results )
	{
	  die('Could not get data: ' . mysql_error());
	}

	closeDB($dbConn);

	$rows = array();
	while($r = mysql_fetch_assoc($results)) {
	    $rows[] = $r;
	}

	return json_encode($rows);



}


function insertFeedback($student_id,$sex,$visits,$insurance,$accessibility,$instate_insurance,$app_process,$follow_up,$experience,$improvement,$suggestions){
	$dbConn = connectToDB();
	$sql = "insert into feedback(student_id, sex, visits, insurance, accessibility, instate_insurance, app_process, follow_up, experience, improvement, suggestions)";
	$sql .= " VALUES (";
	$sql .= "'".$student_id."'," ;
	$sql .= "'".$sex."'," ;
	$sql .= "'".$visits."'," ;
	$sql .= "'".$insurance."'," ;
	$sql .= "'".$accessibility."'," ;
	$sql .= "'".$instate_insurance."'," ;
	$sql .= "'".$app_process."'," ;
	$sql .= "'".$follow_up."'," ;
    $sql .= "'".$experience."'," ;
    $sql .= "'".$improvement."'," ;
    $sql .= "'".$suggestions."'" ;


	$sql .= ")";


	$results = mysql_query( $sql, $dbConn );
	if(! $results )
	{
	  die('Could not get data: ' . mysql_error());
	}

	closeDB($dbConn);

	return $results;
}

function login($demail,$password){
	$dbConn = connectToDB();
	$sql = "select * from login where (doctor_email='".$demail."' and password='".$password."')";
	$results = mysql_query( $sql, $dbConn );
	if(! $results )
	{
	  die('Could not get data: ' . mysql_error());
	}

	closeDB($dbConn);

	return $results;


}

function getStudentFeedback(){
	$dbConn = connectToDB();
	$sql = " Select * from feedback";
	$results = mysql_query( $sql, $dbConn );
	if(! $results )
	{
	  die('Could not get data: ' . mysql_error());
	}

	closeDB($dbConn);

	return $results;
}


function insertTemplate($subject,$body,$template_name){
	$dbConn = connectToDB();
	$sql = "insert into template(subject, body, template_name)";
	$sql .= " VALUES (";
	$sql .= "'".$subject."'," ;
	$sql .= "'".$body."'," ;
	$sql .= "'".$template_name."'" ;
	$sql .= ")";


	$results = mysql_query( $sql, $dbConn );
	if(! $results )
	{
	  die('Could not get data: ' . mysql_error());
	}

	closeDB($dbConn);

	return $results;
}
function deleteTemplate($id){
	$dbConn = connectToDB();
	$sql = " delete from template where template_id=".$id;
	$results = mysql_query( $sql, $dbConn );
	if(! $results )
	{
	  die('Could not get data: ' . mysql_error());
	}

	closeDB($dbConn);
	
	return $results;	
}
function updateTemplate($id,$subject,$body,$template_name){
	$dbConn = connectToDB();
	$sql = "update template";	
	$sql .= " set subject='".$subject."'," ;
	$sql .= "  body='".$body."'," ;
	$sql .= "  template_name='".$template_name."'" ;
	$sql .= " where template_id= ".$id;


	$results = mysql_query( $sql, $dbConn );
	if(! $results )
	{
	  die('Could not get data: ' . mysql_error());
	}

	closeDB($dbConn);

	return $results;
}

function getTemplates(){
	$dbConn = connectToDB();
	$sql = " Select * from template";
	$results = mysql_query( $sql, $dbConn );
	if(! $results )
	{
	  die('Could not get data: ' . mysql_error());
	}

	closeDB($dbConn);
	
	return $results;
}


function getTemplateFromID($id){
	$dbConn = connectToDB();
	$sql = " Select * from template where template_id=".$id ;
	$results = mysql_query( $sql, $dbConn );
	if(! $results )
	{
	  die('Could not get data: ' . mysql_error());
	}

	closeDB($dbConn);

	return $results;
}

function checkScheduleByMonth(){
	$dbConn = connectToDB();
	$sql = "select student_name , student_email , student_phone , appointment_d , appointment_t
	        from appscheduler_booking 
	        where appointment_d>=date_sub(date_add(curdate(), interval 1 month), interval day(curdate())-1 day) ";
	$results = mysql_query( $sql, $dbConn );
	if(! $results )
	{
	  die('Could not get data: ' . mysql_error());
	}

	closeDB($dbConn);

	return $results;



}



function checkScheduleByWeek(){
	$dbConn = connectToDB();
	$sql = "select student_name , student_email , student_phone , appointment_d , appointment_t
	        from appscheduler_booking 
	        where appointment_d between adddate(curdate(), INTERVAL 1-DAYOFWEEK(curdate()) DAY) and adddate(curdate(), INTERVAL 7-DAYOFWEEK(curdate()) DAY)";
	$results = mysql_query( $sql, $dbConn );
	if(! $results )
	{
	  die('Could not get data: ' . mysql_error());
	}

	closeDB($dbConn);

	return $results;



}



function checkScheduleByNextXdays($days){
	$dbConn = connectToDB();
	$sql = "select student_name , student_email , student_phone , appointment_d , appointment_t
	        from appscheduler_booking 
	        where appointment_d between curdate() and adddate(curdate(), INTERVAL ".$days." DAY)";
	$results = mysql_query( $sql, $dbConn );
	if(! $results )
	{
	  die('Could not get data: ' . mysql_error());
	}

	closeDB($dbConn);

	return $results;



}


function insertUploads($idimages,$pictures){
	$dbConn = connectToDB();
	$sql = "insert into images(idimages,pictures)";
	$sql .= " VALUES (";
	$sql .= "'".$idimages."'," ;
	$sql .= "'".$pictures."'," ;
	$sql .= ")";
	
	$results = mysql_query( $sql, $dbConn );
	if(! $results )
	{
	  die('Could not get data: ' . mysql_error());
	}

	closeDB($dbConn);

	return $results;
}






?>