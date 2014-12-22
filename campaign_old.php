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




</head>

<body>

<?php include 'menu.php'; ?>
<div class="container">
	<!-- all code goes here -->

				<h4>Manage actions:</h4>


 <b> <span class="badge">1</span> <button type="button" class="btn btn-default">Send reminder email to students having upcoming appointments </button></b><br><br><br>
 <span class="badge">2</span> <button type="button" class="btn btn-default">Send birthday greetings to students having upcoming birthdays </button></b><br><br><br>
 <span class="badge">3</span> <button type="button" class="btn btn-default">Send upcoming event notification to eligible students</button></b><br><br><br>


</body>

</html>