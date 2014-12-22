<?php
error_reporting(E_ALL);
ini_set('display_errors', 0);
session_start();
     if (isset($_REQUEST['logout']))
      $_SESSION['doctor_name'] = null;
?>
 <nav class="navbar  navbar-inverse" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"></a>
        </div>

        <?php

 

        $loggedIn = false;
        if(isset($_SESSION['doctor_name']))
          $loggedIn = true;
        





        if($loggedIn){
          echo '<h4 style="color:white; margin-top:15px; float:left;"> Hi, Dr.'.$_SESSION['doctor_name'].'   </h4>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            
            <li ><a href="index.php"><span class="glyphicon glyphicon-home"></span>
</a></li>
            <li><a href="upcoming.php">Upcoming Appointments</a></li>
              <li><a href="allappointments.php">Student List</a></li>
            <li><a href="groups.php">Groups</a></li>
            <li><a href="campaign.php">Campaign</a></li>
            <li><a href="template.php">Settings</a></li>
            <li><a href="feedback.php">Show Feedback</a></li>
            <li><a href="graph.php">Miscellaneous</a></li>
            <li><a href="index.php?logout=1">Logout</a></li>  
          </ul>
          
          </div>';
        }
        else{
echo '
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li ><a href="index.php"><span class="glyphicon glyphicon-home"></span>
</a></li>
            <li><a href="newappointment.php">New Appointments</a></li>
            <li><a href="schedule.php">Appointment History</a></li>
            <li><a href="survey.php">Student Feedback</a></li>
            <li><a href="login.php">Admin Login</a></li>
          </ul>
          <form class="navbar-search pull-right">
  <input type="text" class="search-query" placeholder="Search">
</form>
          </div>';
        }

    ?>


  </div><!-- /.container -->
    </nav><!-- /.navbar -->