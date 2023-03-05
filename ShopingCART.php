<?php

session_start();



?>

<!DOCTYPE html>
<html lang="en">
<?php
include("../craftholic/Includes/config.php");
include("../craftholic/Includes/Connection.php");


// For Update Cart Product Quentity
if (isset($_POST['Update_Cart_btn'])) {
    $Update_Quantity = $_POST['Update_Quantity'];
    $Update_Quantity_id = $_POST['Update_Quantity_id'];

    // Query
    $Update_Quantity_Query = mysqli_query($conn, "UPDATE `cart` SET `Quantity`='$Update_Quantity' WHERE `id` = '$Update_Quantity_id'");
    if ($Update_Quantity_Query) {
        header('location:ShopingCART.php');
    }
}

// For Remove Crt Product
if (isset($_GET['Remove'])) {
    $Remove_ID = $_GET['Remove'];
    mysqli_query($conn, "DELETE FROM `cart` WHERE `id` = '$Remove_ID'");
    header('location:ShopingCART.php');
} else {
    // echo"Your Cart is Empty!";

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

    <!-- Cart Section -->
    <section id="cart" class="section-p1">
        <?php
        // First Check if User has login or not
        // if not then it will display this message
        if (!isset($_SESSION['UserFirstName'], $_SESSION['UserLastName'])) {
            echo "  <div class='Empty-Crt section-m1'>
                    <h1> You Need to <span>Login !</span></h1>
                    <a href='User_login.php' class='normal'>Login now</a>
                </div>";
        }
        // if login then continue
        else {

        ?>
            <table width="100%">
                <thead>
                    <tr>
                        <td>Remove</td>
                        <td>Image</td>
                        <td>Product</td>
                        <td>Price</td>
                        <td>Quantity</td>
                        <td>SubTotal</td>
                    </tr>
                </thead>
                <tbody>
                    <?php




                    // Display Product 
                    $Select_Cart = mysqli_query($conn, "SELECT * FROM `cart`");
                    $Grand_total = 0;
                    if (mysqli_num_rows($Select_Cart) > 0) {
                        while ($Fetch_Cart = mysqli_fetch_assoc($Select_Cart)) {
                    ?>
                            <tr>
                                <td><a href="ShopingCART.php?Remove=<?php echo $Fetch_Cart['id']; ?>" onclick="return confirm('Remove Item From Cart??')"><i class="fa-solid fa-xmark"></i></a></td>
                                <td><img src='/craftholic/Admin/images/<?php echo $Fetch_Cart['Image']; ?>'></td>
                                <td><?php echo $Fetch_Cart['Name']; ?></td>
                                <td>&#8360;<?php echo number_format($Fetch_Cart['Price']); ?>/-</td>
                                <td>
                                    <form action="" method="post">
                                        <input type="hidden" value="<?php echo $Fetch_Cart['id']; ?>" min="1" name="Update_Quantity_id">
                                        <input type="number" value="<?php echo $Fetch_Cart['Quantity']; ?>" min="1" name="Update_Quantity" class="Quantity_Input">
                                        <input type="submit" value="Update" class=" update" name="Update_Cart_btn">
                                    </form>
                                </td>
                                <!-- For Sub total  -->
                                <td>&#8360;<?php echo $Sub_Total =  $Fetch_Cart['Price'] * $Fetch_Cart['Quantity']; ?>/-</td>
                            </tr>
                    <?php
                            $Grand_total += $Sub_Total;
                        };
                    } else {
                        echo "  <div class='Empty-Crt section-m1'>
                                <h1> Your Cart is <span>Empty !</span></h1>
                                <a href='Indexed.php' class='normal'>Start shopping..</a>
                            </div>";
                    }

                    ?>
                </tbody>

            </table>

        <?php
        }
        ?>
    </section>





    <!-- Cart Add -->
    <section id="Cart-add" class="section-p1">
        <div id="coupon">
            <h3>Apply <span>Coupon</span></h3>
            <div>
                <input type="text" placeholder="Enter Your Coupon" id="">
                <button class="normal">Apply</button>
            </div>
        </div>

        <div id="Sub-total">
            <h3>Cart Total</h3>
            <table>
                <tr>
                    <!-- For Grand Total -->
                    <td>Cart Grand Total</td>
                    <td><?php echo $Grand_total; ?></td>
                </tr>
                <tr>
                    <td>Shipping</td>
                    <td>Free</td>
                </tr>
                <tr>
                    <!-- For Total -->
                    <td><strong>Total</strong></td>
                    <td><strong><?php echo $Grand_total; ?></strong></td>
                </tr>
            </table>
            <a class="normal <?= ($Grand_total > 1) ? '' : 'disabled'; ?>" href="Payment-Shiping.php">Proceed To Checkout</a>
        </div>
    </section>

    <!-- footer -->
    <?php
    include("../craftholic/Includes/Footer.php")
    ?>





</html>

</body>


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