<?php
include("../Includes/Connection.php");
if (isset($_POST['Update'])) {
    $Updated_P_ID = $_POST['Updated_P_ID'];
    $Updated_P_Name = $_POST['Updated_P_Name'];
    $Updated_P_Type = $_POST['Updated_P_Type'];
    $Updated_P_Price = $_POST['Updated_P_Price'];
    $filename = $_POST["old_image"];

    //check new image upload or not
    if (!empty($_FILES["uploadFile"]["name"])) {
        $filename = time() . '-' . $_FILES["uploadFile"]["name"];
    }
    $tempname =  $_FILES["uploadFile"]["tmp_name"];
    $folder = "../Admin/images/" . $filename;
    $Updated_P_Description = $_POST['Updated_P_Description'];

    $Updated_Query = mysqli_query($conn, "UPDATE `products` SET `P_names`='$Updated_P_Name',`Category_Name`='$Updated_P_Type',`P_price`='$Updated_P_Price',`P_Image1`='$filename',`P_description`='$Updated_P_Description' WHERE `P_ID`='$Updated_P_ID'");

    if ($Updated_Query) {

        //check new image upload or not
        if (!empty($_FILES["uploadFile"]["name"])) {
            $upload = move_uploaded_file($tempname, $folder);

            //chceck old image exist or not
            if ($_POST["old_image"] != '') {
                unlink("../Admin/images/" . $_POST["old_image"]);
            }
        }

        header("location:Admin-AddProducts.php");
    }
}
