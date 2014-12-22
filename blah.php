<?php 
$to='ritagyameharishi@yahoo.co.in';
$subject='Appointment reminder';
$message='this email is an appointmnet reminder';
$header='From: mritagya@gmail.com';

if (mail($to, $subject, $message, $header)) {
  echo 'Email has been sent to' . $to;
}
else { echo 'There was an error sending the email'; 
}
?>


<!DOCTYPE html>
<head>
<title>Email</title>
</head>
<body>

<form action="" method="post">
To: <input type="text" name="to"><br>
Subject: <input type="text" name="subject" <textarea rows="2" name="subject" cols="80"></textarea>
Message:<br><textarea rows="10" name="message" cols="80"></textarea><br>
<input type="submit" name="submit" value="Submit">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $to = $_POST['to'];
    $subject = $_POST['subject'];
    $messsage = $_POST['message'];
    $header = $_POST['header'];



$results = mail($to, $subject, $message, $header)

  }

  
?>

</body>
</html> 