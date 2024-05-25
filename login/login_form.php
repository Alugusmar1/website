<?php

include 'config.php';
include '../functions.php';

@session_start();

if (isset($_POST['submit'])) {

   $email = $_POST['email'];
   $pass = $_POST['password'];

   // $pass = password_hash($pass,PASSWORD_DEFAULT); //encrption
   // echo $pass;

   // $verify = password_verify($plaintext_password, $hash); // decryption

   //check user
   $select = " SELECT * FROM user_form WHERE email = '$email' ";
   $result = mysqli_query($conn, $select);
   $user_count = mysqli_num_rows($result);

   //check admin
   $result2 = mysqli_query($conn,"SELECT * FROM `admin` WHERE email = '$email'");
   $a_cnt= mysqli_num_rows($result2);
  
   
   if ($user_count > 0) {
      
      $row = mysqli_fetch_array($result); //for user
    
      //user id for operations
      $_SESSION['user_id'] = $row['id'];
      $_SESSION['username'] = $row['fullname'];
      $_SESSION['email'] = $row['email'];
      $_SESSION['phno'] = $row['phno'];

      // check cart if user has course in cart 
      $cart_result = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = $_SESSION[user_id]");
      $cart_count = mysqli_num_rows($cart_result);


       if ($row['email']== $email && password_verify($pass,$row['password'])) {
         if ($cart_count == 0) {
            $_SESSION['user_id'] = $row['id'];
            echo '<script>window.addEventListener("load",function () {
               swal("Welcome", "Login Successful", "success").then((value) => { window.location.href = "../index.php"; });
           });</script>';
         } else {
            $_SESSION['user_id'] = $row['id'];
            echo '<script>window.addEventListener("load",function () {
               swal("Login Successful", "You have courses in cart.", "success").then((value) => { window.location.href = "../cart.php"; });
           });</script>';
            // echo "<script>window.open('../cart.php','_self')</script>";

         }
      }else {
         $error[] = 'Incorrect email or password!';
      }

   } else if($a_cnt>0){
      $row2= mysqli_fetch_array($result2);//for admin

      //admin
      if ($row2['email'] == $email && password_verify($pass,$row2['password']) ) {

         $_SESSION['admin_name'] = $row2['fullname'];
         $_SESSION['admin_id'] = $row2['id'];

         echo '<script>window.addEventListener("load",function () {
            swal("Welcome Admin", "Login Successful", "success").then((value) => { window.location.href = "../admin/admin.php"; });
        });</script>';
         // echo "<script>window.open('../admin/admin.php','_self')</script>";

      } else {
         $error[] = 'Incorrect email or password!';
      }
   }
   else {
      $error[] = 'Incorrect email or password!';
   }

}
;
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


   <!-- custom css file link  -->
   <link rel="stylesheet" href="style1.css">
</head>

<body>

   <div class="form-container">

      <form action="" method="post">
         <h3>Login</h3>
         <?php
         if (isset($error)) {
            foreach ($error as $error) {
               echo '<span class="error-msg">' . $error . '</span>';
            }
            ;
         }
         ;
         ?>
         <input type="email" name="email" required placeholder="Enter your email">
         <input type="password" name="password" required placeholder="Enter your password">
         <input type="submit" name="submit" value="login" class="form-btn">
         <p>don't have an account? <a href="register_form.php">Register now</a></p>
      </form>

   </div>

</body>

</html>