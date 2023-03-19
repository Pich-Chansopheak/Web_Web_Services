<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
</head>
<body>
    <div class="wrapper">
        <section class="form login">
            <header>Hang Out Chat Application</header>
            <form action="#">
                <div class="error-text">This is an error message!</div>
               
                <div class="field input">
                    <label>Email Address</label>
                    <input type="email" placeholder="Enter your email">
                </div>
                <div class="field input">
                    <label>Password</label>
                    <input type="password" placeholder="Enter your password">
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