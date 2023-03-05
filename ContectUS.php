<!DOCTYPE html>
<html lang="en">
<?php 

include '../craftholic/Includes/config.php';
include '../craftholic/Includes/Connection.php';
session_start();

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRAFTHOLIC</title>
    <!-- indeced File Css -->
    <link rel="stylesheet" href="CSS/indexed.css?v=<?php $version ?>">
    <!-- Icon Library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- JavaScript File -->
    <script src="JavaScript/script.js?v=<? $version ?>"></script>


    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="../craftholic/CH_favicon/favicon-32x32.png">

</head>

<body>


    <!-- Click To Top -->
    <section class="Arrow-btn">
        <a href="#"><span class="fa-solid fa-angle-up"></span></a>
    </section>

    <!-- NavBar -->
    <header>
        <a href="#" onclick="window.location.href='indexed.php';">
            <h2>CRAFTHOLIC</h2>
        </a>
        <nav id="nav">
            <a  href="Indexed.php">Home</a>
            <a class="" href="homedecor.php">Home Decor</a>
            <a class="" href="Walldecor.php">Wall Decor</a>
            <a class="" href="Gifting.php">Gifting</a>
            <a class="active" href="Contectus.php">ContactUS</a>
            <a id="close"><i class="fa fa-times"></i></a>
        </nav>

       
        <!-- For UserLogin & Resposive  -->
        <?php
        require('../craftholic/Includes/Header.php');
        ?>

        <!-- For Search Bar -->
        <form class="search-bar" id="search-btn">
            <input type="search" id="search-box" placeholder="Search Here">
            <label for="search-box" class="fa fa-search"></label>
        </form>

    </header>


    <!-- Hero Section -->
    <section id="page-header" class="blog-header">

        <h1><span class="cont-us_span-size-h1">#</span>Let's Talk</h1>
        <p><span class="cont-us_span-size-p">LEAVE A MESSAGE</span>, We Love To Hear From You!</p>

    </section>

    <!-- Contact Details -->
    <section id="contact-details" class="section-p1">
        <div class="details">
            <span>GET IN TOUCH</span>
            <h2>Visit Our Shop or Contact Us Today!</h2>
            <h3>Head Office</h3>
            <div>
                <li>
                    <i class="fa-regular fa-map"></i>
                    <p>Nishant Banglows, Near Poonam Bakri, Ahmedabad, Gujarat 382350</p>
                </li>
                <li>
                    <i class="fa-regular fa-envelope"></i>
                    <p>craftholic@gmail.com</p>
                </li>
                <li>
                    <i class="fas fa-phone-alt"></i>
                    <p>1234567890, 0987654321</p>
                </li>
                <li>
                    <i class="far fa-clock"></i>
                    <p>Monday to Saturday : 9:00 am To 16:00 pm</p>
                </li>
            </div>
        </div>

        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7342.974567401637!2d72.660941635959!3d23.0425903521458!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e871e0ec482ff%3A0xfbe37406d5ee3c93!2sNishant%20Bungalow!5e0!3m2!1sen!2sin!4v1670919262871!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>

    <!-- Form Details -->
    <section id="Form-details">
        <form method="POST" autocomplete="off">
            <span>LEAVE A MESSAGE</span>
            <h2>We Love To Hear From You</h2>
            <input type="text" name="Name" placeholder="Your Name">
            <input type="text" name="Phone_Number" placeholder="Phone Number">
            <input type="text" name="Email" placeholder="Email">
            <input type="text" name="Subject" placeholder="Subject">
            <textarea name="Message" placeholder="You'r Message" cols="30" rows="10"></textarea>
            <button class="normal" name="submit">Submit</button>
        </form>

        <div class="people">
            <div>
                <img src="image/img/people/1.png" alt="">
                <p><span>Jay Bhardiya</span> senior marketing manager <br> Phone : 1234567890 <br> Email : JayAdmin@gmail.com</p>
            </div>
            <div>
                <img src="image/img/people/2.png" alt="">
                <p><span>Darshil Malaviya</span> senior marketing manager <br> Phone : 1234567890 <br> Email : DarshilAdmin@gmail.com</p>
            </div>
            <div>
                <img src="image/img/people/3.png" alt="">
                <p><span>Harpal Chodvadiya</span> senior marketing manager <br> Phone : 1234567890 <br> Email : HarpalAdmin@gmail.com</p>
            </div>
        </div>
    </section>

    <!-- newsletter -->
    <section id="newsletter" class="section-p1 section-m1">
        <div class="newstext">
            <h4>Sign Up For Newsletter</h4>
            <p>Get Email Update About Our Letest Product And <span>Special Offers.</span></p>
        </div>
        <div class="form">
            <input type="text" placeholder="Your Email Address">
            <button class="normal">Sign Up</button>
        </div>

    </section>



    <!-- footer -->
    <?php
    include('../craftholic/Includes/Footer.php');
    ?>




</html>

</body>


<!-- For Responsive and UserProfile menu -->
<script>
    // For Hemburgur Menu
    const bar = document.getElementById('bar');
    const close = document.getElementById('close');
    const nav = document.getElementById('nav');
    if ('bar') {
        bar.addEventListener('click', () => {
            nav.classList.add('active');
        })
    }
    if ('close') {
        close.addEventListener('click', () => {
            nav.classList.remove('active');
        })
    }

    // For User Profile Menu
    const UserMenu = document.getElementById('User-Menu');
    const UserClose = document.getElementById('User-Close');
    const nav2 = document.getElementById('User-slider');
    if ('UserMenu') {
        UserMenu.addEventListener('click', () => {
            nav2.classList.add('User-Active');
        })
    }
    if ('UserClose') {
        UserClose.addEventListener('click', () => {
            nav2.classList.remove('User-Active');
        })
    }
</script>

<?php

//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require("PHP Mailer/Exception.php");
require("PHP Mailer/PHPMailer.php");
require("PHP Mailer/SMTP.php");

if (isset($_POST['submit'])) {
    $Name = $_POST['Name'];
    $Phone_Number = $_POST['Phone_Number'];
    $Email = $_POST['Email'];
    $Subject = $_POST['Subject'];
    $Message = $_POST['Message'];

    $mail = new PHPMailer(true);

    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                   //Enable verbose debug output
        $mail->isSMTP();                                           //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                 //Enable SMTP authentication
        $mail->Username   = 'juhilbhardiya161200@gmail.com';      //SMTP username
        $mail->Password   = 'efqzbhjyawoxzqie';                   //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         //Enable implicit TLS encryption
        $mail->Port       = 465;                                 //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('juhilbhardiya161200@gmail.com', 'CRAFTHOLIC');
        $mail->addAddress('juhilbhardiya161200@gmail.com');     //Add a recipient

        //Content
        $mail->isHTML(true);                                    //Set email format to HTML
        $mail->Subject = $Subject;
        $mail->Body    = "Name: $Name <br> Phone_Number: $Phone_Number <br> Email: $Email <br> Message: $Message";

        $mail->send();
        echo '<script>alert("Message has been sent");</script>';
    } catch (Exception $e) {
        echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}');</script>";
    }
}

?>

