<?php
    // session_start();
    while($row = mysqli_fetch_assoc($sql)){
        $sql2 ="SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']} 
                OR outgoing_msg_id = {$row['unique_id']}) AND (incoming_msg_id = {$outgoing_id}
                OR outgoing_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
        $qurey2 = mysqli_query($conn,$sql2);
        $row2 =mysqli_fetch_array($qurey2);
        if(mysqli_num_rows($qurey2) > 0){
            $result2 = $row2['msg'];
        }else{
            $result2 = "No message available";
        }
        // trimming msg if the word than 28 charater
        (strlen($result2) > 28) ? $msg =substr($result2,0,28).'...' : $msg = $result2;
        // adding you: text before msg if you are the one who send the message
        ($outgoing_id == $row2['outgoing_msg_id']) ? $you ="You: " : $you="";
        //check user status is online or not
        ($row['status'] == "Offline now") ? $offline = "offline": $offline="";
        $output .= '
                <a href="ChatArea.php?user_id=' . $row['unique_id'] . '">
                    <div class="content">
                        <img src="php/images/' . $row['img'] .'" alt="">
                        <div class="details">
                            <span>' . $row['fname'] . " " . $row['lname'] . '</span>
                            <p>'. $you . $msg .'</p>
                        </div>
                    </div>
                    <div class="status-dot '.$offline.'"><i class="fas fa-circle"></i></div>
                </a>
        ';
    }
?>