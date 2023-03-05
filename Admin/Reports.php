<?php
session_start();
include("../Includes/Connection.php");

if (!isset($_SESSION['AdminLoginID'])) {
    header("location:ADMIN_Login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRAFTHOLIC-reports</title>
    <!-- external CSS -->
    <link rel="stylesheet" href="../CSS/Admin.css">
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="../CH_favicon/favicon-32x32.png">
    <!-- Icon Library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body>

    <!-- Menu Section -->
    <?php include('IncludesAdmin/Menu.php'); ?>


    <section id="InterFace">
        <div class="Navigation">
            <div class="N1">
                <div>
                    <i class="fa-solid fa-bars" id="Menu-Btn"></i>
                </div>
                <div class="Search">
                    <i class="fa-solid fa-search"></i>
                    <input type="text" placeholder="Search" id="">
                </div>
            </div>


            <div class="Profile">
                <i class="fa-solid fa-bell"></i>
                <!-- <img src="../image/img/people/1.png" alt=""> -->
                <h2><?php
                    if ($_SESSION['AdminLoginID']) {
                        echo $_SESSION['AdminLoginID'];
                    }

                    ?>
                </h2>
            </div>
        </div>

        <!-- Order Reports -->
        <h3 class="I-name-2 order-I-Name-2">
            Order Reoprts
        </h3>

        <div id="Form-details">
            <form method="post" action="ReportsView.php">
                <input type="date" name="StartDate" id="" required>
                <span>to</span>
                <input type="date" name="EndDate" class="txtDate" required>
                <div>
                    <input type="submit" value="Submit" name="Submit" class="normal">
                </div>
            </form>
        </div>

        <!-- Order Reports -->
        <h3 class="I-name-2 order-I-Name-2">
            Product Reoprts
        </h3>

        <div id="Form-details">
            <form method="post" action="ReportsView.php">
                <input type="date" name="P_StartDate" id="">
                <span>to</span>
                <input type="date" name="P_EndDate" id="">
                <div>
                    <input type="submit" value="Submit" name="Done" class="normal">
                </div>
            </form>
        </div>

        <!-- Customer Reports -->
        <h3 class="I-name-2 order-I-Name-2">
            Customer Reoprts
        </h3>

        <div id="Form-details">
            <form method="post" action="ReportsView.php">
                <input type="date" name="C_StartDate" id="">
                <span>to</span>
                <input type="date" name="C_EndDate" id="">
                <div>
                    <input type="submit" value="Submit" name="Finish" class="normal">
                </div>
            </form>
        </div>


    </section>

</body>


</html>