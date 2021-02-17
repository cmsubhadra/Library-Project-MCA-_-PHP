<html lang="en">
<head>
    <link href="library/search.css" type="text/css" rel="stylesheet">
    <style>
    tr,td{
        padding:1em;
    }
    </style>
</head>
<body>
<div class="text-center search-div">
        <h5 class="search-here">Search here</h5>
    </div>
<input type="text" name="search" id="myInput" onkeyup="myFunction()" placeholder="Search.." class="search-bar">

<script src="library/search.js"></script>

</body>
</html>

<?php
    $con = Mysqli_Connect("localhost","root","","library_management");
    if(!$con){
        echo "Connection error !";
    }
    else{
        $query = "select * from book_details";
        $values = mysqli_query($con,$query);
        echo '<table border="1" id="myTable" style="margin-left:auto;margin-right:auto;margin-top:3em;border-collapse:collapse;"><th>ID</th><th>TITLE</th><th>AUTHOR NO</th><th>EDITION</th><th>PUBLISHER</th>';
        if(mysqli_num_rows($values)){
                while($row=mysqli_fetch_assoc($values)){
                    echo '<tr>';
                        echo '<td>';
                            echo $row["book_id"];
                        echo '</td>';
                        echo '<td>';
                            echo $row["book_name"];
                        echo '</td>';
                        echo '<td>';
                            echo $row["book_author"];
                        echo '</td>';
                        echo '<td>';
                            echo $row["book_edition"];
                        echo '</td>';
                        echo '<td>';
                            echo $row["book_publisher"];
                        echo '</td>';
                    echo '</tr>';
                }
        }
        else{
                echo "error".$query.mysqli_error($con);
        }
    }

?>