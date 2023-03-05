<?php
session_start();
include("../Includes/Connection.php");

// Mailer
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require("../PHP Mailer/Exception.php");
require("../PHP Mailer/PHPMailer.php");
require("../PHP Mailer/SMTP.php");

if (!isset($_SESSION['AdminLoginID'])) {
    header("location:ADMIN_Login.php");
}

// Order View 
if (isset($_GET['Order_id'])) {
    $Order_id = $_GET['Order_id'];
    // Order Query
    $Order_Query = "SELECT * FROM `shippingaddress` WHERE `sa_id` = $Order_id";
    $Result = mysqli_query($conn, $Order_Query);

    // Fetch Deta
    $Row = mysqli_fetch_assoc($Result);

    $Order_Name = $Row['Totalproducts'];
    $Order_Price = $Row['TotalPrice'];
    $Cust_Name = $Row['Name'];
    $Cust_Number = $Row['Number'];
    $Cust_Email = $Row['Email'];
    $Date = $Row['Date'];
    $Method = $Row['Method'];

    // Address
    $Cust_Flat = $Row['Flat'];
    $Cust_Street = $Row['Street'];
    $Cust_City = $Row['City'];
    $Cust_State = $Row['State'];
    $Cust_Country = $Row['Country'];
    $Cust_Pincode = $Row['Pincode'];
}

// Invoice
if (isset($_POST['Get_Invoice'])) {

    require_once "../vendor/autoload.php";
    // $Html = $Order_id;
    //     // Internal CSS
    $Css = "@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');

            body {
                background-color: #F6F6F6;
                margin: 0;
                padding: 0;
                font-family: 'Poppins';

            }

            h1,
            h2,
            h3,
            h4,
            h5,
            h6 {
                margin: 0;
                padding: 0;
            }

            p {
                margin: 0;
                padding: 0;
            }

            .container {
                width: 80%;
                margin-right: auto;
                margin-left: auto;
            }

            .brand-section {
                background-color: maroon;
                padding: 10px 40px;
            }

            .logo {
                width: 50%;
            }

            .row {
                display: flex;
                flex-wrap: wrap;
            }

            .col-6 {
                width: 50%;
                flex: 0 0 auto;
            }

            .text-white {
                color: #fff;
                letter-spacing: 1px;
                word-spacing: 3px;
            }

            .company-details {
                float: right;
                text-align: right;
            }

            .body-section {
                padding: 16px;
                border: 1px solid gray;
            }

            .heading {
                font-size: 20px;
                margin-bottom: 08px;
            }

            .sub-heading {
                color: #262626;
                margin-bottom: 05px;
            }

            table {
                background-color: #fff;
                width: 100%;
                border-collapse: collapse;
            }

            table thead tr {
                border: 1px solid #111;
                background-color: #f2f2f2;
            }

            table td {
                vertical-align: middle !important;
                text-align: center;
            }

            table th,
            table td {
                padding-top: 08px;
                padding-bottom: 08px;
            }

            .table-bordered {
                box-shadow: 0px 0px 5px 0.5px gray;
            }

            .table-bordered td,
            .table-bordered th {
                border: 1px solid #dee2e6;
            }

            .text-right {
                text-align: end;
            }

            .w-20 {
                width: 20%;
            }

            .float-right {
                float: right;
            }";
    $Html = ' <div class="container">
               <div class="brand-section">
                    <div class="row">
                         <div class="col-6">
                             <h1 class="text-white">CRAFTHOLIC</h1>
                         </div>
                     </div>
                 </div>
    
                 <div class="body-section">
                     <div class="row">
                         <div class="col-6">
                            <h2 class="heading">Invoice No.: ' . $Order_id . '</h2>
                             <p class="sub-heading">Order Date: ' . $Date . ' </p>
                             <p class="sub-heading">Email Address: ' . $Cust_Email . '</p>
                        </div>
                         <div class="col-6">
                             <p class="sub-heading">Full Name: ' . $Cust_Name . '</p>
                             <p class="sub-heading">Address: ' . $Cust_Flat . " " . $Cust_Street . ' </p>
                             <p class="sub-heading">Phone Number:' . " " . $Cust_Number . ' </p>
                             <p class="sub-heading">City::' . " " . $Cust_City . ', <br/> State::' . " " . $Cust_State . ',<br/> Pincode::' . $Cust_Pincode . ' </p>
                         </div>
                     </div>
                 </div>
    
                 <div class="body-section">
                     <h3 class="heading">Ordered Items</h3>
                     <br>
                     <table class="table-bordered">
                         <thead>
                             <tr>
                                 <th>Product with Quentity</th>
                                 <th class="w-20">Price</th>
                                  <th class="w-20">Method</th>
                                 <th class="w-20">Grandtotal</th>
                             </tr>
                         </thead>
                         <tbody>
                             <tr>
                                 <td>' . $Order_Name . '</td>
                                 <td>' . $Order_Price . '</td>
                                 <td>' . $Method . '</td>
                                 <td>' . $Order_Price . '</td>
                             </tr>
                             <tr>
                                 <td colspan="3" class="text-right">Sub Total</td>
                                 <td>' . $Order_Price . '</td>
                             </tr>
                             <tr>
                                 <td colspan="3" class="text-right">Shipping</td>
                                 <td>Free</td>
                             </tr>
                             <tr>
                                 <td colspan="3" class="text-right">Grand Total</td>
                                 <td>' . $Order_Price . '</td>
                             </tr>
                         </tbody>
                     </table>
                     <br>
                 </div>
    
                 <div class="body-section">
                     <p>&copy; Copyright 2022 - CRAFTHOLIC. All rights reserved.
                     </p>
                 </div>
                 </div>';

    $mpdf = new \Mpdf\Mpdf();
    $mpdf->WriteHTML($Css, 1);
    $mpdf->WriteHTML($Html);
    $mpdf->Output();
}

