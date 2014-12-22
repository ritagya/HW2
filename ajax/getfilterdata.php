<?php
include '../db.php';
date_default_timezone_set('America/Los_Angeles');

?>


<?php
$id = $_GET['id'];
					$results = getFilterData($id);

					while($row = mysql_fetch_array($results, MYSQL_ASSOC)){
						echo $row['appFrom'].'|';
						echo $row['appTo'].'|';
						echo $row['dobFrom'].'|';
						echo $row['dobTo'].'|';
						echo $row['reason'].'|';

						}
					?>


?>