<!DOCTYPE html>
<?php


include 'db.php';
   require_once "Mail.php";

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
    $('#login').bootstrapValidator();
});
</script>

</head>

<body>

<?php include 'menu.php'; ?>
<div class="container">
  <!-- all code goes here -->
<h3>Email reminder </h3>



  <div class="row">
    <div class="col-md-6">

<form id="email" role="form" action='1.php' method="post"
 data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
                    data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
                    data-bv-feedbackicons-validating="glyphicon glyphicon-refresh"
>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


$from = '<from.gmail.com>';
$to = $_POST['to'];
$subject = $_POST['subject'];
$body = $_POST['message'];

$headers = array(
    'From' => $from,
    'To' => $to,
    'Subject' => $subject
);

$smtp = Mail::factory('smtp', array(
        'host' => 'ssl://smtp.gmail.com',
        'port' => '465',
        'auth' => true,
        'username' => 'reminderappointment0@gmail.com',
        'password' => 'ritagya123'
    ));

$mail = $smtp->send($to, $headers, $body);

if (PEAR::isError($mail)) {
    echo('<p>' . $mail->getMessage() . '</p>');
} else {
    echo('<p>Message successfully sent!</p>');
}

}
?>



<div class="form-group">
    <label>To:</label>
    <input type="email" class="form-control" name="to" placeholder="Enter email"
                                data-bv-notempty="true"
                                data-bv-notempty-message="This field is required and cannot be empty">
  </div>  

  
<div class="form-group">
    <label>Subject</label>
    <input type="subject" class="form-control" name="subject" placeholder="Enter subject"
                                data-bv-notempty="true"
                                data-bv-notempty-message="send without seubject?">
  </div>  

  <div class="form-group">
    <label>Message</label>
    <input type="message" class="form-control" name="message" placeholder="Enter message"
                                data-bv-notempty="true"
                                data-bv-notempty-message="send blank mail?">
  </div>  


  <button type="submit" class="btn btn-default">Send</button>

  
</form>
</div>
</div>


</body>

</html>

