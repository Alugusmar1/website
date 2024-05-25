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
    <title>About us</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">


    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="style.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

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
               
                <li><a href="index.php">Home</a></li>
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

    <section id="about-home">
        <h2>About us /</h2>
    </section>

    <section id="about-container">
        <div class="about-img">
            <img src="images/a.png" alt="">
        </div>
        <div class="about-text">
            <h2>Welcome to LearnIT Enhance Your Skills with Best Self-paced Courses</h2>
            <p>You can star and finish one of these popular courses in under a day - for
                free! Check but list below.. Take the course for free
            </p>

            <div class="about-fea">
                <img src="images/fe1.png" alt="">
                <div class="fe-text">
                    <h5>100+ Courses</h5>
                    <p>You can star and finish one of these popular courses in under our site</p>

                </div>
            </div>
            <div class="about-fea">
                <img src="images/fe2.png" alt="">
                <div class="fe-text">
                    <h5>Lifetime Access</h5>
                    <p>You can star and finish one of these popular courses in under our site</p>

                </div>
            </div>
        </div>
    </section>

    <!-- features -->
    <section id="features">
        <h1>Awesome Features</h1>
        <p>Explore our website's unique features for a seamless and enriching user experience.</p>
        <div class="fea-base">
            <div class="fea-box">
            <i class="fa-solid fa-medal"></i>
                <h3>Awarded Team</h3>
                <p>
                    "Our website is backed by an award-winning team, delivering excellence and innovation to ensure an
                    exceptional user experience."</p>
            </div>
            <div class="fea-box">
            <i class="fa-solid fa-stopwatch"></i>
                <h3>Self Paced Courses</h3>
                <p>"Explore our website's self-paced courses, designed to empower you with flexibility and control over
                    your learning journey, anytime and anywhere."</p>
            </div>
            <div class="fea-box">
                <i class="fas fa-award"></i>
                <h3>Global certifications</h3>
                <p>"Website proudly boasts global certification, guaranteeing our adherence to international standards
                    and trustworthiness for users across the globe"</p>
            </div>
            <div class="fea-box">
            <i class="fa-regular fa-comments"></i>
                <h3>24/7 Support</h3>
                <p>"Website stands out with its exceptional 24/7 support, ensuring that you receive assistance and
                    answers to your inquiries around the clock"</p>
            </div>

        </div>

    </section>

    <!--Collaborations  -->
    <section id="colab">
        <h1>Collaborations</h1>
        <p>Our Trusted Partnerships for Enhanced Opportunities</p>
        <div class="colab-img">
            <img src="images/col1.png" alt="">
            <img src="images/col2.jfif" alt="">
            <img src="images/col3.jfif" alt="">
            <img src="images/col4.jfif" alt="">
            <img src="images/col5.jfif" alt="">
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