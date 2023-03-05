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
    <title>CRAFTHOLIC-Orders</title>
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

        <h3 class="I-name-2 order-I-Name-2">
            Panding Orders Queue
        </h3>

        <div class="Board">
            <table width="100%">
                <thead>
                    <tr>
                        <td>Order id</td>
                        <td>Product Name with Quentity</td>
                        <td>Price</td>
                        <td>Date</td>
                        <td>Status</td>
                        <td>View</td>
                    </tr>
                </thead>

                <?php

                $Select_Orders = mysqli_query($conn, "SELECT * FROM `shippingaddress`");
                if (mysqli_num_rows($Select_Orders) > 0) {
                    while ($row = mysqli_fetch_assoc($Select_Orders)) {
                ?>
                        <tbody>
                            <tr>
                                <td class="product-ID">
                                    <h3><?php echo $row['sa_id']; ?></h3>
                                </td>

                                <td class="Product-name">
                                    <h5><?php echo $row['Totalproducts']; ?></h5>
                                </td>

                                <td class="Price">
                                    <h5><?php echo $row['TotalPrice']; ?></h5>
                                </td>

                                <td class="Date">
                                    <h5><?php echo $row['Date']; ?></h5>
                                </td>

                                <td class="Active">
                                    <?php
                                    if ($row['Status'] == 'Active') {
                                        echo '  <p style="  background: #93f29b;
                                            padding: 2px 10px;
                                            display: inline-block;
                                            border-radius: 14px;
                                            color: #2b2b2b;">' . $row['Status'] . '</p>';
                                    } elseif ($row['Status'] == 'Dispatch') {
                                        echo '  <p style="  background: #ffc727;
                                            padding: 2px 10px;
                                            display: inline-block;
                                            border-radius: 14px;
                                            color: #FFF;">' . $row['Status'] . '</p>';
                                    } else {
                                        echo '  <p style="  background: #f38b00;
                                        padding: 2px 10px;
                                        display: inline-block;
                                        border-radius: 14px;
                                        color: #FFF;">' . $row['Status'] . '</p>';
                                    }
                                    ?>
                                </td>

                                <form action="OrderDetails.php" method="get">
                                    <td class="Edit">
                                        <a href="OrderDetails.php?Order_id=<?php echo $row['sa_id']; ?>">View</a>
                                    </td>
                                </form>
                            </tr>

                        </tbody>
                <?php
                    }
                }
                ?>


            </table>
        </div>
    </section>




</body>

</html>