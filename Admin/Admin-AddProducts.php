<?php
include("../Includes/Connection.php");

error_reporting(0);
session_start();

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
    <title>CRAFTHOLIC-products</title>
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
        <!-- Profile Setion -->
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

        <!-- Add Products -->
        <h3 class="I-name-2 order-I-Name-2">
            Add Products
        </h3>

        <!-- Add Products -->
        <div id="Form-details">
            <form action="Add-Product-BkEnd.php" method="post" enctype="multipart/form-data">
                <input type="text" name="ProductName" placeholder="Product Name">
                <select name="ProductType">
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
                <input type="file" name="uploadFile" id="">
                <!-- <input type="file" name="uploadFile" id="">
                <input type="file" name="uploadFile" id="">
                <input type="file" name="uploadFile" id=""> -->
                <input type="text" name="ProductPrice" placeholder="Price">
                <textarea name="ProductDescription" placeholder="Product Description" cols="30" rows="3"></textarea>
                <div>
                    <input type="submit" value="Submit" name="Submit" class="normal">
                </div>
            </form>


        </div>

        <!-- Display Added Products -->
        <h3 class="I-name-2 ">
            Added Product
        </h3>

        <?php
        ?>

        <div class="Board">
            <table width="100%">
                <thead>
                    <tr>
                        <td>Product ID</td>
                        <td>Product Name</td>
                        <td>Product Type</td>
                        <td>Price</td>
                        <td>Image</td>
                        <td>Edit </td>
                        <td>Remove</td>
                    </tr>
                </thead>

                <?php
                $SelectProduct = mysqli_query($conn, "SELECT * FROM `products`");
                if (mysqli_num_rows($SelectProduct) > 0) {
                    while ($row = mysqli_fetch_assoc($SelectProduct)) {
                ?>
                        <tbody>
                            <tr>
                                <td>
                                    <h3><?php echo $row['P_ID']; ?></h3>
                                </td>
                                <td class="Product-name">
                                    <h5><?php echo $row['P_names']; ?></h5>
                                </td>

                                <td class="Product-type">
                                    <h5><?php echo $row['Category_Name']; ?></h5>
                                </td>

                                <td class="Price">
                                    <h5><?php echo $row['P_price']; ?></h5>
                                </td>

                                <td class="image">
                                    <img src="../Admin/images/<?php echo $row['P_Image1']; ?>" alt="Image not found">
                                </td>

                                <td class="Edit">
                                    <a href="Admin-Update-Products.php?edit=<?php echo $row['P_ID']; ?>">Edit</a>
                                </td>

                                <td class="Remove">
                                    <a href="Admin-AddProducts.php?delete=<?php echo $row['P_ID']; ?>">Delete</a>
                                </td>
                            </tr>
                        </tbody>
                <?php
                        header('Location:Admin-AddProducts.php');
                    };
                };
                ?>
            </table>
        </div>
    </section>
</body>

</html>

<?php





// For Product Delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `products` WHERE `P_ID` = $id") or die('Query Failed');
    header('Location:Admin-AddProducts.php');
}

?>