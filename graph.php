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

<script src="jquery.flot.min.js"></script>
<script src="jquery.flot.time.min.js"></script>


<script>

$(document).ready(function(){


$.ajax({
  url: "ajax.php?fn=getAppointmentDayWise",
  success: function(data){
	var flotData = [];
	for(var i=0;i<data.length;i++){
		flotData.push([new Date(data[i].appointment_d).getTime(),parseInt(data[i].count)]);
	}		
	var plot = $.plot("#placeholder",[ flotData ], {
			xaxis: {
			    mode: "time",
			    timeformat: "%m/%d/%Y"
			},
			grid: {
				hoverable: true,
				clickable: true
			}
		});

	},
  dataType: 'json'
});


});
</script>
</head>

<body>

<?php include 'menu.php'; ?>
<div class="container">
	
<div id="placeholder" style="width: 600px; height: 400px;"></div>

 </div>
</body>

</html>