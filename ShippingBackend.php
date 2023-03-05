<?php

// Basic Files
include("../craftholic/Includes/config.php");
include("../craftholic/Includes/Connection.php");



// Order Query
if (isset($_POST['Order_btn'])) {


    $date = date("Y/m/d");
    $newDate = date("d-m-Y", strtotime($date));
    $Status = $_POST['Status'];
    $Name = $_POST['Name'];
    $Number = $_POST['Number'];
    $Email = $_POST['Email'];
    $Method = $_POST['Method'];
    $Flat = $_POST['Flat'];
    $Street_Name = $_POST['Street_Name'];
    $City = $_POST['City'];
    $State = $_POST['State'];
    $Country = $_POST['Country'];
    $PinCode = $_POST['PinCode'];



    if (empty($Name && $Number && $Email && $Method && $Flat && $Street_Name && $City && $State && $Country && $PinCode && $Status)) {
        // header("location:Payment-Shiping.php");
        echo "<script>
                alert('Fill The Form First'); 
                location.replace('Payment-Shiping.php');
            </script>";
    } else {
        // Query
        $Cart_Query = mysqli_query($conn, "SELECT * FROM `cart` ");
        $Price_Total = 0;
        if (mysqli_num_rows($Cart_Query) > 0) {
            while ($Product_Item = mysqli_fetch_assoc($Cart_Query)) {
                $Product_Name[] = $Product_Item['Name'] . '(' . $Product_Item['Quantity'] . ')';
                $Prouct_Price = ($Product_Item['Price'] * $Product_Item['Quantity']);
                $Price_Total += $Prouct_Price;
            }
        }
        // Address Query
        $Proceduct = $Prouct_Price;
        $Total_Product = implode(', ', $Product_Name);
        $Detail_Query = mysqli_query($conn, "INSERT INTO `shippingaddress`( `date`,`Status`,`Name`, `Number`, `Email`, `Method`, `Flat`, `Street`, `City`, `State`, `Country`, `Pincode`, `Totalproducts`, `TotalPrice`) VALUES ('$date','$Status','$Name','$Number','$Email','$Method','$Flat','$Street_Name','$City','$State','$Country','$PinCode','$Total_Product','$Price_Total')") or die('Query Faild');
        if ($Cart_Query && $Detail_Query) {

            echo " 
            
            
            <form action='' method='post' style = 'margin: 190px 450px;
            font-size: 20px;
            word-spacing: 2px;' >
                    <span style='font-size: 22px;
                    color: #AE0000;
                    font-weight: 600;'> Customer Name : </span>   $Name
                    <br />
                    <span style='font-size: 22px;
                    color: #AE0000;
                    font-weight: 600;'>Customer Number : </span>   $Number
                    <br />
                    <span style='font-size: 22px;
                    color: #AE0000;
                    font-weight: 600;'>Customer Email : </span>   $Email
                    <br />
                    <span style='font-size: 22px;
                    color: #AE0000;
                    font-weight: 600;'>Product Name With Quentity : </span> $Total_Product
                    <br />
                    <span style='font-size: 22px;
                    color: #AE0000;
                    font-weight: 600;'>Product Price : </span> $Price_Total
                    <br />
                    <span style='font-size: 22px;
                    color: #AE0000;
                    font-weight: 600;'>Payment : </span> Done
                    <br />
                    <span style='font-size: 22px;
                    color: #AE0000;
                    font-weight: 600;'>Date : </span> $newDate
                    <br />
                    <span style='font-size: 22px;
                    color: #AE0000;
                    font-weight: 600;'>Address : </span>   $Flat 
                                $Street_Name,
                                $City, 
                                $State 
                                $Country 
                                $PinCode 
                
                    <a href='Thankyou.php?Invoice=$Name' 
                        style='font-size: 15px;
                                font-weight: 600;
                                padding: 13px 30px;
                                position: relative;
                                top: 50px;
                                color: #fff;
                                background: maroon;
                                border-radius: 4px;
                                cursor: pointer;
                                border: none;
                                outline: none;
                                transition: all 0.2s ease;
                                text-decoration: none;
                                letter-spacing: 5px;
                                font-family: sans-serif;'>Continue</a>
                    </form>";

            // header('location:Thankyou.php');



        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRAFTHOLIC</title>
</head>

<body>

</body>

</html>