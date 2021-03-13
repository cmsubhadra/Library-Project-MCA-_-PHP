<?php
  session_start();
  if(!isset($_SESSION['username'])){
	  header("location:../login.php");
  }
?>

<html lang="en">
<head>
    <link href="library/table.css" type="text/css" rel="stylesheet">
    <style>
    td
      {
       text-align:center;
      }
    </style>
</head>
<body>
</body>
</html>

<?php
    $con = Mysqli_Connect("localhost","root","","library_management");
    if(!$con){
        echo "Connection error !";
    }
    else{
        $query = "select * from user_approve";
        $values = mysqli_query($con,$query);
        echo '<table border="1" id="myTable" style="margin-left:auto;margin-right:auto;margin-top:3em;border-collapse:collapse;"><th>Name</th><th>Mobile</th><th>Email</th><th>User name</th><th>Decision</th>';
        if(mysqli_num_rows($values)){
           
                while($row=mysqli_fetch_assoc($values)){
                    
                    echo '<form action="#" method="POST"><tr>';
                        echo '<td>';
                            echo $row["name"];
                        echo '</td>';
                        echo '<td>';
                            echo $row["mobile"];
                        echo '</td>';
                        echo '<td>';
                            echo $row["email"];
                        echo '</td>';
                        echo '<td>';
                        ?>
                            <input style="border:none" readonly name="user" required type="text" placeholder="page name" value="<?php echo $row['user']; ?>">
                        <?php
                        echo '</td>';
                        echo '<td>';
                            echo "<input type='submit' name='accept' value='Accept' style='background-color:green;color:white;border:none'> <input type='submit' name='reject' value='Reject' style='color:white;background-color:red;border:none'>";
                        echo '</td>';
                    echo '</tr></form>';
                }
;                echo '</table>';
        }
        else{
                echo "<script>alert('Nothing is active !');</script>";
        }
    }

?>

<?php
    if(array_key_exists('accept', $_POST)) { 
        $name = $_POST['user'];

        $select_query = "select * from user_approve where user='$name'";
        $values = mysqli_query($con,$select_query);
        $row=mysqli_fetch_assoc($values);


        $name = $row['name'];
        $email = $row['email'];
        $mobile = $row['mobile'];
        $user = $row['user'];
        $password = $row['pwd'];
        $passid = $row['pid'];

        $query = "insert into user_details values('$name','$email','$mobile','$user')";
        if(mysqli_query($con,$query)){
            echo "";
        }
        else{
            echo "error".$query.mysqli_error($con);
        }
        $query_acc = "insert into user_login values('$user','$password','$passid','1001')";
        if(mysqli_query($con,$query_acc)){
            echo "";
        }
        else{
            echo "error".$query.mysqli_error($con);
        }
        
        $user = $_POST['user'];
        $select_query = "delete  from user_approve where user='$user'";
        mysqli_query($con,$select_query);

        echo "<script>alert('added succesfully .')</script>";

        
    } 
    else if(array_key_exists('reject', $_POST)) { 
        $user = $_POST['user'];
        $select_query = "delete  from user_approve where user='$user'";
        mysqli_query($con,$select_query);
        echo "<script>alert('rejected succesfully .')</script>"; 
        echo "<script>location.reload();</script>";
    } 

  
?>