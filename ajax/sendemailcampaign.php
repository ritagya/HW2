<?php
include '../db.php';
require_once '../swift/lib/swift_required.php';
date_default_timezone_set('America/Los_Angeles');

?>


<?php
$filterid = $_GET['filterid'];
$templateid = $_GET['templateid'];
					$results = getFilterData($filterid);

					while($row = mysql_fetch_array($results, MYSQL_ASSOC)){
						$appFrom = $row['appFrom'];
						$appTo = $row['appTo'];
						$dobFrom = $row['dobFrom'];
						$dobTo = $row['dobTo'];
						$reason = $row['reason'];


						}

$results = getTemplateFromID($templateid);
    while($row = mysql_fetch_array($results, MYSQL_ASSOC)){       
       $template_subject = $row['subject'];
        $body = $row['body'];
        
      }



?>




<?php

$results = studentListWithFilter($appFrom,$appTo,$dobFrom,$dobTo,$reason);

while($row = mysql_fetch_array($results, MYSQL_ASSOC)){
	
	$stu_name = $row['student_name'];
	$app_Date = $row['appointment_d'];
	$app_time = $row['appointment_t'];
	$stu_email= $row['student_email'];

	 $body = str_ireplace("{name}",$stu_name, $body );
 	 $body = str_ireplace("{appointmentdate}",$app_Date, $body );
 	 $body = str_ireplace("{appointmenttime}",$app_time, $body );


	
$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
  ->setUsername('uhscsulb@gmail.com')
  ->setPassword('csulb_uhs');

$mailer = Swift_Mailer::newInstance($transport);

$message = Swift_Message::newInstance( $template_subject)
  ->setFrom(array('uhscsulb@gmail.com' => 'University Health Services'))
  ->setTo(array($stu_email))
  ->setBody($body,'text/html');

$result = $mailer->send($message);

}

echo 'Done processing emails.';
?>



