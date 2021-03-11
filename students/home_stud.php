
<?php
  session_start();
  if(!isset($_SESSION['username'])){
	  header("location:../login.php");
  }
?>
<html>
<body>
<img id="img1" src="images/student.jpg">
</body>
</html>

