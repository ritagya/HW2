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
<link rel="stylesheet" href="css/style.css">
<link href='http://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<style type="text/css">
table{width:100%;}
table th{background-color: #333; color: #fff;}
table th, table td{padding:8px;}
</style>
</head>

<body>

		<?php include 'menu.php'; ?>
<div class="container">
	<br><br>
	<div style="border:1px solid #eee; padding:20px; position: relative;">
	<h4 class="filterheading">Campaigns</h4>

		<div class="row" >
			<br><br>
			<div class="col-sm-10">
					Existing Filter Lists
					<select class="form-control" id="drpFilter"> 
					<?php
					$results = getAllFilterLists();

					while($row = mysql_fetch_array($results, MYSQL_ASSOC)){
						echo '<option value='.$row['id'].'>'.$row['name'].'</option>';

						}
					?>
					</select>
			</div>
				
		</div>
		<div class="row" style="margin-top:25px;"></div>

		<div class="row text-center" style="margin-top:25px;">

		<button type="button" class="btn btn-primary" onclick="getResults();">Get Data</button>


		</div>
	</div>
	<br><br>
		
		<div id="result"></div>



</div>

<div class="modal fade" id="listModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Enter Filter Name</h4>
      </div>
      <div class="modal-body">
        <p><input type="text" id="listName" class="form-control" /></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="saveList();">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php include 'footer.php'; ?>
</body>

</html>


<script>


function getResults(){
	var url = "ajax/getlistdatafromfilter.php?";
	url += "id=" +$('#drpFilter').val();

	$.get( url, function( data ) {
		  $( "#result" ).html( data );
		 
		});
}


function sendTemplateEmail(){
	var url = "ajax/sendemailcampaign.php?";
	url += "filterid=" +$('#drpFilter').val();
	url += "&templateid=" +$('#drpTemplate').val();

	$('#btnEmail').attr('disabled','disabled');
	$('#btnEmail').html('Processing');
	$.get( url, function( data ) {
		  alert(data );
	  $('#btnEmail').removeAttr('disabled');
	$('#btnEmail').html('Send email to this list');
		 
		});
}

</script>