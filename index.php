<!DOCTYPE html>
<?php
include 'db.php';
date_default_timezone_set('America/Los_Angeles');

?>
<html>
<head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="css/style.css">
<link href='http://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js">
</script>

<script src="js/jquery.bxslider.min.js"></script>
<!-- bxSlider CSS file -->
<link href="js/jquery.bxslider.css" rel="stylesheet" />
<script type="text/javascript">
    $(document).ready(function(){
  $('#bxSlider').bxSlider({
    slideWidth: 1000
  });
});
</script>
</head>

<body>

<?php include 'menu.php'; ?>


<div class="container">


			<div style="background-color:rgba(255,255,255,0.6); padding:0px;">
            <h2 style="font-size:40px;">Welcome to University Health Services</h2>
            <p><h4>You can create appointments and manage them.</h4></p>
			</div>         

</a>


<div>
<ul id="bxSlider">
 <li><a href='upcoming.php' ><img alt='image0 (9K)' src='img/15.jpg' height='350' width='1000' border='0'/></a> </li>
 <li><a href='newappointment.php'><img alt='image1 (9K)' src='img/16.jpg' height='350' width='1000' border='0'/></a> </li>
 <li><a href='schedule.php'><img alt='image2 (9K)' src='img/13.jpg' height='350' width='1000' border='0'/></a> </li>
 <li><a href='survey.php'><img alt='image3 (9K)' src='img/14.jpg' height='350' width='1000' border='0' /></a> </li>
 <li><a href='index.php'><img alt='image4 (9K)' src='img/10.jpg' height='350' width='1000' border='0' /></a> </li>
 <li><a href='index.php'><img alt='image4 (9K)' src='img/7.jpg' height='350' width='1000' border='0'/></a> </li>
 <li><a href='index.php'><img alt='image4 (9K)' src='img/1.jpg' height='350' width='1000' border='0'/></a> </li>
</ul>
</div>
	


</div>

<?php include 'footer.php'; ?>

</body>

</html>