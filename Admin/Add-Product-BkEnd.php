<?php
include("../Includes/Connection.php");
if (isset($_POST['Submit']) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $Product_Date = date("Y/m/d");
    $ProductName = $_POST['ProductName'];
    $ProductType = $_POST['ProductType'];
    // Images
    //check new image upload or not
    $filename = '';
    if (!empty($_FILES["uploadFile"]["name"])) {
        $filename = time() . '-' . $_FILES["uploadFile"]["name"];
    }
    $tempname =  $_FILES["uploadFile"]["tmp_name"];
    $folder = "../Admin/images/" . $filename;
    // ----
    $ProductPrice = $_POST['ProductPrice'];
    $ProductDescription = $_POST['ProductDescription'];

    if (empty($ProductName) or empty($ProductType) or empty($filename) or empty($ProductPrice) or empty($ProductDescription)) {
        echo "<script>
        alert('Fill the input First!!');
        </script>";
    } else {
        $ProductInsert = "INSERT INTO `products`( `P_names`, `Category_Name`, `P_price`, `P_Image1`, `P_description`,`P_Date`) VALUES ('$ProductName','$ProductType','$ProductPrice','$filename','$ProductDescription','$Product_Date')";

        $InsertQuery = mysqli_query($conn, $ProductInsert);

        if ($InsertQuery) {
            $_POST = array();
            if (!empty($_FILES["uploadFile"]["name"])) {
                $upload = move_uploaded_file($tempname, $folder);
            }
            header("location:Admin-AddProducts.php");
            // echo "<script>
            //         alert('done!');
            //     </script>";
        }
    }
}
