<!DOCTYPE html>
<html lang="en">
<?php

include '../craftholic/Includes/config.php';

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
            <a href="Indexed.php">Home</a>
            <a class="" href="homedecor.php">Home Decor</a>
            <a class="" href="Walldecor.php">Wall Decor</a>
            <a class="" href="Gifting.php">Gifting</a>
            <a href="Contectus.php">ContactUS</a>
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
                <div class="othr-stuf">
                    <a onclick="track_order('Track-order')" href="#Track-order">Track order</a>
                    <p>
                        Any Trouble with Product, <a href="ContectUS.php">Contect US!</a>
                    </p>
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


    <!-- Hero Section -->
    <section id="page-header" class="blog-header">

        <h1><span class="cont-us_span-size-h1">#</span>Want to Return/Replace a Product.</h1>
        <p><span class="cont-us_span-size-p">Don't Worry</span>, we are here to listen you!</p>

    </section>



    <!-- Form Details -->
    <section id="Form-details" class="Return-Product-form">
        <form method="POST" autocomplete="off">
            <h2><span>RETURN/REPLACE </span> POLICY</h2>
            <strong>How do I return or replace an item?</strong>
            <p><strong>Note:</strong> Filling out this form does not guarantee or imply approval for a return authorization. Completion of this form will send the necessary information regarding your order to Saller/owner for review. After your form is submitted you will be contacted within 24 business hours. </p>

            <h2><span>customer </span> Information</h2>
            <input type="text" name="FirstName" placeholder="First Name">
            <input type="text" name="LastName" placeholder="Last name">
            <input type="text" name="ContectNumber" placeholder="Phone Number">
            <input type="text" name="EmailID" placeholder="Email">

            <h2><span>Order</span> Information</h2>
            <input type="text" name="OrderID" placeholder="Order ID">
            <input type="text" name="Quantity" placeholder="Quantity">
            <select name="Reason" id="Chose Reason">
                <option value="Reason" selected>Chose Reason</option>
                <option value="Reason" >Replace Product </option>
                <option value="ProductConditions">Product Conditions</option>
                <option value="OpenWithoutpackaging">Open Without packaging </option>
                <option value="OpenW/allpackaging">Open W/all packaging</option>
            </select>
            <textarea type="text" name="ReasonTOreturn" placeholder="reason to return product" cols="30" rows="5"></textarea>


            <p>I agree that I am subject to a 5% Cancellation Fee or 15% Re-Stocking Fee along with all shipping charges on the cancelled/returned item(s).</p>


            <button class="normal" name="submit">Submit</button>

            <!-- <div class="Address-return">
                <h2 >Address to courier your product</h2>
                <p>
                    <strong>Address : </strong> Nishant Banglows, Near Poonam Bakri, Ahmedabad, Gujarat 382350
                    <br><strong> Email :</strong> craftholic@gmail.com
                    <br><strong> Contect Number :</strong> 1234567890, 0987654321
                </p>
            </div> -->


        </form>


    </section>

    <section>
        <div class="terms-container section-p1">
            <div class="row">
                <div>
                    <div class="terms-title">
                        <h1>Terms &amp; Conditions</h1>
                        <hr>
                    </div>

                    <div class="terms-body">
                        <!-- <hr> -->
                        <div>
                            <h3>General</h3>
                            <p>
                                By using our website, you agree to the Terms of Use. We may change or update these terms so please check this page regularly. We do not represent or warrant that the information on our website is accurate, complete, or current. This includes pricing and availability information. We reserve the right to correct any errors or omissions and to change or update information at any time without giving prior notice.
                            </p>
                        </div>
                        <div>
                            <h3>Correction of Errors and Inaccuracies</h3>
                            <p>
                                The information on the site may contain typographical errors or inaccuracies and may not be complete or current. The Main Label, therefore, reserves the right to correct any errors, inaccuracies, or omissions and to change or update information at any time with or without prior notice (including after you have submitted your order). Please note that such errors, inaccuracies, or omissions may relate to product description, pricing, product availability, or otherwise.
                            </p>
                        </div>
                        <div>
                            <h3>Return Policy</h3>
                            <p>

                                If for any reason Clients are not satisfied with an order, the items can be returned within 7 days of the orders delivery date.
                            </p>
                        </div>
                        <div>
                            <h3>incorrect & defective items</h3>
                            <p>

                                If you receive an incorrect item or if the merchandise was damaged or defective, please contact customer service by email at <a>craftholic@gmail.com</a>
                            </p>
                        </div>
                        <div>
                            <h3>Return instructions</h3>
                            <p>

                                To request a return, CRAFTHOLIC will send a confirmation email, with the Return Authorization Number (RAN), the shipping address, and instructions for the return shipment.
                                Returns must be shipped within 7 days of the orders delivery date.
                                In the case that the return shipment requires pickup or the payment of any added fees, CRAFTHOLIC reserves the right to refuse returns sent with a different courier than specified in the confirmation email.
                                CRAFTHOLIC reserves the right to refuse returns that are unauthorized and/or not sent in accordance with the Return Policy detailed on the website. In the case of unauthorized or non-standard returns, the merchandise will be returned to the shipping address specified in the original order. If an unauthorized return is accepted CRAFTHOOLIC will deduct a 10% administrative/re-stocking fee from the refund.
                            </p>
                            <hr>
                        </div>
                        <!-- FOOTER -->
                        <!-- <div class="container terms_footer">
                            <h3>Can't find what you're looking for? <a href="www.craftholic.com">Email us</a></h3>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <!-- /.container -->
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