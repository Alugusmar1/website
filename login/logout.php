<?php 
    session_start();
    session_destroy();
    session_unset();
    echo "<script>alert('Logout Successful')</script>";
    header('location:login_form.php');
    
?>