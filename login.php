<?php
include 'connection.php';
?>
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
            <a class="login_a_login" >Login </a> 
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
                            <td class="login_td"><input class="login_input" type="number" name="passid" ></td>
                        </tr>
                        <tr>
                            <th colspan=2><input class="login_input_submit" type="submit" name="submit" value="SUBMIT"></th>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    
        <?php
        if(isset($_POST['sub'])){
            $user = $_POST['user'];
            $password = $_POST['password']
            $passcode = $_POST['passid'];
            $chk_login=mysql_query("select * from user_login where uid='$un' and pwd='$pas'");
        }
        ?>

        <!--Bootstrap CDN -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>
</html>
