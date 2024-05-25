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
                <li><a href="index.php">Home</a></li>
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
                            echo "  <li id='li2'><a id='s-l' href=''>My Account</a></li>
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
        <h2>Learn Popular Courses And Skill Up</h2>
    </section>
    <!-- Course-inner -->
    <section id="course-inner">
        <div class="overview">

            <?php 
                if (isset($_GET['c_id'])) {
                    $c_id = $_GET['c_id'];
                    $result = mysqli_query($conn, "SELECT * FROM course WHERE c_id ='$c_id'");
            
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo " 
                    
                        <img class='course-img' src='./admin/c_images/$row[c_image]'>
            
                        <div class='course-head'>
                            <div class='c-name'>
                                <h2>$row[c_name]</h2>
                                <div class='star'>
                                    <i class='fas fa-star'></i>
                                    <i class='fas fa-star'></i>
                                    <i class='fas fa-star'></i>
                                    <i class='fas fa-star'></i>
                                    <i class='fas fa-star'></i>
                                </div>
                                <p>$row[c_desc]</p>
                            </div>
                            <span>Rs. $row[c_price]</span>
                        </div> 
                        ";
            ?>

            <h3>Insturctur</h3>

            <div class="tutor">
                <img src="images/c4.jpg" alt="">
                <div class="tutor-det">
                    <h5>John Doe</h5>
                    <p>Web Developer At Googlge</p>
                </div>
            </div>

            <hr>

            <h3>Course Overview</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum, itaque deserunt? Optio, est. Consequatur
                laboriosam facere a deserunt doloremque pariatur ullam quibusdam possimus numquam nam similique magnam,
                consectetur necessitatibus neque?Lorem, ipsum dolor sit amet consectetur adipisicing elit. Blanditiis,
                nesciunt<br><br> quisquam ratione fugiat recusandae aperiam animi facere earum, inventore placeat
                voluptatem rem
                excepturi harum maxime natus reprehenderit error. Consequuntur, doloremque?Lorem ipsum, dolor sit amet
                consectetur adipisicing elit. Ipsa blanditiis distinctio, eius rem necessitatibus perferendis obcaecati
                voluptatum! Sunt harum, inventore, praesentium odio nam doloribus deleniti veritatis consectetur,
                quisquam et nemo!</p>
            <hr>
            <h3>What you'll learn</h3>
            <div class="learn">
                <p><i class="far fa-check-circle"></i>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                <p><i class="far fa-check-circle"></i>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                <p><i class="far fa-check-circle"></i>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                <p><i class="far fa-check-circle"></i>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                <p><i class="far fa-check-circle"></i>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                <p><i class="far fa-check-circle"></i>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>


            </div>
        </div>
        <div class="enroll">
            <h3>This Course includes:</h3>
            <p><i class="far fa-video"></i>52 hours video</p>
            <p><i class="far fa-newspaper"></i>75 articles</p>
            <p><i class="far fa-cloud-download"></i>Downloadable resources</p>
            <p><i class="far fa-infinity"></i>Full lifetime access</p>
            <p><i class="fas fa-mobile-alt"></i>Access on moblie and TV</p>
            <p><i class="far fa-paperclip"></i>Assignment</p>
            <p><i class="far fa-trophy-alt"></i>Ceritficate of completion</p>
            <div class="enroll-btn">
                <a href=" course.php?c_id=<?php $row['c_id']?>" class="blue">Add to Cart</a>
            </div>

<?php }}?>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer-distributed">

        <div class="footer-left">
            <a class="main-link" href="index.html"><h3>Learn<span>IT</span></h3></a>


            <p class="footer-links">
                <a href="main.html">Home</a>
                |
                <a href="know us.html">About</a>
                |
                <a href="contact.html">Contact</a>

            </p>

            <p class="footer-company-name">Copyright © 2023 <strong> LearnIT.org </strong> <br>All rights reserved</p>
        </div>

        <div class="footer-center">
            <div>
                <i class="fa-solid fa-location-dot"></i>
                <p><span>Pune</span>
                    Maharastra</p>
            </div>

            <div>
                <i class="fa fa-phone"></i>
                <p>+91 9890137658</p>
            </div>
            <div>
                <i class="fa fa-envelope"></i>
                <p><a href="">learnit01@gmail.com</a></p>
            </div>
        </div>
        <div class="footer-right">
            <p class="footer-company-about">
                <span>About the company</span>
                <strong>LearnIT</strong> organization Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                Aspernatur nam corporis eaque voluptate eum sapiente tempore. Nostrum modi nam tempore quis sint in
                debitis, excepturi similique omnis nemo assumenda dicta?

            </p>
            <div class="footer-icons">
                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <a href="#"><i class="fa-brands  fa-youtube"></i></a>
            </div>
        </div>
    </footer>

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