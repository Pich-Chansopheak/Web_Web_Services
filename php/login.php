<?php
   session_start();
   include_once "config.php";
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $password = mysqli_real_escape_string($conn, $_POST['password']);
   
   if(!empty($email) && !empty($password)){
      //let's check users entered email and password matched to database ant table row email and password
      $sql ="SELECT * FROM users WHERE email='{$email}' AND password = '{$password}'";
      $result = mysqli_query($conn,$sql);
      if(mysqli_num_rows($result)>0){//if match
         $row = mysqli_fetch_assoc($result);
         $_SESSION['unique_id'] = $row['unique_id'] ; //using this session we need user unique_id in other php file
         echo "success";
      }else{
         echo"Email or password is incorrect!";
      }
   }else{
      echo"All input fields are required!";
   }
?>