<?php
include("../Includes/Connection.php");

error_reporting(0);

session_start();


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
    <title>CRAFTHOLIC-Orders/Update</title>
    <!-- external CSS -->
    <link rel="stylesheet" href="../CSS/Admin.css">
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="../CH_favicon/favicon-32x32.png">
    <!-- Icon Library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body>

    <!-- Menu Section -->
    <section id="Menu">
        <div class="logo">
            <h2><a href="../Admin/CRAFTHOLIC-admin.php"> CRAFTHOLIC</a></h2>
        </div>

        <div class="items">
            <li>
                <i class="fa-solid fa-chart-pie"></i>
                <a href="../Admin/CRAFTHOLIC-admin.php">Dashboard</a>
            </li>
            <li>
                <i class="fa-solid fa-bag-shopping"></i>
                <a href="../Admin/Admin-orders.php">Orders</a>
            </li>
            <li class="Active">
                <i class="fa-solid fa-circle-plus"></i>
                <a href="../Admin/Admin-AddProducts.php">Add Products/Update</a>
            </li>
            <li>
                <i class="fa-solid fa-rotate-left"></i>
                <a href="#">Returns/Replace Products</a>
            </li>
            <li>
                <i class="fa-solid fa-comment-dots"></i>
                <a href="#">Feedbacks</a>
            </li>
            <li>
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                <a href="../Admin/ADMIN_Login.php">Log-out</a>
            </li>

        </div>

    </section>


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
                <h2><?php
                    if ($_SESSION['AdminLoginID']) {
                        echo $_SESSION['AdminLoginID'];
                    }

                    ?>
                </h2>
            </div>
        </div>

        <!--Update Products  -->
        <h3 class="I-name-2 ">
            Update Products
        </h3>

        <div id="Update_products">
            <?php
            if (isset($_GET['edit']));
            $Edit_ID = $_GET['edit'];
            $Edit_Query = mysqli_query($conn, "SELECT * FROM `products` WHERE `P_ID` = $Edit_ID");
            if (mysqli_num_rows($Edit_Query) > 0) {
                while ($Fetch_Edit = mysqli_fetch_assoc($Edit_Query)) {
            ?>
                    <form action="Update-Product-BkEnd.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="old_image" placeholder="ID" value="<?php echo $Fetch_Edit['P_Image1']; ?>">
                        <input type="hidden" name="Updated_P_ID" placeholder="ID" value="<?php echo $Fetch_Edit['P_ID']; ?>">
                        <img src="../Admin/images/<?php echo $Fetch_Edit['P_Image1']; ?>" alt="Image not found" height="200" width="200">
                        <input type="text" name="Updated_P_Name" placeholder="Product Name" value="<?php echo $Fetch_Edit['P_names']; ?>">
                        <select name="Updated_P_Type" value="<?php echo $Fetch_Edit['Category_Name']; ?>">
                            <option selected> Product Type</option>
                            <?php
                            $Category_Select = "SELECT * FROM `product_category`";
                            $query = mysqli_query($conn, $Category_Select);

                            while ($row = mysqli_fetch_assoc($query)) {
                                $Category_Name = $row['Category_Name'];
                                $Category_ID = $row['Category_ID'];

                                echo " <option >$Category_Name</option>";
                            }
                            ?>
                        </select>
                        <input type="text" name="Updated_P_Price" placeholder="Price" value="<?php echo $Fetch_Edit['P_price']; ?>">
                        <input type="file" name="uploadFile" id="">
                        <textarea name="Updated_P_Description" placeholder="Product Description" cols="30" rows="3"><?php echo $Fetch_Edit['P_description']; ?></textarea>
                        <div>
                            <input type="submit" value="Update" name="Update" class="normal">
                        </div>
                    </form>
            <?php
                };
            };
            ?>
        </div>
    </section>
</body>

</html>

<?php

?>