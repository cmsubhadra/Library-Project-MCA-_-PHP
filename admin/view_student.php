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
    tr,td{
        padding:1em;
    }
    .main-head{
  	    /*color:#00FFFF;
	    text-shadow:0 0 5px #000000, 0 0 5px #000000;
        font-family:Courier New;*/
  	    text-align:center;
        font-family:Courier New;
        margin-top:1em;
	    
	    font-size:30px;
        }
        .b-head{
            background:rgba(255,255,255,.5);
            color:black;
            padding:3px;
            border-radius:15px;
            text-transform:uppercase;
            border-bottom:2px solid red;
        }
        .div-box{
            padding:10px;
            background:white;
            text-align:center;
            width:80%;
            margin:auto;
        }
        #main-tb tr{
            border-bottom:1px solid rgb(199, 116, 8);
            text-align:center;
        }
        #main-tb td{
            padding-top:30px;
        }
    </style>
</head>
<body>
    <h2 class="main-head"><b class="b-head">Students registered</b></h2>
</body>
</html>

<?php
    $con = Mysqli_Connect("localhost","root","","library_management");
    if(!$con){
        echo "Connection error !";
    }
    else{
        echo "<div class=\"div-box\">";
        $query = "select * from user_details";
        $values = mysqli_query($con,$query);
        echo '<table id="main-tb" style="margin-left:auto;margin-right:auto;margin-top:3em;border-collapse:collapse;"><th>Name</th><th>Email</th><th>Mob NO</th><th>User Name</th>';
        if(mysqli_num_rows($values)){
                while($row=mysqli_fetch_assoc($values)){
                    echo '<tr>';
                        echo '<td>';
                            echo $row["name"];
                        echo '</td>';
                        echo '<td>';
                            echo $row["email"];
                        echo '</td>';
                        echo '<td>';
                            echo $row["mobile"];
                        echo '</td>';
                        echo '<td>';
                            echo $row["user"];
                        echo '</td>';
                    echo '</tr>';
                }
                
        echo "</table>";
        echo "</div>";
        }
        else{
                echo "error".$query.mysqli_error($con);
        }
    }

?>