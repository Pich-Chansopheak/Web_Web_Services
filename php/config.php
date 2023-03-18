<?php
    $conn = mysqli_connect("localhost", "root", "" , "chat_app");
    if(!$conn){
        // if it's not connect to db it will show error
        echo "Database connected" . mysqli_connect_error();
    }

?>