<?php
    session_start();
    if(isset($_SESSION['unique_id'])){  // if user is logged in
        header("location: users.php");
    }
?>

<?php
    include_once"includes/head.php";
?>
<body>
    <div class="wrapper">
        <section class="form signup">
            <header>Hang Out Chat Application</header>
            <form action="#" enctype='multipart/form-data' autocomplete="off">
                <div class="error-txt"></div>
                <div class="name-details">
                    <div class="field input">
                        <label>First Name</label>
                        <input type="text" name="fname" placeholder="First Name" required>
                    </div>
                    <div class="field input">
                        <label>Last Name</label>
                        <input type="text" name="lname" placeholder="Last Name" required>
                    </div>
                </div>
                <div class="field input">
                    <label>Email Address</label>
                    <input type="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="field input">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter your password" required>
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field image">
                    <label>Select Image</label>
                    <input type="file" name="image" required>
                </div>
                <div class="field button">
                    <input type="submit" value ="Sign Up"> 
                </div>
            </form>
            <div class="link">Already singed up? <a href="login.php">Login now</a></div>
        </section>
    </div>

    <script src="js/pass-show-hide.js"></script>
    <script src="js/signup.js"></script>
</body>
</html>