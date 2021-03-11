<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>login</title>
        <!--Internal library -->
        <link href="library/style.css" type="text/css" rel="stylesheet">
        <!--Bootstrap CDN -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        
    </head>
    <body>
      
        <div class="login_div">
            <br>
            <a class="login_a_login" >Login </a> || <a href="signup.php" class="login_a_login" style="color:red;">Sign Up </a> 
            <br><br>
            <form method="POST" action="#">
                <table class="login_table" cellpadding=20 >
                    <tbody>
                        <tr>
                            <td>Username </td>
                            <td><input class="login_input" type="text" name="user" ></td>
                        </tr>
                        <tr>
                            <td class="login_td">Password </td> 
                            <td class="login_td"><input class="login_input" type="password" name="password" ></td>
                        </tr>
                        <tr>
                            <td class="login_td">Pass ID </td> 
                            <td class="login_td"><input class="login_input" type="text" name="passid" ></td>
                        </tr>
                        <tr>
                            <th colspan=2><input class="login_input_submit" type="submit" name="submit" value="SUBMIT"></th>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    
        <?php
        session_start();
        include ("connection.php");

        if(isset($_POST['submit'])){

            $user = $_POST['user'];
            $password = $_POST['password'];
            $passcode = $_POST['passid'];
            $check_login_query="select * from user_login where user_id='$user' and user_password='$password' and user_passid='$passcode'";
            $result = mysqli_query($con,$check_login_query);
            $login_rows = mysqli_fetch_row($result);
            $count = mysqli_num_rows($result);

            if($count>0){
                $_SESSION["id"] = $login_rows[2];
                $_SESSION["username"] = $login_rows[0];
                if($login_rows[3]=="0110")
                {
                    if(isset($_SESSION["id"])) {
                    header("location:admin\\index.php");
                    }
                }
                if($login_rows[3]=="1001")
                {
                    if(isset($_SESSION["id"])) {
                    header("location:students\\index.php");
                    }
                }
            }
            else{
                echo '<script>alert("Authentication Failed Sorry !!");</script>';
                //header("location:login.php?error=1");
            }
        }
        ?>

        <!--Bootstrap CDN -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>
</html>
