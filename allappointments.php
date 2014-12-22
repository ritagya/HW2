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
	<h4 class="filterheading">Create Filter Lists</h4>

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
				<div class="col-sm-2"><br>
						<button type="button" class="btn btn-default" onclick="getFilterData();">Load Filter</button>

				</div>
		</div>
	<div class="row" >
	<br><br>
		<div class="col-sm-2">
			Appointment Date From
			<input class="form-control" type="date" id="appFrom" placeholder="mm/dd/yyyy" />
		</div>
		
		<div class="col-sm-2">
			Appointment Date To
			<input class="form-control" type="date" id="appTo" placeholder="mm/dd/yyyy"  />
		</div>
		<div class="col-sm-2"></div>
		<div class="col-sm-2">
			Birthday From
			<select class="form-control" id="dobFrom">		
					<option value="">None</option>
					<option value="1">Jan</option>
					<option value="2">Feb</option>
					<option value="3">Mar</option>
					<option value="4">Apr</option>
					<option value="5">May</option>
					<option value="6">Jun</option>
					<option value="7">Jul</option>
					<option value="8">Aug</option>
					<option value="9">Sep</option>
					<option value="10">Oct</option>
					<option value="11">Nov</option>
					<option value="12">Dec</option>
			</select>
		</div>
		
		<div class="col-sm-2">
			Birthday To
				<select class="form-control" id="dobTo">
					<option value="">None</option>
					<option value="1">Jan</option>
					<option value="2">Feb</option>
					<option value="3">Mar</option>
					<option value="4">Apr</option>
					<option value="5">May</option>
					<option value="6">Jun</option>
					<option value="7">Jul</option>
					<option value="8">Aug</option>
					<option value="9">Sep</option>
					<option value="10">Oct</option>
					<option value="11">Nov</option>
					<option value="12">Dec</option>
			</select>
		</div>
		</div>
		<div class="row" style="margin-top:25px;">
		<div class="col-sm-6">
			Reason Contains
			<input class="form-control" type="text" id="reason" placeholder="Eg: pain" />
		</div>
		</div>

		<div class="row text-center" style="margin-top:25px;">
		<button type="button" class="btn btn-default" style="margin-right:20px;" data-toggle="modal" data-target="#listModal">Save Filters</button>

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

function getFilterData(){
	var url = "ajax/getfilterdata.php?";
	url += "id=" +$('#drpFilter').val();

	$.get( url, function( data ) {
		  	var arr = data.split('|');
		 	$('#appFrom').val(arr[0]);
		 	$('#appTo').val(arr[1]);
		 	$('#dobFrom').val(arr[2]);
		 	$('#dobTo').val(arr[3]);
		 	$('#reason').val(arr[4]);
		});
	
}
function getResults(){
	var url = "ajax/getlistdata.php?";
	url += "appFrom=" +$('#appFrom').val();
	url += "&appTo=" +$('#appTo').val();
	url += "&dobFrom=" +$('#dobFrom').val();
	url += "&dobTo=" +$('#dobTo').val();
	url += "&reason=" +$('#reason').val();
	$.get( url, function( data ) {
		  $( "#result" ).html( data );
		 
		});
}

function saveList(){
	var url = "ajax/savelist.php?";
	url += "appFrom=" +$('#appFrom').val();
	url += "&appTo=" +$('#appTo').val();
	url += "&dobFrom=" +$('#dobFrom').val();
	url += "&dobTo=" +$('#dobTo').val();
	url += "&reason=" +$('#reason').val();
	url += "&name=" +$('#listName').val();
	$.get( url, function( data ) {
		$('#listModal').modal('hide');
		alert(data);
		 
		});
}
</script>