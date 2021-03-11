
<?php
  session_start();
  if(!isset($_SESSION['username'])){
	  header("location:../login.php");
  }
?>

<html>
  <head>
    <style>
    body{
      background: url(images/student.jpg);
      background-position:center;
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
      background-color: #464646;
	  }
    </style>
  </head>
  <body>
  </body>
</html>

