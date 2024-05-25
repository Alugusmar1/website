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
    <title>Contact Us</title>

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
                
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About us</a></li>
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
        <h2>Contact Us</h2>
    </section>
    <!-- contact -->
    <section id="contact">
        <div class="getin">
            <h2>Get in touch</h2>
            <p>Looking for help? Fill the form and start a new adventure</p>
            <div class="getin-details">
                <h3>Headquarters</h3>
                <div>
                    <i class="far fa-home get"></i>
                    <p>Katraj, Pune, 411046</p>
                </div>

                <h3>Phone</h3>

                <div>
                    <i class="fas fa-phone-alt get"></i>
                    <p>(+91) 245 356 4322 <br>
                        (+91) 336 476 3283</p>
                </div>


                <h3>Support</h3>
                <div>
                    <i class="far fa-envelope-open-text get"></i>

                    <p>learnit@support.com <br> help@learnit.com</p>
                </div>
            </div>
            <h3>Follow us</h3>
            <div class="pro-links">
                <i class="fab fa-facebook-f"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-linkedin-in"></i>
                <i class="fab fa-behance"></i>

            </div>
        </div>

        <div class="form">
            <form action="" method="POST">
                <h4>Let's Connect</h4>
                <p>Reach out to us – we're here to assist you</p>
                <div class="form-row">
                    <input type="text" name="name" placeholder="Your Name">
                    <input type="text" name="email" placeholder="Your Email">
                </div>
                <div class="form-col">
                    <input type="text" name="subject" placeholder="Subject">
                </div>
                <div class="form-col">
                    <textarea name="content" id="" cols="30" rows="8"></textarea>

                </div>
                <div class="form-col">
                    <button type="submit" name="submit">Send Message
                    </button>
                </div>

            </form>
        </div>

    </section>

    <!-- map -->
    <section id="map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1936399.0061698912!2d73.68991555818873!3d18.572717337452826!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2bf2e67461101%3A0x828d43bf9d9ee343!2sPune%2C%20Maharashtra!5e0!3m2!1sen!2sin!4v1692082555942!5m2!1sen!2sin"
            style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['submit'])) {
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$content = $_POST['content'];


    //Load Composer's autoloader
    require 'phpmailer/PHPMailer.php';
    require 'phpmailer/SMTP.php';
    require 'phpmailer/Exception.php';

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output
        $mail->isSMTP(); //Send using SMTP
        $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
        $mail->SMTPAuth = true; //Enable SMTP authentication
        $mail->Username = 'gaming7tiger@gmail.com'; //SMTP username
        $mail->Password = 'zzno vtnm avka arzg'; //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
        $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('gaming7tiger@gmail.com', 'Contact form');
        $mail->addAddress('learnit215@gmail.com', 'Main User'); //Add a recipient




        //Content
        $mail->isHTML(true); //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body = "Sender Name-$name <br> Sender Email-$email <br> Message:$content";
        $mail->send();
        echo '<script>window.addEventListener("load",function () {swal("Thanks For Contacting Us");});</script>';
    } catch (Exception $e) {
        echo '<script>window.addEventListener("load",function () {
            swal({
            title: "Error!",
            text: "Unable to send message",
            icon: "error",
            button: "Ok",
          });});</script>';
        // echo $mail->ErrorInfo;


    }
}
?>