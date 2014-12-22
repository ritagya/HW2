<!DOCTYPE html>
<?php
include 'db.php';
date_default_timezone_set('America/Los_Angeles');
error_reporting(E_ALL);
ini_set('display_errors', 1);
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
    $('#Feedback').bootstrapValidator();
});
</script>
</head>
</head>

<body>

<?php include 'menu.php'; ?>
<div class="container">
	

<div class="jumbotron" style="background-image:url('shs.jpg'); background-size: cover; background-position:center;">
			<div style="background-color:rgba(255,255,255,0.6); padding:20px;">
            <h2 style="font-size:60px;">Student Feedback </h2>
            <p> </p>
			</div>

          </div>


<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_id = $_POST['student_id'];
    $sex = $_POST['sex'];
    $visits = $_POST['visits'];
    $insurance = $_POST['insurance'];
        $Accessibility = $_POST['Accessibility'];
        $instate_insurance = $_POST['instate_insurance'];
        $app_process = $_POST['app_process'];
        $follow_up = $_POST['follow_up'];
        $experience = $_POST['experience'];
$improvement = $_POST['improvement'];
$suggestions = $_POST['Suggestions'];
insertFeedback($student_id,$sex,$visits,$insurance,$Accessibility,$instate_insurance,$app_process,$follow_up,$experience,$improvement,$suggestions);

echo " <p class='bg-success' style='padding:15px;'>Thank you.</p>";
     exit();
  }
?>


	<div class="row">
		<div class="col-md-6">
<form id="feedbackForm" role="form" action='survey.php' method="post"
 data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
                    data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
                    data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
			<h4>Fill out the survery form:</h4>


    <label>Student ID</label>
    <input type="id" class="form-control" name="student_id" placeholder="Enter Student ID"
                                data-bv-notempty="true"
                                data-bv-notempty-message="This field is required and cannot be empty">
  </div> <br> <br> <br> <br> <br> <br>



                    <div class="form-group">
                    	<b> <span class="badge">1</span> Enter your sex</b>
                    	<div class="radio">
						  <label>
						    <input type="radio" name="sex" value="male">
						    male
						  </label>
						</div>
						<div class="radio ">
						  <label>
						    <input type="radio" name="sex" value="female" >
						   female
						  </label>
						</div>
                    </div>

<div class="form-group">
                    	<b><span class="badge badge-success">2</span> How often do you come here?</b>
                    	<div class="radio">
						  <label>
						    <input type="radio" name="visits" value="Once a month">
						    Once a month
						  </label>
						</div>
						<div class="radio ">
						  <label>
						    <input type="radio" name="visits" value="every two months" >
						    every two months
						  </label>
						</div>
						<div class="radio ">
						  <label>
						    <input type="radio" name="visits" value="In six months" >
						    In six months
						  </label>
						</div>
						<div class="radio ">
						  <label>
						    <input type="radio" name="visits" value="more than six months" >
						    more than six months
						  </label>
						</div>
                    </div>


<div class="form-group">
                    	<b><span class="badge badge-warning">3</span> Select your health insurance plan</b>
                    	<div class="radio">
						  <label>
						    <input type="radio" name="insurance" value="University health insurance (under 21)">
						    University health insurance (under 21)
						  </label>
						</div>
						<div class="radio ">
						  <label>
						    <input type="radio" name="insurance" value=" University health insurance (over 21)" >
						   University health insurance (over 21)
						  </label>
						</div>
						<div class="radio">
						  <label>
						    <input type="radio" name="insurance" value="No insurance">
						   No insurance
						  </label>
						</div>
                    </div>


<div class="form-group">
                    	<b><span class="badge badge-important">4</span> Accessibility to desired services?</b>
                    	<div class="radio">
						  <label>
						    <input type="radio" name="Accessibility" value="Easy">
						    Easy
						  </label>
						</div>
						<div class="radio ">
						  <label>
						    <input type="radio" name="Accessibility" value=" Satisfactory" >
						    Satisfactory
						  </label>
						</div>
						<div class="radio ">
						  <label>
						    <input type="radio" name="Accessibility" value=" Difficult" >
						    Difficult
						  </label>
						</div>
                    </div>

<div class="form-group">
                    	<b><span class="badge badge-info">5</span> Are you under the in-state insurance pact?</b>
                    	<div class="radio">
						  <label>
						    <input type="radio" name="instate_insurance" value="yes">
						    yes
						  </label>
						</div>
						<div class="radio ">
						  <label>
						    <input type="radio" name="instate_insurance" value="no" >
						    no
						  </label>
						</div>
                    </div>

<div class="form-group">
                    	<b><span class="badge">6</span> Rate the appointment taking process</b>
                    	<div class="radio">
						  <label>
						    <input type="radio" name="app_process" value="Easy and quick">
						    Easy and quick
						  </label>
						</div>
						<div class="radio ">
						  <label>
						    <input type="radio" name="app_process" value=" Mediocre" >
						    Mediocre
						  </label>
						</div>
						<div class="radio ">
						  <label>
						    <input type="radio" name="app_process" value="Difficult and tiresome" >
						    Difficult and tiresome
						  </label>
						</div>
                    </div>

<div class="form-group">
                    	<b><span class="badge badge-success">7</span> How often do you get a follow up from us?</b>
                    	<div class="radio">
						  <label>
						    <input type="radio" name="follow_up" value="Within 2 weeks of your appointment">
						    Within 2 weeks of your appointment
						  </label>
						</div>
						<div class="radio ">
						  <label>
						    <input type="radio" name="follow_up" value=" Within a month" >
						    Within a month
						  </label>
						</div>
						<div class="radio ">
						  <label>
						    <input type="radio" name="follow_up" value="Almost never" >
						    Almost never
						  </label>
						</div>
                    </div>


<div class="form-group">

                    <b><span class="badge badge-warning">8</span> Rate your overall experience at university health services </b>
                    	<div class="radio">
						  <label>
						    <input type="radio" name="experience" value="Excellent">
						    Excellent
						  </label>
						</div>
						<div class="radio ">
						  <label>
						    <input type="radio" name="experience" value="Good" >
						    Good
						  </label>
						</div>
						<div class="radio">
						  <label>
						    <input type="radio" name="experience" value="Neutral">
						    Neutral
						  </label>
						</div>
						<div class="radio">
						  <label>
						    <input type="radio" name="experience" value=" Not satisfactory">
						    Not satisfactory
						  </label>
						</div>
                    </div>

<div class="form-group">
                    	<b><span class="badge badge-info">9</span> How can we improve our services?</b>

                    	<br />
  <textarea name='improvement' rows="6" cols="90"></textarea><br />



<div class="form-group">
                    	<b> <span class="badge">10</span>Suggestions and Complaints</b>
                    	<br />
  <textarea name='Suggestions'  rows="6" cols="90"></textarea> <br />


                    </div>

                    	
  <button type="submit" class="btn btn-default">Submit</button>

</form>
</div>
</div>

      </div>
</body>

</html>