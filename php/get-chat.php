<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id = mysqli_real_escape_string($conn,$_POST['outgoing_id']);
        $incoming_id = mysqli_real_escape_string($conn,$_POST['incoming_id']);
        $message = mysqli_real_escape_string($conn,$_POST['message']);
        $output = "";

        $sql = "SELECT * FROM messages WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
                OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id";
        $results =mysqli_query($conn,$sql);
        if(mysqli_num_rows($results) > 0){
            while($row = mysqli_fetch_array($results)){
                if($row['outgoing_msg_id'] === $outgoing_id){//if equal the user is the msg sender
                    $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <p>'. $row['msg'] .'</p>
                                </div>
                                </div>' ;
                }else{ //if not the user the receiver
                    $output .= '<div class="chat incoming">
                                <img src="img/3.png" alt="">
                                <div class="details">
                                    <p>'. $row['msg'] .'</p>
                                </div>
                                </div>' ;
                }
            }
            echo $output;
        }
    }else{
        header("../login.php");
    }
?>