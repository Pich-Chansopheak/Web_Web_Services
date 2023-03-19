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
                $sql="SELECT * FROM users WHERE user_id = {$user_id}";
                $results = mysqli_query($conn,$sql);
                if(mysqli_num_rows($results)){
                    $row = mysqli_fetch_array($results);
                }
            ?>
                <a href="users.php"><i class="fa-solid fa-arrow-left"></i></i></a>
                <img src="php/images/<?= $row['img'] ?>" alt="">
                <div class="details">
                    <span><?php echo $row['fname'] ." ". $row['lname'] ?></span>
                    <p><?php echo $row['status'] ?></p>
                </div>
            </header>
            <div class="chat-box">
                <div class="chat outgoing">
                    <div class="details">
                        <p>create a new repository on the command line</p>
                    </div>
                </div>
                <div class="chat incoming">
                    <img src="img/3.png" alt="">
                    <div class="details">
                        <p>create a new repository on the command line</p>
                    </div>
                </div>
                <div class="chat outgoing">
                    <div class="details">
                        <p>create a new repository on the command line</p>
                    </div>
                </div>
                <div class="chat incoming">
                    <img src="img/3.png" alt="">
                    <div class="details">
                        <p>create a new repository on the command line</p>
                    </div>
                </div>
                <div class="chat outgoing">
                    <div class="details">
                        <p>create a new repository on the command line</p>
                    </div>
                </div>
                <div class="chat incoming">
                    <img src="img/3.png" alt="">
                    <div class="details">
                        <p>create a new repository on the command line</p>
                    </div>
                </div>
                <div class="chat outgoing">
                    <div class="details">
                        <p>create a new</p>
                    </div>
                </div>
                <div class="chat incoming">
                    <img src="img/3.png" alt="">
                    <div class="details">
                        <p>Hello world</p>
                    </div>
                </div>
                <div class="chat incoming">
                    <img src="img/3.png" alt="">
                    <div class="details">
                        <p>Web Application</p>
                    </div>
                </div>
            </div>
            <form action="#" class="typing">
                <input type="text" value="<?= $_SESSION['unique_id'] ?>">
                <input type="text" value="<?= $user_id ?>">
                <input type="text" class="input-field" placeholder="Type a message here...">
                <button><i class="fa-solid fa-paper-plane"></i></button>
            </form>
        </section>
    </div>
    <script src="js/chat.js"></script>
</body>
</html>