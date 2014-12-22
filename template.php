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
<script type="text/javascript" src="js/jquery-te-1.4.0.min.js"></script>
<link href='js/jquery-te-1.4.0.css' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/style.css">
<link href='http://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>


<style type="text/css">
table{width:100%;}
table th{background-color: #333; color: #fff;}
table th, table td{padding:8px;}
</style>

<script>
$(document).ready(function() {
    $('#template').bootstrapValidator();
     $(".jqeditor").jqte();
});
</script>

</head>

<body>

<?php include 'menu.php'; ?>
<div class="container">
	<!-- all code goes here -->
<h3>Manage Templates</h3><br>


<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $template_id = $_POST['template_id'];
  if($_POST["delete"] != null){
deleteTemplate($template_id);
echo " <p class='bg-success' style='padding:15px;'>Template has been deleted.</p>";
 exit();
  }
 
    $template_subject = $_POST['template_subject'];
    $template_body = $_POST['template_body'];
     $template_name = $_POST['template_name'];
     if($template_id == null){
insertTemplate($template_subject,$template_body,$template_name);
echo " <p class='bg-success' style='padding:15px;'>Template has been saved.</p>";
}
else{
updateTemplate($template_id,$template_subject,$template_body,$template_name);
echo " <p class='bg-success' style='padding:15px;'>Template has been updated.</p>";

}

     exit();
  }

  if($_GET['edit'] != null){
      $id = $_GET['id'] ;

      $results = getTemplateFromID($id);
    while($row = mysql_fetch_array($results, MYSQL_ASSOC)){       
       $template_subject = $row['subject'];
        $body = $row['body'];
        $name = $row['template_name'];
        $id = $row['template_id'];      
      }




  }


?>


	<div class="row">
		<div class="col-md-6">



<div class="form-group">
    <label>Appointment Scheduled for December 2014</label>
  </div>  

<form id="template"d method="POST" action="template.php">
<?php
  if($_GET['edit'] != null)
      echo '<input type="hidden" name="template_id" value='.$id.' />';
?>
<div class="form-group">
    <label>Email Template Name</label>
    <input type="text" class="form-control" name="template_name" placeholder="Eg: Remainder Email"
                                data-bv-notempty="true"
                                data-bv-notempty-message="This field is required and cannot be empty"
                                value="<?php echo $name ?>" 
                                >
  </div>  

  <div class="form-group">
    <label>Email Template Subject</label>
    <input type="text" class="form-control" name="template_subject" placeholder="Eg: Remainder for you appointment"
                                data-bv-notempty="true"
                                data-bv-notempty-message="This field is required and cannot be empty"
                                value="<?php echo $template_subject ?>" >
  </div>  


<div class="form-group">
    <label>Email Template Body</label>
    <p>Allowed variables are {name}, {appointmentdate},{appointmenttime}</p>
    <textarea  class="form-control jqeditor" name="template_body"
        height="500px" rows="40" width="700px"
                                data-bv-notempty="true"
                                data-bv-notempty-message="This field is required and cannot be empty"><?php echo $body ?></textarea>
  </div>  


<button type="submit" class="btn btn-default">Save Template</button>

  
</form>
</div>
</div>
<br><br>
<h4>Existing Templates</h4>

<table>
  <thead>
  <tr>
    <th>Name</th>
    <th>Subject</th>
    <th>Body</th>
    <th></th>
    <th></th>

  </tr>
</thead>
<?php
$results = getTemplates();

while($row = mysql_fetch_array($results, MYSQL_ASSOC)){
  echo '<tr>';
  echo '<td>'.$row['template_name'].'</td>';
  echo '<td>'.$row['subject'].'</td>';
  echo '<td>'.$row['body'].'</td>';
  echo '<td><a href="template.php?edit=1&id='.$row['template_id'].'"><button class="btn btn-default dropdown-toggle">Edit</button></a></td>';
  echo '<td>
<form method="POST" action="template.php">
<input type="hidden" name="delete" value=1 />
<input type="hidden" name="template_id" value='.$row['template_id'].' />
<button type="submit"  class="btn btn-default dropdown-toggle">Delete</button>
</form>
</td>';

    echo '</tr>';

}

?>
</table>
</div>

<?php include 'footer.php'; ?>

</body>

</html>