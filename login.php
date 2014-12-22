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
<h3>Login </h3>



	<div class="row">
		<div class="col-md-6">

<form id="login" role="form" action='login.php' method="post"
 data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
                    data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
                    data-bv-feedbackicons-validating="glyphicon glyphicon-refresh"
>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $demail = $_POST['doctor_email'];
    $password = $_POST['password'];


$results = login($demail,$password);

while($row = mysql_fetch_array($results, MYSQL_ASSOC)){
$_SESSION["doctor_name"] = $row['doctor_name'];
  }

  if(isset($_SESSION["doctor_name"]) == false)
    echo " <p class='bg-danger' style='padding:15px;'>Sorry. This email and password does not exist.</p>";
  else
    header('Location: index.php');


}
?>



<div class="form-group">
    <label>Email address</label>
    <input type="email" class="form-control" name="doctor_email" placeholder="Enter email"
                                data-bv-notempty="true"
                                data-bv-notempty-message="This field is required and cannot be empty">
  </div>  

  
<div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control" name="password" placeholder="Enter Password"
                                data-bv-notempty="true"
                                data-bv-notempty-message="Password is required">
  </div>  


  <button type="submit" class="btn btn-default">Submit</button>

  
</form>
</div>
</div>


</body>

</html>