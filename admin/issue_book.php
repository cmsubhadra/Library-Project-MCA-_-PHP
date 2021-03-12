<?php
  session_start();
  if(!isset($_SESSION['username'])){
	  header("location:../login.php");
  }
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student registration</title>
</head>
<style>
    table{
        background-color: white;
        margin-left: auto;
        margin-right: auto;
        margin-top:4em;
        padding:1em;
        box-shadow: 0 4px 10px 0 rgba(0,0,0,0.2), 0 4px 20px 0 rgba(0,0,0,0.19);
    }
    tr,td,th{
        padding:1em;
        text-align: left;
    }
    .center th{
        text-align: center;
    }
    h2{
        text-align: center;
        margin-top: 2em;
        background-color:black;
        color: white;
    }

    body{
    background: url(../images/bg.jpg);
    background-position:center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    background-color: #464646;
    }
</style>
<body>
    <form name="form" action="#" method="POST">
        <table>
            <tr>
                <th colspan="2" style="text-align:center">ISSUE BOOK</th>
            </tr>
            <tr>
                <th>User Name</th>
                <td><input type="text" name="uname"> </td>
            </tr>
            <tr>
                <th>Book ID</th>
                <td><input type="text" name="bookid"> </td>
            </tr>
            <tr>
                <th>Issue Date </th>
                <td><input type="text" name="issuedate"> </td>
            </tr>
            
            <tr class="center">
                <th colspan="2"><input type="submit" value="submit" name="submit"></th>
            </tr>
        </table>
    </form>
<?php
    $con = Mysqli_Connect("localhost","root","","library_management");
    if(!$con){
        echo "Connection error !";
    }

    if(isset($_POST['submit'])){

        $uname = $_POST['uname'];  
        $bookid = $_POST['bookid'];  
        $issuedate = $_POST['issuedate'];  
   
            $book_check = "select * from book_details where book_id='$bookid'";
            $book_result = mysqli_query($con,$book_check);
            $book_count = mysqli_num_rows($book_result);

            $user_check = "select * from user_details where user='$uname'";
            $user_result = mysqli_query($con,$user_check);
            $user_count = mysqli_num_rows($user_result);
            

            while($res = mysqli_fetch_array($book_result)){

                $status= $res['book_status'];

            }

            if($user_count < 1 || $book_count < 1){
                if($user_count < 1){
                    echo "<script>alert(\"Username of student wrong !!\");</script>>";
                }
                if($book_count < 1){
                    echo "<script>alert(\"Book ID wrong !!\");</script>";
                }
    
            }
            else if($status == 1){
                echo "<script>alert(\"Book Not Available Now !!\");</script>";
            }
            else{
                $query = "insert into book_issue (book_id,user_name,issue_date,status) values ($bookid,'$uname','$issuedate',1)";
                if(mysqli_query($con,$query)){
                    $result = mysqli_query($con, "UPDATE book_details SET book_status='1' WHERE book_id=$bookid");
                    echo "<script>alert(\"Success\");</script>";
                }
                else{
                    //echo "error".$query.mysqli_error($con);
                    echo "<script>alert(\"Connection error !! contact  administrator !!\");</script>";
                }
            }
    }
?>
   
</body>
</html>