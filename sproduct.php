<!DOCTYPE html>
<html lang="en">
<?php

// Basic File
require('/xampp/htdocs/craftholic/Includes/Connection.php');
require('/xampp/htdocs/craftholic/Includes/config.php');

session_start();
// Dislay Product
if (isset($_GET['id'])) {
    $Product_id = $_GET['id'];
    $ProductQuery = "SELECT * FROM `products` WHERE `P_ID` = $Product_id";
    $Result = mysqli_query($conn, $ProductQuery);
    $Row = mysqli_fetch_assoc($Result);

    // 
    // $Product_ID = $_POST['Product_ID'];
    $Product_Image = $Row['P_Image1'];
    $Product_Name = $Row['P_names'];
    $Product_Price = $Row['P_price'];
    $Product_Desc = $Row['P_description'];
    $Product_Type = $Row['Category_Name'];
}


// Add To Cart Backend
if (isset($_POST['Add_To_Cart'])) {
    $Product_ID = $Product_id;
    $Product_Name = $Product_Name;
    $Product_Price = $Product_Price;
    $Product_Image = $Product_Image;
    $Product_Quantity = 1;

    $Select_Cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE `Name` = '$Product_Name'");

    if (mysqli_num_rows($Select_Cart) > 0) {
        echo "<script>
                alert(' already Added');
            </script>";
    } else {
        $insert_Product = mysqli_query($conn, "INSERT INTO `cart`(`Name`, `Price`, `Image`, `Quantity`) VALUES ('$Product_Name','$Product_Price','$Product_Image','$Product_Quantity')");
        // echo"<script>
        //         alert('Added');
        //     </script>";
    }
}


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
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
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

        <!-- For UserLogin & Resposive  -->
        <?php
        require('../craftholic/Includes/Header.php');
        ?>
    </header>


    <!-- Product Details -->
    <section id="prodetails" class="section-p1">
        <div class="single-pro-image">
            <img src="/craftholic/Admin/images/<?php echo $Product_Image; ?>" width="100%" alt="HomeDecor Image Not Load" id="mainimg">
            <!-- <div class="small-img-group">
                            <div class="small-img-col">
                                <img src="image/Product Image/Home decor/home decor 1.1/image_1.1.jpg" width="100%" class="small-img" alt="">
                            </div>
                            <div class="small-img-col">
                                <img src="image/Product Image/Home decor/home decor 1.1/single product details/product1.png" width="100%" class="small-img" alt="">
                            </div>
                            <div class="small-img-col">
                                <img src="image/Product Image/Home decor/home decor 1.1/image_1.1.jpg" width="100%" class="small-img" alt="">
                            </div>
                            <div class="small-img-col">
                                <img src="image/Product Image/Home decor/home decor 1.1/image_1.1.jpg" width="100%" class="small-img" alt="">
                            </div>
            </div> -->
        </div>
        <div class="single-pro-details">
            <form action="" method="post">
                <h6>Home / <?php echo $Product_Type ?></h6>
                <h4><?php echo $Product_Name; ?></h4>
                <h2>&#8360; <?php echo $Product_Price; ?> </h2>
                <!-- <input type="number" value="1"> -->

                <input type="submit" value="Add To Cart" class="normal cart-single-product" name="Add_To_Cart">

                <h4>Product Details</h4>
                <span>
                    <?php echo $Product_Desc; ?>
                </span>

                <input type="hidden" name="Product_ID" value="<?php echo $Product_id; ?>">
                <input type="hidden" name="Product_Name" value="<?php echo $Product_Name; ?>">
                <input type="hidden" name="Product_Price" value="<?php echo $Product_Price; ?>">
                <input type="hidden" name="Product_Image" value="<?php echo $Product_Image; ?>">

            </form>
        </div>
    </section>

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

    <!-- footer -->
    <?php
    include("../craftholic/Includes/Footer.php")
    ?>

    <!-- For Change Image by Clicking  -->
    <script>
        const MainImg = document.getElementById('mainimg');
        const smallimg = document.getElementsByClassName('small-img');

        smallimg[0].onclick = function() {
            MainImg.src = smallimg[0].src;
        }
        smallimg[1].onclick = function() {
            MainImg.src = smallimg[1].src;
        }
        smallimg[2].onclick = function() {
            MainImg.src = smallimg[2].src;
        }
        smallimg[3].onclick = function() {
            MainImg.src = smallimg[3].src;
        }
    </script>

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

    <!-- for slider -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            grabCursor: true,
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>

    <!-- JavaScript File -->
    <script src="JavaScript/script.js?v=<? $version ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="JavaScript/swiper.js"></script>

</html>
</body>