<?php
    session_start();
    include_once "config.php";
    $sql = mysqli_query($conn, "SELECT * FROM users ");

    if(mysqli_num_rows($sql) == 1){
        $output .= "No users are available to chat";
    }
    else if(mysqli_num_rows($sql) > 0){  // otherwise we'll show all users
        while($row = mysqli_fetch_assoc($sql)){
            $output .= '
                    <a href="#">
                        <div class="content">
                            <img src="php/images/' . $row['img'] .'" alt="">
                            <div class="details">
                                <span>' . $row['faname'] . " " . $row['lname'] . '</span>
                                <p>This is test message</p>
                            </div>
                        </div>
                        <div class="status-dot"><i class="fas fa-circle"></i></div>
                    </a>
            ';
        }
    }
    echo "";
?>