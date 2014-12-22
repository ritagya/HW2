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
<script>
$(document).ready(function() {
    $('#registrationForm').bootstrapValidator();
});
</script>
</head>

<body>

<?php include 'menu.php'; ?>
<div class="container">
	<!-- all code goes here -->
<div class="jumbotron" style="background-image:url('4.jpg'); background-size: cover; background-position:center;">
      <div style="background-color:rgba(255,255,255,0.6); padding:40px;">
          <h4>Welcome! Register here to schedule a new appointment.</h4>
        </div></div>


<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST')   {
    $sname = $_POST['studentname'];
    $semail = $_POST['studentemail'];
    $sphone = $_POST['studentphone'];
    $saddress = $_POST['studentaddress'];
        $saddress1 = $_POST['studentaddress1'];
        $saddress2 = $_POST['studentaddress2'];
        $saddress3 = $_POST['studentaddress3'];
        $saddress4 = $_POST['studentaddress4'];
        $sdob = $_POST['DoB'];
$Appointmentdate = $_POST['Appointmentdate'];
$Appointmenttime = $_POST['Appointmenttime'];
 $snotes = $_POST['studentnotes'];

insertAppointment($sname,$semail,$sphone,$saddress,$saddress1,$saddress2,$saddress3,$saddress4,$sdob,$Appointmentdate,$Appointmenttime,$snotes);
echo " <p class='bg-success' style='padding:15px;'>Thank you. We have saved your appointment for ".$Appointmentdate." at ".$Appointmenttime."</p>";
     exit();
  }
?>

	<div class="row">
		<div class="col-md-6">
<form id="registrationForm" role="form" action='newappointment.php' method="post"
 data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
                    data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
                    data-bv-feedbackicons-validating="glyphicon glyphicon-refresh"
>

  <div class="form-group">
    <label>Student Name</label>
    <input type="text" class="form-control" name="studentname" placeholder="Enter name" 
                                data-bv-notempty="true"
                                data-bv-notempty-message="This field is required and cannot be empty" >
  </div>  

<div class="form-group">
    <label>Email address</label>
    <input type="email" class="form-control" name="studentemail" placeholder="Enter email"
                                data-bv-notempty="true"
                                data-bv-notempty-message="This field is required and cannot be empty">
  </div>  

  <div class="form-group">
    <label>Contact</label>
    <input type="text" class="form-control" name="studentphone" placeholder="Enter phone number"
                                data-bv-notempty="true"
                                data-bv-notempty-message="This field is required and cannot be empty">
  </div>  

<div class="form-group">
    <label>Address</label>
    <input type="text" class="form-control" name="studentaddress" placeholder="Enter address line1 "
                                data-bv-notempty="true"
                                data-bv-notempty-message="This field is required and cannot be empty">
   
  </div>  
  <div class="form-group">
    <input type="text" class="form-control" name="studentaddress1" placeholder="Enter address line 2"
                                data-bv-notempty="true"
                                data-bv-notempty-message="This field is required and cannot be empty">
</div>
 <div class="form-group">
    <input type="text" class="form-control" name="studentaddress2" placeholder="Enter city"
                                data-bv-notempty="true"
                                data-bv-notempty-message="This field is required and cannot be empty">
</div>

<div class="form-group">
    <input type="text" class="form-control" name="studentaddress3" placeholder="Enter State"
                                data-bv-notempty="true"
                                data-bv-notempty-message="This field is required and cannot be empty">
</div>
 <div class="form-group">
    <input type="text" class="form-control" name="studentaddress4" placeholder="Enter postal code"
                                data-bv-notempty="true"
                                data-bv-notempty-message="This field is required and cannot be empty">
</div>
<div class="form-group">
    <label>Date of birth</label>
    <input type="text" class="form-control" name="DoB" placeholder="Enter Date of Birth" 
                                data-bv-notempty="true"
                                data-bv-notempty-message="The date of birth is required"

                                data-bv-date="true"
                                data-bv-date-format="MM/DD/YYYY"
                                data-bv-date-message="The date of birth is not valid" />
  </div>  

<div class="form-group">
    <label>Reason for Visit</label>
    <input type="text" class="form-control" name="studentnotes" placeholder="Enter reason"
                                data-bv-notempty="true"
                                data-bv-notempty-message="This field is required and cannot be empty">
  </div> 

  <div class="form-group">
    <label>Date of appointment</label>
    <input type="text" class="form-control" name="Appointmentdate" placeholder="Enter Date of Appointment"
                                data-bv-notempty="true"
                                data-bv-notempty-message="This field is required and cannot be empty"
                                data-bv-date="true"
                                data-bv-date-format="MM/DD/YYYY"
                                data-bv-date-message="The date of appointment is not valid" />
  </div>  

  <div class="form-group">
    <label>Time of appointment</label>
    <input type="time" class="form-control" name="Appointmenttime" placeholder="Enter Time of Appointment"
                                data-bv-notempty="true"
                                data-bv-notempty-message="This field is required and cannot be empty">
  </div>  



  <button type="submit" class="btn btn-default">Submit</button>

  


</form>
</div>
</div>
 </div>
</body>

</html>