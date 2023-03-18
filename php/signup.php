<?php
    session_start();
    include_once "config.php";
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
        // check email and password is valid or not
            // is email is valid
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            // check that email is already exist in the db or not
            $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");
            if(mysqli_num_rows($sql) > 0){  //if email already exist 
                echo "$email - This email already exist!!";
            }
            else{
                // check user upload file or not
                if(isset($_FILES['image'])){ //if file is uploaded
                    $img_name = $_FILES['image']['name']; // getting user upload img name
                    // $img_type = $_FILES['image']['type'];  // getting user upload img type
                    $tmp_name = $_FILES['image']['tmp_name']; // this temporary name is used to save/move file in our folder
                    
                    // explode img and get the last extension like jpg png
                    $img_explode = explode('.', $img_name);
                    $img_ext = end($img_explode); //there we get the extension of an user uplaod img file

                    $extensions = ['png', 'jpeg', 'jpg']; //there are  some valid img ext and we've store them in array
                    if(in_array($img_ext, $extensions) === true){ //if user uploaded img ext is matched with any array extensions
                        $time = time();  // this will return us current time...
                                            // we need this time because when you uploading user img to in our folder we rename user file with current time
                                            //so all the img file will a unique name
                        $new_img_name = $time.$img_name;
                        if(move_uploaded_file($tmp_name, "images/".$new_img_name)){ // if user upload img move to our successfully
                            $status = "Active now"; // once user signed up then hsi status will be active now
                            $random_id = rand(time(), 10000000); //creating random id for user

                            // insert all user data inside table
                            $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status)
                                                VALUES ({$random_id}, '{$fname}', '{$lname}', '{$email}', '{$password}', '{$new_img_name}' , '{$status}')");
                            if($sql2){  //if these data inserted
                                $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                if(mysqli_num_rows($sql3) > 0){
                                    $row = mysqli_fetch_assoc($sql3);
                                    $_SESSION['unique_id'] = $row['unique_id'] ; //using this session we need user unique_id in other php file
                                    echo "success";
                                }
                            }
                            else{
                                echo "Something went wrong!";
                            }
                        }
                    }
                    else{
                        echo "Please select an Image file - jpeg, jpg, png!";
                    }
                }
                else{
                    echo "Please select an image file!";
                }
            }
        }else{
            echo "$email . This is not a valid email!";
        }
    }
    else{
        echo "All input field are required!";
    }
?>