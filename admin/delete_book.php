 <?php
  session_start();
  if(!isset($_SESSION['username'])){
	  header("location:../login.php");
  }
  $con = Mysqli_Connect("localhost","root","","library_management");
    if(!$con){
        echo "Connection error !";
    }
	else
	{
   if(isset($_GET["id"]))
   {
			$getid=$_GET["id"];
			echo"$getid";
			$sql="delete from book_details where book_id=$getid";
			if(mysqli_query($con,$sql));
	}
?>
			