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

<h4> Welcome! Upload files for online review: <h4>
	<br>

<form action="demo_form.asp">
  <input type="file" name="pic" accept="image/*">
  <input type="submit">
</form>

<div class="progress progress-striped active">
  <div class="bar" style="width: 40%;"></div>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST')   {
    $idimages = $_POST['idimages'];
    $pictures = $_POST['pictures'];


insertUploads($idimages,$pictures);
echo " <p class='bg-success' style='padding:15px;'>Thank you. </p>";
     exit();
  }
?>

<div class="row">
		<div class="col-md-6">
<form id="upload" role="form" action='submit' method="post"
 data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
                    data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
                    data-bv-feedbackicons-validating="glyphicon glyphicon-refresh"
>




</body>

</html>