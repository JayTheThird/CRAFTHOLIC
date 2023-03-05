<!DOCTYPE html>
<html lang="en">
<?php

// Basic Files
include("../craftholic/Includes/config.php");
include("../craftholic/Includes/Connection.php");

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
    <script src="JavaScript/Onclick_Function.js?<?php $version ?>"></script>

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
            <a href="homedecor.php">Home Decor</a>
            <a class="" href="Walldecor.php">Wall Decor</a>
            <a class="" href="Gifting.php">Gifting</a>
            <a href="Contectus.php">ContactUS</a>
            <a id="close"><i class="fa fa-times"></i></a>
        </nav>




        <?php
        require('../craftholic/Includes/Header.php');
        ?>
    </header>


    <!-- Hero Section -->
    <section id="page-header" class="blog-header">

        <h1><span class="cont-us_span-size-h1">#</span>CART</h1>
        <p>It's an <span class="cont-us_span-size-p">'Add to Cart'</span>, Kinda Day !</p>


    </section>


    <!-- Payment-Gatway-Address -->
    <section id="Payment-Gatway-Address" class="section-p1 section-m1">
        <form method="post" action="ShippingBackend.php">
            <!-- Total order  -->
            <div class="display-Order">
                <?php
                $Select_Cart = mysqli_query($conn, "SELECT * FROM `cart`");
                $Total = 0;
                $Grand_Total = 0;
                if (mysqli_num_rows($Select_Cart) > 0) {
                    while ($Fetch_Cart = mysqli_fetch_assoc($Select_Cart)) {
                        $Total_Price = ($Fetch_Cart['Price'] * $Fetch_Cart['Quantity']);
                        $Grand_Total = $Total += $Total_Price;
                ?>
                        <span><?= $Fetch_Cart['Name']; ?>(<?= $Fetch_Cart['Quantity']; ?>)</span>


                <?php
                    };
                } else {
                    echo " <div class=''>
                            <span>Your Cart is Empty</span>
                         </div>";
                }
                ?>
                <h3 class="Grand-Total">Grand Total : <?= $Grand_Total; ?></h3>
            </div>
            <div class="row">

                <div class="col left">

                    <div class="inputBOX">
                        <span>Full Name: </span>
                        <input type="text" name="Name" placeholder="name" required minlength="4" maxlength="15" size="10">
                    </div>
                    <div class="inputBOX">
                        <span>Email : </span>
                        <input type="email" name="Email" placeholder="email " required minlength="5" maxlength="30">
                    </div>
                    <div class="inputBOX">
                        <span>Address line 1 : </span>
                        <input type="text" name="Flat" placeholder="flat no " required>
                    </div>
                    <div class="inputBOX">
                        <span>City : </span>
                        <input type="text" name="City" placeholder="city " required minlength="5" maxlength="20" size="30">
                    </div>
                    <div class=" Payment-Method">
                        <span>Country </span>
                        <select name="Country" id="" required>
                            <option value="India">India</option>
                        </select>
                    </div>

                </div>
                <div class="col right">

                    <div class="inputBOX">
                        <span>Number </span>
                        <input type="tel" name="Number" placeholder="1234567890" pattern="[0-9]{6}[0-9]{2}[0-9]{2}" required maxlength='10' minlength="1" required>
                    </div>

                    <div class=" Payment-Method">
                        <span>Payment Method </span>

                        <select name="Method" id="" required>
                            <option value="Select Payment Option">Payment Option </option>
                            <option value="Razorpay">Razorpay</option>
                        </select>
                    </div>
                    <div class="inputBOX">
                        <span>Address line 2 : </span>
                        <input type="text" name="Street_Name" placeholder="street Name " required>
                    </div>


                    <div class="inputBOX">
                        <span>State : </span>
                        <input type="text" name="State" placeholder="state" required minlength="5" maxlength="20" size="30">
                    </div>
                    <div class="inputBOX">
                        <span>Pin Code </span>
                        <input type="text" name="PinCode" placeholder="pin code" required maxlength="6" size="6">
                    </div>
                    <div class="inputBOX">
                        <input type="hidden" name="Status" value="Active" placeholder="Status">
                    </div>

                </div>
            </div>
            <!-- <input type="submit" value="Back" class="button1 normal"> -->
            <input type="submit" value="Order Now" class="button2 normal" name="Order_btn">



        </form>


    </section>

    <!-- footer -->
    <?php
    include("../craftholic/Includes/Footer.php")
    ?>







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

</body>

</html>