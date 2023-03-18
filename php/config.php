<?php
    $connection ="localhost";
    $username="root";
    $pwd="";
    $db="chat";
    $conn =mysqli_connect($connection,$username,$pwd,$db);
    if($conn){
        echo"Database Connected" . mysqli_connect_error();
    }
?>