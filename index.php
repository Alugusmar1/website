<?php
include './includes/conn.php';
include 'functions.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    $_SESSION['user_id'] = 0;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LearnIT</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">


    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="style.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body class="">

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
    <section id="home">
        <h2>Enhance Your Future With Us</h2>
        <p>Discover limitless opportunities with our educational platform. Our courses and resources are tailored to
            enhance your future, making success attainable</p>
        <div class="btn">
            <a class="blue" href="about.php">Learn More</a>
            <a class="yellow" href="course.php">Visit Courses</a>
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

    <!-- Courses -->
    <section id="course">
        <h1>Our Popular Courses</h1>
        <p>Discover our most sought-after courses, curated for your success and growth</p>
        <div class="course-box"> <!--  list -->

            <?php
            // search_course();
            displayall();
            add_to_cart();
            // cart_total();
            display_cat();

            ?>

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

    <!-- Registration -->
    <section id="registration">

        <div class="reminder">
            <p>Get 100 Online Courses for free</p>
            <h1>Register To Get It</h1>
            <div class="time">
                <div class="date">
                    <?php echo rand(1, 3); ?> <br>Days
                </div>
                <div class="date">
                    <?php echo rand(1, 12); ?> <br>Hours
                </div>
                <div class="date">
                    <?php echo rand(1, 60); ?> <br>Minutes
                </div>
                <div class="date">
                    <?php echo rand(1, 60); ?> <br>Seconds
                </div>
            </div>
        </div>

        <form action="">
            <div class="form">
                <h3>Create Free Account NOW!</h3>
                <input type="text" placeholder="Name">
                <input type="email" placeholder="Email Adderess">
                <input type="number" placeholder="Phone Number">
                <div class="btn">
                    <a class="yellow" href="#">Submit</a>
                </div>
            </div>
        </form>
    </section>

    <!-- Profiles -->
    <section id="experts">
        <h1>Community Experts</h1>
        <p>Your Trusted Guides to Knowledge and Support</p>
        <div class="expert-box">
            <div class="profile">
                <img src="images/pro1.webp" alt="">
                <h6>Ema Ernik</h6>
                <p>Python & Algorithm Expert</p>
                <div class="pro-links">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-linkedin-in"></i>
                </div>
            </div>
            <div class="profile">
                <img src="images/pro2.webp" alt="">
                <h6>jason</h6>
                <p>Data Design Engineer</p>
                <div class="pro-links">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-linkedin-in"></i>
                </div>
            </div>
            <div class="profile">
                <img src="images/pro3.webp" alt="">
                <h6>Maalik</h6>
                <p>Full Stack Developer</p>
                <div class="pro-links">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-linkedin-in"></i>
                </div>
            </div>
            <div class="profile">
                <img src="images/pro4.webp" alt="">
                <h6>Jennifer</h6>
                <p>Design Expert</p>
                <div class="pro-links">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-linkedin-in"></i>
                </div>
            </div>
        </div>

    </section>

    <!-- Our Happy Learners -->
    <section id="review">
        <h1>Our Happy Learners</h1>
        <div class="wrapper">
            <div class="box">
                <!-- <i class="fas fa-quote-left quote"></i> -->
                <p> "I had a few questions about a course I wanted to enroll in, and the customer support team was quick
                    to respond and very helpful. It's reassuring to know that they are there to assist whenever needed."
                </p>
                <div class="content">
                    <div class="info">
                        <div class="name">Alex smith</div>
                        <!-- <div class="job">
                        Designer | developer
                    </div> -->
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                    <div class="image">
                        <img src="admin/images/m3.jpg" alt="">

                    </div>
                </div>

            </div>
            <div class="box">
                <!-- <i class="fas fa-quote-left quote"></i> -->
                <p> "What sets this platform apart is its affordable pricing. As a student on a tight budget, I
                    appreciate that I can access quality courses without breaking the bank. The discounts and bundles
                    are a huge plus!"</p>
                <div class="content">
                    <div class="info">
                        <div class="name">Steven chris</div>
                        <!-- <div class="job">
                        YouTuber | Blogger
                    </div> -->
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                    <div class="image">
                        <img src="admin/images/m2.jpg" alt="">

                    </div>
                </div>


            </div>
            <div class="box">
                <!-- <i class="fas fa-quote-left quote"></i> -->
                <p>"I absolutely love this course-selling platform! It's incredibly user-friendly and intuitive. I was
                    able to find and purchase the courses I needed with ease. It's a game-changer for students like me"
                </p>
                <div class="content">
                    <div class="info">
                        <div class="name">Kristina Bellis</div>
                        <!-- <div class="job">
                        Freelance | Advertiser
                    </div> -->
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                    <div class="image">
                        <img src="admin/images/m1.jpg" alt="">

                    </div>
                </div>


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


        // Navigation Bar
        $('#menu-close').click(function () {

            $('nav .navigation ul').removeClass('active')
        })

    </script>

    <script src="script.js"></script>
</body>

</html>