// Product Status
if (isset($_POST['Status'])) {

    $Select_Status = $_POST['Product_Status'];
    $Update = "UPDATE `shippingaddress` SET `Status`= '$Select_Status' WHERE `sa_id` = ' $Order_id '";
    $Update_Status = mysqli_query($conn, $Update);
}

// Email When Status Chang
if (isset($Update_Status)) {
    $Placed = "Your Order #" . $Order_id . " has been " . $Select_Status . " successfully";

    $mail = new PHPMailer(true);

    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                   //Enable verbose debug output
        $mail->isSMTP();                                           //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                 //Enable SMTP authentication
        $mail->Username   = 'juhilbhardiya161200@gmail.com';      //SMTP username
        $mail->Password   = 'efqzbhjyawoxzqie';                   //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         //Enable implicit TLS encryption
        $mail->Port       = 465;                                 //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('juhilbhardiya161200@gmail.com', 'CRAFTHOLIC');
        $mail->addAddress($Cust_Email);     //Add a recipient

        //Content
        $mail->isHTML(true);                                    //Set email format to HTML
        $mail->Subject = $Placed;
        $mail->Body = "<span style='color:maroon; font-size:18px;' >Product Name With Quentity : </span> $Order_Name
                    <br />
                    <span style='color:maroon; font-size:18px;'>Product Price : </span> $Order_Price
                    <br />";

        $mail->send();
    } catch (Exception $e) {
        echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}');</script>";
    }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRAFTHOLIC-Orders/Details</title>
    <!-- external CSS -->
    <link rel="stylesheet" href="../CSS/Admin.css">
    <link rel="stylesheet" href="../CSS/indexed.css">
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
                <a href="../Admin/Admin-orders.php">Orders/Order Details</a>
            </li>
            <li>
                <i class="fa-solid fa-circle-plus"></i>
                <a href="../Admin/Admin-AddProducts.php">Add Products</a>
            </li>
            <li>
                <i class="fa-solid fa-rotate-left"></i>
                <a href="#">Returns/Replace Products</a>
            </li>
            <li>
                <i class="fa-solid fa-comment-dots"></i>
                <a href="Reports.php">Reports</a>
            </li>

            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <a href="Admin_Logout.php" class="normal">Logout</a>
            </form>


        </div>

    </section>

    <section id="InterFace">

        <h3 class="I-name-2 order-I-Name-2" style="color: maroon;
                    font-size: 35px;
                    text-transform: uppercase;
                    letter-spacing: 3px;">
            Orders Details.
        </h3>

        <!-- Order Details -->
        <div id="prodetails" class="section-p1">
            <div class="single-pro-details" style="position: relative; bottom: 30px;">
                <!-- customer Order with Quentity -->
                <h4>
                    <span style="color: maroon;
                                font-size: 25px;">Product Name with Quentity : </span>
                    <?php echo  $Order_Name; ?>
                </h4>
                <!-- customer Order's total -->
                <h2>
                    <span style="color: maroon;
                                    font-size: 25px;">Price : </span>
                    &#8360; <?php echo $Order_Price; ?>
                </h2>
                <!-- Customer's Details -->
                <h2>
                    <span style="color: maroon;
                                    font-size: 25px;">Customer Name : </span>
                    <?php echo $Cust_Name; ?>
                </h2>
                <h2>
                    <span style="color: maroon;
                                    font-size: 25px;">Mobile Number : </span>
                    <?php echo $Cust_Number; ?>
                </h2>
                <h2>
                    <span style="color: maroon;
                                    font-size: 25px;">Email : </span>
                    <?php echo $Cust_Email; ?>
                </h2>
                <h2>
                    <span style="color: maroon;
                                    font-size: 25px;">Address :</span>
                    <?php echo $Cust_Flat . "," . " " .
                        $Cust_Street . "," .
                        $Cust_City . "  " .
                        $Cust_State . "," .
                        $Cust_Country . " " . "-" . " " .
                        $Cust_Pincode;
                    ?>
                </h2>

            </div>
        </div>


        <form action="" method="post">

            <select name="Product_Status" id="" required style="width: 20%;
                           padding: 5px 0;
                           font-size: 18px;
                           position: relative;
                           left: 75px;
                           bottom: 55px;">
                <option value="Select Status">Status</option>
                <option value="Dispatch">Dispatch</option>
                <option value="Delivered">Delivered</option>
            </select>

            <button style="position: relative;
                        top: 10px;
                        right: 240px;
                        margin-left: 75px;
                        font-size: 15px;
                        font-weight: 600;
                        padding: 13px 30px;
                        color: #FFF;
                        background: maroon;
                        border-radius: 4px;
                        cursor: pointer;
                        border: none;
                        outline: none;
                        transition: all 0.2s ease;
                        letter-spacing: 5px;
                        text-transform: uppercase;" name="Status">Status</button>
        </form>

        <form action="" method="post">
            <button style="position: relative;
                       position: relative;
                        bottom: 39px;
                        left: 160px;
                        margin-left: 75px;
                        font-size: 15px;
                        font-weight: 600;
                        padding: 13px 30px;
                        color: #FFF;
                        background: maroon;
                        border-radius: 4px;
                        cursor: pointer;
                        border: none;
                        outline: none;
                        transition: all 0.2s ease;
                        letter-spacing: 5px;
                        text-transform: uppercase;" name="Get_Invoice">Invoice</button>
        </form>

        <!-- Click To Top -->
        <div class="Arrow-btn">
            <a href="Admin-orders.php"><span class="fa-solid fa-angle-left"></span></a>

        </div>




    </section>






</body>

</html>

<?php

// Logout
if (isset($_POST['Logout'])) {
    session_destroy();
    // header("location:CRAFTHOLIC-admin.php");
}

?>