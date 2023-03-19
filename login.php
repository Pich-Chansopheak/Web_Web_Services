<?php
    include_once"includes/head.php";
?>
<body>
    <div class="wrapper">
        <section class="form login">
            <header>Hang Out Chat Application</header>
            <form action="#">
                <div class="error-txt"></div>
               
                <div class="field input">
                    <label>Email Address</label>
                    <input type="email" name="email"placeholder="Enter your email">
                </div>
                <div class="field input">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter your password">
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field button">
                    <input type="submit" value ="Login"> 
                </div>
            </form>
            <div class="link">Not yet singed up? <a href="index.php">Signup now</a></div>
        </section>
    </div>

    <script src="js/pass-show-hide.js"></script>
    <script src="js/login.js"></script>
    
</body>
</html>