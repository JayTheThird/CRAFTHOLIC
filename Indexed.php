<!DOCTYPE html>
<html lang="en">
<?php

include("../craftholic/Includes/config.php");
include("../craftholic/Includes/Connection.php");
session_start();




?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRAFTHOLIC</title>
    <!-- External Css -->
    <link rel="stylesheet" href="CSS/indexed.css?v=<?php $version ?>">
    <!-- Icon Library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <!-- JavaScript File -->
    <script src="JavaScript/Onclick_Function.js?v=<?php $version ?>"></script>
    <script src="JavaScript/clock.js?v=<?php $version ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="JavaScript/swiper.js"></script>
    <!-- <script src="javaScript/SearchBar_Backend.js"></script> -->


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
            <a class="active" href="Indexed.php">Home</a>
            <a class="" href="homedecor.php">Home Decor</a>
            <a class="" href="WallDecor.php">Wall Decor</a>
            <a class="" href="Gifting.php">Gifting</a>
            <a class="" href="Contectus.php">ContactUS</a>
            <a id="close"><i class="fa fa-times"></i></a>
        </nav>




        <?php
        require('../craftholic/Includes/Header.php');
        ?>

    </header>
    <!-- Nav Bar ends here -->

    <!-- Hero Section -->
    <?php
    include_once("../craftholic/Includes/Banner.php");
    ?>

    <!-- Features  -->
    <section id="feature" class="section-p1">
        <div class="fe-box">
            <img src="image/img/features/f1.png" alt="image not load">
            <h6>Free Shipping</h6>
        </div>
        <div class="fe-box">
            <img src="image/img/features/f2.png" alt="image not load">
            <h6>Delivery Ontime</h6>
        </div>
        <div class="fe-box">
            <img src="image/img/features/f3.png" alt="image not load">
            <h6>Save Money</h6>
        </div>
        <div class="fe-box">
            <img src="image/social media.png" alt="image not load">
            <h6>Promotions</h6>
        </div>
        <div class="fe-box">
            <img src="image/img/features/f5.png" alt="image not load">
            <h6>Happy Sell</h6>
        </div>

        <div class="fe-box">
            <img src="image/img/features/f6.png" alt="image not load">
            <h6>24/7 Support</h6>
        </div>
    </section>

    <!-- Prodect Section -->
    <?php
    require('../craftholic/Includes/FeatureadProduct.php');
    ?>


    <!-- Upcoming Sale Section -->
    <section id="banner" class="section-m1">
        <h4>UPCOMING <span>SALE</span></h4>
        <h2>UP to <span>35% OFF</span> on Home Decor, Wall Decor and Gifting products.</h2>
        <!-- <button>Explore More</button> -->
        <div class="countdown-container">
            <div>
                <p id="days" class="big-text">0</p>
                <span>DAYS</span>
            </div>
            <div>
                <p id="hours" class="big-text">0</p>
                <span>HOURS</span>
            </div>
            <div>
                <p id="min" class="big-text">0</p>
                <span>MIN</span>
            </div>
            <div>
                <p id="sec" class="big-text">0</p>
                <span>SEC</span>
            </div>
        </div>
    </section>

    <!-- Upcomming Product Section -->
    <?php
    include("../craftholic/Includes/Upcomming-Products.php");
    ?>

    <!-- Testimonial -->
    <?php
    include("../craftholic/Includes/Cust-Testimonial.php");
    ?>

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

    <!-- Track order -->
    <section class="step-wizard section-p1" id="Track-order">

        <ul class="step-wizard-list">
            <li class="step-wizard-item">
                <span class="progress-count">1</span>
                <span class="progress-label">Order Placed</span>
            </li>
            <li class="step-wizard-item current-item">
                <span class="progress-count">2</span>
                <span class="progress-label">Shipped </span>
            </li>
            <li class="step-wizard-item">
                <span class="progress-count">3</span>
                <span class="progress-label">On the Way</span>
            </li>
            <li class="step-wizard-item">
                <span class="progress-count">4</span>
                <span class="progress-label">Delivered</span>
            </li>
        </ul>
    </section>

    <!-- footer -->
    <?php
    include("../craftholic/Includes/Footer.php");
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