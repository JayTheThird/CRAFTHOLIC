<!DOCTYPE html>
<html lang="en">
<?php
// Basic File
require('/xampp/htdocs/craftholic/Includes/Connection.php');
include("../craftholic/Includes/config.php");

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

    <!-- For Search Bar -->
    <form method="get" id="Search-Bar">
        <input type="text" name="search" placeholder="Search Here">
    </form>

    <!-- NavBar -->
    <header>
        <a href="#" onclick="window.location.href='indexed.php';">
            <h2>CRAFTHOLIC</h2>
        </a>
        <nav id="nav">
            <a href="Indexed.php">Home</a>
            <a href="homedecor.php">Home Decor</a>
            <a href="WallDecor.php">Wall Decor</a>
            <a class="active" href="Gifting.php">Gifting</a>
            <a href="Contectus.php">ContactUS</a>
            <a id="close"><i class="fa fa-times"></i></a>
        </nav>


        <!-- For UserLogin & Resposive  -->
        <?php
        require('../craftholic/Includes/Header.php');
        ?>



    </header>

    <!-- Hero Section -->
    <section id="page-header">

        <h1><span>#</span>Gifting</h1>
        <p>Save More With Coupons & Up to <span>30% Off!</span></p>

    </section>


    <!-- Prodect Section -->
    <section id="product-sec" class="section-p1 upcommin-prodcut">
        <div class="pro-container">
            <?php
            // Searching
            $search = '';
            $url_components = parse_url($_SERVER['REQUEST_URI']);
            if (isset($url_components['query'])) {

                parse_str($url_components['query'], $params);
                $search = '';
                if (isset($params['search'])) {
                    $search = $params['search'];
                    if ($params['search']) {
                        echo "<a href='Gifting.php' class='normal Cart-Btn cart1'><i class='fa-solid fa-xmark'></i></a>";
                    }
                }
            }


            // New Query
            $Select_Product = mysqli_query($conn, "SELECT * FROM `products` where P_names like '%$search%'");
            if (mysqli_num_rows($Select_Product) > 0) {
                while ($Fetch_Products = mysqli_fetch_assoc($Select_Product)) {
                    if ($Fetch_Products['Category_Name'] == "Gifting") {
            ?>
                        <div class="pro">
                            <form action="" method="post">
                                <img src="/craftholic/Admin/images/<?php echo $Fetch_Products['P_Image1']; ?>" alt=" Image Not Load">
                                <div class="des">
                                    <span>@
                                        <?php echo $Fetch_Products['Category_Name']; ?>
                                    </span>
                                    <h5 id="the-list" class="PName"><?php echo $Fetch_Products['P_names']; ?></h5>
                                    <h4> &#8360;
                                        <?php echo $Fetch_Products['P_price']; ?>
                                    </h4>
                                </div>

                                <button>
                                    <a href="sproduct.php?id=<?php echo $Fetch_Products['P_ID']; ?>" class="normal Cart-Btn cart">View Product</a>
                                </button>
                            </form>
                        </div>

            <?php
                    };
                };
            };
            ?>

        </div>
    </section>


    <!-- Pagination -->
    <section id="pagination" class="section-p1 ">
        <a href="#">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
        <a href="#"><i class="fa fa-long-arrow-alt-right"></i></a>

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