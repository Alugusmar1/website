<?php

include 'config.php';
include('../functions.php');

if (isset($_POST['submit'])) {

   $name = $_POST['name'];
   $email = $_POST['email'];
   $phno = $_POST['phno'];
   $pass = $_POST['password'];
   $cpass = $_POST['cpassword'];
   // $user_type = $_POST['user_type'];
   // $user_ip = get_ip();


   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if (mysqli_num_rows($result) > 0) {

      $error[] = 'user already exist!';

   } else {

      if ($pass != $cpass) {
         $error[] = 'password not matched!';
      } else {
         $pass = password_hash($pass,PASSWORD_DEFAULT);

         $insert = "INSERT INTO `user_form`(fullname, email,phno,password) VALUES('$name','$email',$phno,'$pass')";
         mysqli_query($conn, $insert);
         echo '<script>window.addEventListener("load",function () {
            swal("Successful", "Registration", "success").then((value) => { window.location.href = "login_form.php"; });
        });</script>';
      }

      // 
   }

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style1.css">
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body>

   <div class="form-container">

      <form action="" method="post">
         <h3>Registration</h3>
         <?php
         if (isset($error)) {
            foreach ($error as $error) {
               echo '<span class="error-msg">' . $error . '</span>';
            }
            ;
         }
         ;
         ?>
         <input type="text" name="name" required placeholder="Enter your fullname">
         <input type="email" name="email" required placeholder="Enter your email">
         <input type="number" name="phno" maxlength="13" required placeholder="Enter your mobile number">
         <input type="password" name="password" maxlegth="10" required placeholder="Enter your password">
         <input type="password" name="cpassword" maxlength="10" required placeholder="Confirm your password">
         <!-- <select name="user_type">
               <option value="user">Student</option>
               <option value="admin">Admin</option>
          </select> -->
         <input type="submit" name="submit" value="Register" class="form-btn">
         <p>already have an account? <a href="login_form.php">Login Now</a></p>
      </form>

   </div>

</body>

</html>