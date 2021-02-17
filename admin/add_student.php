<?php
session_start();
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
</head>
<style>
    table{
        background-color: white;
        margin-left: auto;
        margin-right: auto;
        margin-top:1em;
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
</style>
<body>
    <h2>ADD STUDENT</h2>
    <form name="form" action="#" method="POST">
        <table>
            <tr>
                <th>Name</th>
                <td><input type="text" name="fname"> </td>
            </tr>
            <tr>
                <th>Email</th>
                <td><input type="email" name="email"> </td>
            </tr>
            <tr>
                <th>Mob NO </th>
                <td><input type="tel" name="mob"> </td>
            </tr>
            <tr>
                <th>Username </th>
                <td><input type="text" name="user"> </td>
            </tr>
            <tr>
                <th>Password </th>
                <td><input type="password" name="password"> </td>
            </tr>
            <tr>
                <th>PassID </th>
                <td><input type="password" name="passid"> </td>
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
        $name = $_POST['fname'];  
        $email = $_POST['email'];  
        $mobile = $_POST['mob'];  
        $user = $_POST['user'];  
        $password = $_POST['password'];
        $passid = $_POST['passid'];

            $query = "insert into user_details values('$name','$email','$mobile','$user')";
            if(mysqli_query($con,$query)){
                echo "success";
            }
            else{
                echo "error".$query.mysqli_error($con);
            }
            $query_acc = "insert into user_login values('$user','$password','$passid','1001')";
            if(mysqli_query($con,$query_acc)){
                echo "success";
            }
            else{
                echo "error".$query.mysqli_error($con);
            }
    }
?>
   
</body>
</html>