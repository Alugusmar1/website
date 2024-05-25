<?php 
include './includes/conn.php';
include 'functions.php';
session_start();

    if(isset($_POST['amt'] ) && isset($_POST['user_id']) && isset($_POST['c_count'])){

        $amt = $_POST['amt'];
        $user_id = $_POST['user_id'];
        $c_count = $_POST['c_count'];
        $status = "Pending";

        mysqli_query($conn,"INSERT INTO `payment` (user_id,amount,course_count,p_status,p_time) VALUES('$user_id','$amt','$c_count','$status',NOW())");
        $_SESSION['OID'] = mysqli_insert_id($conn);

    }

    $rowid = $_SESSION['OID'];
    if(isset($_POST['payment_id']) && isset($_SESSION['OID'])){
        $payment_id = $_POST['payment_id'];
        $amt = $_POST['amt'];
        $user_id = $_POST['user_id'];
        $c_count = $_POST['c_count'];
        $status = "Complete";

        mysqli_query($conn,
        "UPDATE `payment` SET payment_id='$payment_id',p_status ='$status',p_time=NOW() WHERE id =$rowid"
        );

        mysqli_query($conn,"UPDATE `user_form` SET course_bought = course_bought + $c_count WHERE id = $user_id ");


        $c_result = mysqli_query($conn,"SELECT * FROM `cart` WHERE user_id = $user_id");
        while($row = mysqli_fetch_array($c_result))
        {   
             $c_id = $row['c_id'];
            mysqli_query($conn,"INSERT INTO `course_bought` (c_id,user_id) VALUES ($c_id,$user_id)");
        }

      
        mysqli_query($conn,"DELETE FROM `cart` WHERE user_id = $user_id");
        
    }

?>