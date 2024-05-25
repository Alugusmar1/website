<?php
include './includes/conn.php';
include 'functions.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">


    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="style.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



</head>

<body class="">

    <!-- Navigation -->
    <nav>
        <a class="main-link" href="index.php">
            <h2>Learn<span>IT</span></h2>
        </a>

        <div class="navigation">
            <ul>
                <i id="menu-close" class="fas fa-times"></i>

                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About us</a></li>
                <li><a href="contact.php">Contact us</a></li>
                <li><a href="course.php">Courses</a></li>
                <li><a href="cart.php">

                        <i class=" fa-solid fa-cart-shopping openCart"></i>
                        <span class="quantity">
                            <?php course_count(); ?>
                        </span>
                    </a>

                </li>
                <li><a href="#"><i class="fa-solid fa-user"></i></a>
                    <ul class="sbn" id="user-list" style="right:-70px; top:0;">
                        <?php
                        if (!isset($_SESSION['username'])) {
                            echo "  <li id='li2'><a id='s-l' href='./login/login_form.php'>Login</a></li>
                                        <li id='li2'><a id='s-l' href='./login/register_form.php'>SignUp</a></li>";
                        } else {
                            echo " <li id='li2'><a id='s-l' href='./admin/student/home.php'>My Account</a></li>
                            <li id='li2'><a id='s-l' href='./login/logout.php'>Logout</a></li> ";
                        }

                        ?>

                    </ul>
                </li>
            </ul>
            <img id="menu-btn" src="images/menu.png" alt="">
        </div>

    </nav>
    <!-- Home -->
    <section id="about-home">
        <h2> Your Cart/</h2>
    </section>

    <!-- cart section-->

    <section id="cart-final">
        <form action="" method="POST">
            <div class="cart">
                <h3>Cart Details</h3>
                <ul class="listCourse">
                    <?php

                    //    global $total = 0;
                    global $total;
                    $result = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$_SESSION[user_id]'");

                    if (mysqli_num_rows($result) > 0) {
                        echo "<li>
                    <div class='txt'>Images</div>
                    <div class='txt'>Course Name</div>
                    <div class='txt'>Price</div> 
                    <div class='txt' id='remove'>
                        <text>Select</text>
                        <text>Operation</text>
                        <!-- <i class='fa-solid fa-circle-minus'></i> -->
                        <!-- <div class='count'></div> -->
                    </div>
                </li>";
                        while ($row = mysqli_fetch_array($result)) {
                            $c_id = $row['c_id'];

                            $result2 = mysqli_query($conn, "SELECT * FROM `course` WHERE c_id='$c_id'");

                            while ($row2 = mysqli_fetch_array($result2)) {
                                $c_price = array($row2['c_price']);
                                $c_value = array_sum($c_price);
                                $total += $c_value;
                                ?>
                                <!-- Block li each time will display -->
                                <li>
                                    <div class="txt"><img src=" ./admin/c_images/<?php echo $row2['c_image']; ?>" /></div>
                                    <div class="txt">
                                        <?php echo $row2['c_name']; ?>
                                    </div>
                                    <div class="txt">Rs.
                                        <?php echo $row2['c_price']; ?>
                                    </div>
                                    <div class="txt" id="remove">
                                        <input type="checkbox" name="remove[]" value="<?php echo $row2['c_id']; ?>"
                                            style="width:15px; height:15px;">
                                        <input type="submit" name="remove_btn" value="Remove" class="c-btn"
                                            style="padding: 8px;background:#fdc938;border: none;border-radius: 8px;font-weight: 500;font-size: 13px;">
                                    </div>

                                </li>

                            <?php }

                        } ?>
                    </ul>
                </div>


                <div class="checkOut">
                    <div class="total" id="total" value="<?php echo $total; ?>" name="total">
                        Total Rs.
                        <?php echo $total; ?>/-
                    </div>
                    <?php if (isset($_SESSION['username'])) { ?>
                        <div class="closeCart"><a href="" id="rzp-button1">
                                Proceed To Pay</a></div>

                        <!-- payment work -->
                        <!-- <button id="rzp-button1">Pay</button> -->
                        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

                        <script>
                            // function pay()
                            // {
                            var amt = "<?php echo $total; ?>";
                            var user_id = "<?php echo $_SESSION['user_id']; ?>";
                            var c_count = "<?php echo course_count(); ?>";

                            jQuery.ajax({
                                type: "post",
                                url: "payment_process.php",
                                data: "&amt=" + amt + "&user_id=" + user_id + "&c_count=" + c_count,
                                success: function (result) {
                                    var options = {
                                        "key": "rzp_test_1AWqJ6SO8f4YE7", // Enter the Key ID generated from the Dashboard
                                        "amount": amt * 100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                                        "currency": "INR",
                                        "name": "LearnIT Org.", //your business name
                                        "description": "Test Transaction",
                                        "image": "https://learnit.how/assets/logo.png",
                                        // "data-order_id": "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                                        "handler": function (response) {
                                            jQuery.ajax({
                                                type: "post",
                                                url: "payment_process.php",
                                                data: "&payment_id=" + response.razorpay_payment_id + "&amt=" + amt + "&user_id=" + user_id + "&c_count=" + c_count,
                                                success: function (result) {
                                                        swal("Thank you...", " ", "success").then((value) => { window.location.href = "./admin/student/home.php"; });
                                                    // window.open('./admin/student/home.php', '_self');
                                                }
                                            });

                                        }, //handler function

                                        "prefill": { //We recommend using the prefill parameter to auto-fill customer's contact information, especially their phone number
                                            "name": "<?php echo $_SESSION['username']; ?>", //your customer's name
                                            "email": "<?php echo $_SESSION['email']; ?>",
                                            "contact": "<?php echo $_SESSION['phno']; ?>"  //Provide the customer's phone number for better conversion rates 
                                        },
                                        "notes": {
                                            "address": "Razorpay Corporate Office"
                                        },
                                        "theme": {
                                            "color": "#EF234C"
                                        }
                                    };
                                    var rzp1 = new Razorpay(options);

                                    document.getElementById('rzp-button1').onclick = function (e) {
                                        rzp1.open();
                                        e.preventDefault();
                                    }
                                }
                            });

                            // }

                        </script>
                    <?php } else {
                        echo "<div class='closeCart'><a href='./login/login_form.php'>
                        Proceed To Pay</a></div>";
                    } ?>

                </div>

                <div class="continue"><a href="course.php">Continue</a></div>

            <?php } else {
                        echo "<h1>Your cart is empty! </h1>;
                <div class='continue'><a href='course.php'>Continue</a></div>";
                    } ?>
        </form>

        <!-- function to remove -->
        <?php
        function remove()
        {
            global $conn;
            if (isset($_POST['remove_btn'])) {
                if (isset($_POST['remove'])) {
                    foreach ($_POST['remove'] as $remove_id) {
                        echo $remove_id;
                        $result = mysqli_query($conn, "DELETE FROM  `cart` WHERE c_id = $remove_id");
                        if ($result) {
                            echo '<script>window.addEventListener("load",function () {
                                swal("Done", "Course removed.", "success").then((value) => { window.location.href = "cart.php"; });
                            });</script>';
                        }
                    }

                } else {
                    // echo "<script>alert('Please Select Course First')</script>";
                    echo '<script>window.addEventListener("load",function () {
                        swal(" ", "Please Select Course First", "warning");});</script>';
                }
            }

        }

        echo remove();

        ?>
    </section>


    <!-- Footer -->
    <?php
    include 'footer.php';
    ?>


    <!-- Script -->
    <script>
        $('#menu-btn').click(function () {

            $('nav .navigation ul').addClass('active')
        })


        // Navigation Bar
        $('#menu-close').click(function () {

            $('nav .navigation ul').removeClass('active')
        })

    </script>

    <script src="script.js"></script>
</body>

</html>