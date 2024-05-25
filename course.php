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
    <title>Courses</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">


    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="style.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body>

     <!-- Navigation -->
     <nav>
        <!-- <img src="images/logo.svg" alt=""> -->
        <a class="main-link" href="index.php">
            <h2>Learn<span>IT</span></h2>
        </a>

        <div class="search-box">
            <form action="course.php" method="GET">
                <input type="text" name="search" id="srch" placeholder="Search">
                <button type="submit" name="search-btn"><i class="fa-solid fa-search"></i></button>
            </form>
        </div>


        <div class="navigation">
            <ul>
                <i id="menu-close" class="fas fa-times"></i>
                <li><a href="#">Categories</a>
                    <!-- <i class="fa-solid fa-angle-down"></i> -->

                    <ul class="sbn">
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM categories");
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<li id='li2'><a id='s-l'  href='course.php?cat_id=$row[cat_id]'>$row[cat_name]</a></li> ";
                        }
                        ?>
                        <!-- <li id="li2"><a id="s-l" href="">Programming</a></li>
                        <li id="li2"><a id="s-l" href="">Frontend</a></li>
                        <li id="li2"><a id="s-l" href="">Backend</a></li> -->
                    </ul>
                </li>
                <li><a href="index.php" class="active">Home</a></li>
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
                            echo "  <li id='li2'><a id='s-l' href='./admin/student/home.php'>My Account</a></li>
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
        <h2>Courses /</h2>
    </section>

    <!-- Courses -->
    <section id="course">
        <h1>Our Popular Courses</h1>
        <p>Discover our most sought-after courses, curated for your success and growth</p>
                        
        <div class="course-box">
            <?php 
            search_course();
            displayall_courses();
            display_cat();
            add_to_cartc()
            
            ;
            // add_to_cart();
            ?>
            </div> 
        </div>
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


        // Navaigation Bar
        $('#menu-close').click(function () {

            $('nav .navigation ul').removeClass('active')
        })

    </script>


</body>

</html>