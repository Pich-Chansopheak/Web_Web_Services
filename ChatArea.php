<?php
    session_start();
    if(!isset($_SESSION['unique_id'])){
        header("location: login.php");
    }
?>
<?php
    include_once"includes/head.php";
?>
<body>
    <div class="wrapper">
        <section class="chat-area">
            <header>
            <?php
                include_once "php/config.php";
                $user_id = mysqli_real_escape_string($conn,$_GET['user_id']);
                $sql = "SELECT * FROM users WHERE unique_id = {$user_id}";
                $results = mysqli_query($conn,$sql);
                if(mysqli_num_rows($results)>0){
                    $row = mysqli_fetch_array($results);
                }
            ?>
                <a href="users.php"><i class="fa-solid fa-arrow-left"></i></i></a>
                <img src="php/images/<?php echo $row['img'] ?>" alt="">
                <div class="details">
                    <span><?php echo $row['fname'] ." ". $row['lname'] ?></span>
                    <p><?php echo $row['status'] ?></p>
                </div>
            </header>
            <div class="chat-box">
                
            </div>
            <form action="#" class="typing" autocomplete="off">
                <input type="text" name="outgoing_id" value="<?= $_SESSION['unique_id']; ?>" hidden>
                <input type="text" name="incoming_id" value="<?= $user_id; ?>" hidden>
                <input type="text" name="message" class="input-field" placeholder="Type a message here...">
                <button><i class="fa-solid fa-paper-plane"></i></button>
            </form>
        </section>
    </div>
    <script src="js/chat.js"></script>
</body>
</html>