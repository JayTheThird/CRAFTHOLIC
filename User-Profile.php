<!DOCTYPE html>
<html lang="en">
<?php
include 'config.php';
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
    <script src="javaScript/"></script>

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
            <a href="Indexed.php">Home</a>
            <a class="" href="homedecor.php">Home Decor</a>
            <a class="" href="Walldecor.php">Wall Decor</a>
            <a class="" href="Gifting.php">Gifting</a>
            <a class="" href="Contectus.php">Contect</a>
            <a id="close"><i class="fa fa-times"></i></a>
        </nav>

        <div class="User-login-register">
            <a><i class="fa-solid fa-magnifying-glass" id="#search-btn" onclick="popup('search-btn')"></i></a>
            <!-- <a><i class="fa-solid fa-user" onclick="window.location.href='User_login.php';"></i> </a> -->
            <a><i class="fa-solid fa-user" id="User-Menu"></i> </a>
            <a href="ShopingCART.php"><i class="fa-solid fa-cart-shopping"></i></a>
        </div>

        <!-- For User Profile Slider -->
        <div id="User-slider">
            <div class="container">
                <h1>
                    WELCOME,<span> <?php echo "$_SESSION[UserFirstName] $_SESSION[UserLastName]"; ?> </span>
                </h1>
                <p>
                    <span>Contect Number : </span><?php echo $_SESSION['UserContectNumber']; ?>
                </p>
                <p>
                    <span> Email-id :</span> <?php echo $_SESSION['UserEmail']; ?>
                </p>

                <div class="user-btn">
                    <button class="normal" onclick="window.location.href='User_login.php';">Login</button>
                    <button class="normal" onclick="window.location.href='Reset-password.php';">Change Password?</button>
                </div>
            </div>


            <a id="User-Close"><i class="fa fa-times"></i></a>
        </div>

        <!-- For Mobile And Ipad  -->
        <div class="mobile">
            <a><i class="fa-solid fa-magnifying-glass mob-click" id="#search-btn" onclick="popup('search-btn')"></i></a>
            <a href="User_login.php"><i class="fa-solid fa-user mob-click"></i> </a>
            <a href="#"><i class="fa-solid fa-cart-shopping mob-click"></i></a>
            <a><i id="bar" class="fas fa-outdent mob-click"> </i></a>
        </div>
        <!-- For Search Bar -->
        <form class="search-bar" id="search-btn">
            <input type="search" id="search-box" placeholder="Search Here">
            <label for="search-box" class="fa fa-search"></label>
        </form>

    </header>







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
    <footer class="section-p1">
        <div class="col">
            <a href="#" onclick="window.location.href='indexed.php';">
                <h2>CRAFTHOLIC</h2>
            </a>
            <h4>Contact</h4>
            <p><strong>Address:</strong> C/37 Nishant Banglows, Ahmedabad</p>
            <p><strong>Phone:</strong> 9428913811 / 9428913811</p>
            <p><strong>Hours:</strong> 10:00 - 18:00, Mon-Sat</p>
            <p><strong>Email:</strong> craftholic@gmail.com</p>
            <div class="follow">
                <h4>Follow Us</h4>
                <div class="icon">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-pinterest-p"></i>
                    <i class="fab fa-youtube"></i>
                </div>
            </div>
        </div>
        <div class="col">
            <h4>About</h4>
            <a href="#">About Us</a>
            <a href="#">Delivery Information</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms & Conditions</a>
            <a href="ContectUS.php">Contact Us</a>
        </div>
        <div class="col">
            <h4>My Account</h4>
            <a href="login.php">Login</a>
            <a href="#">View Cart</a>
            <a href="#">My Wishlist</a>
            <a onclick="track_order('Track-order')">Track order</a>
            <a href="ContectUS.php">Help</a>
        </div>
        <div class="col install">
            <h4>Install Apps</h4>
            <p>From App Store Or Google Play</p>
            <div class="row">
                <img src="image/img/pay/app.jpg" alt="Image Not Found">
                <img src="image/img/pay/play.jpg" alt="Image Not Found">
            </div>

            <p>Secured Payment Gateways</p>
            <img src="image/cc_icons.png" alt="Image Not Found">
        </div>
        <div class="copyright">
            <p>@2022 CRAFTHOLIC. All Rights Reserved. </p>
        </div>
    </footer>



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