<?php
include("../Includes/Connection.php");

// error_reporting(0);



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

<style>
    @media print {
        @page {
            margin-left: 0.8in;
            margin-right: 0.8in;
            margin-top: 0;
            margin-bottom: 0;
        }
    }

    #container {
        width: 980px;
        margin: 0 auto;
    }

    .Print {
        /* position: relative;
        left: 40px; */
        font-size: 20px;
        font-weight: 600;
        padding: 13px 30px;
        color: #AE0000;
        /* border-radius: 4px; */
        cursor: pointer;
        border: none;
        outline: none;
        transition: all 0.2s ease;
        letter-spacing: 2px;
        color: #AE0000;
    }
</style>

<body>
    <section id="Reports-InterFace" style="width: 100%;">
        <?php
        // For Orders 
        if (isset($_POST['Submit'])) {
            $StartDate = $_REQUEST['StartDate'];
            $EndDate = $_REQUEST['EndDate'];

            // Query 
            $Product_Report = "SELECT * FROM `shippingaddress` WHERE `Date` BETWEEN '$StartDate' AND '$EndDate '";
            $Result = $conn->query($Product_Report);

            // Condition
            if ($Result->num_rows > 0) {
                echo '<h3 class="I-name-2 order-I-Name-2">
                Order Reoprts
            </h3>';
                echo "<div class='Board' id='orders'>";
                echo "<table width='100%''>";
                echo "<thead>";
                echo "<tr>";
                echo "<td>Order id</td>";
                echo "<td>Product Name with Quentity</td>";
                echo "<td>Method</td>";
                echo "<td>Price</td>";
                echo "<td>Date</td>";
                echo "<td>Name</td>";
                // echo "<td>Number</td>";
                echo "<td>Email</td>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                while ($Row = $Result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td class="product-ID">' . $Row['sa_id'] . '</td>';
                    echo '<td class="Product-name">' . $Row['Totalproducts'] . '</td>';
                    echo '<td class="Price">' . $Row['Method'] . '</td>';
                    echo '<td class="Price">' . $Row['TotalPrice'] . '</td>';
                    echo '<td class="Date">' . $Row['Date'] . '</td>';
                    echo '<td class="Product-name">' . $Row['Name'] . '</td>';
                    // echo '<td class="Product-name">'.$Row['Number'].'</td>'; 
                    echo '<td class="Product-name">' . $Row['Email'] . '</td>';
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
                echo "</div>";
            } else {
                echo "<script>alert('NO record Found');
                window.location.href = 'Reports.php';
                    </script>";
            }
        }
        // For Product
        else if (isset($_POST['Done'])) {
            $P_StartDate = $_REQUEST['P_StartDate'];
            $P_EndDate = $_REQUEST['P_EndDate'];

            // Query 
            $Product_Report = "SELECT * FROM `products` WHERE `P_Date` BETWEEN '$P_StartDate' AND '$P_EndDate'";
            $Result = $conn->query($Product_Report);

            if ($Result->num_rows > 0) {
                echo '<h3 class="I-name-2 order-I-Name-2">
                        Product Reoprts
                    </h3>';

                echo "<div class='Board'>";
                echo "<table width='100%''>";
                echo "<thead>";
                echo "<tr>";
                echo "<td>Product id</td>";
                echo "<td>Product Name </td>";
                echo "<td>Category_Name</td>";
                echo "<td>Price</td>";
                echo "<td>Product_Image</td>";
                echo "<td>Date</td>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                while ($Row = $Result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td class="product-ID">' . $Row['P_ID'] . '</td>';
                    echo '<td class="Product-name">' . $Row['P_names'] . '</td>';
                    echo '<td class="Price">' . $Row['Category_Name'] . '</td>';
                    echo '<td class="Price">' . $Row['P_price'] . '</td>';
                    echo '<td class="image">';
                    //   echo '<img src="../Admin/images/"'.$Row['P_Image1'].' alt="Image not found">'; 
                    echo $Row['P_Image1'];
                    echo '</td>';
                    echo '<td class="Product-name">' . $Row['P_Date'] . '</td>';
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
                echo "</div>";
            } else {
                echo "<script>alert('NO record Found');
                window.location.href = 'Reports.php';
                    </script>";
            }
        }
        // For Customer
        else if (isset($_POST['Finish'])) {
            $C_StartDate = $_REQUEST['C_StartDate'];
            $C_EndDate = $_REQUEST['C_EndDate'];

            // Query 
            $Product_Report = "SELECT * FROM `registration` WHERE `R_date` BETWEEN '$C_StartDate' AND '$C_EndDate'";
            $Result = $conn->query($Product_Report);

            if ($Result->num_rows > 0) {
                echo '<h3 class="I-name-2 order-I-Name-2">
                        Customer Reoprts
                    </h3>';

                echo "<div class='Board'>";
                echo "<table width='100%''>";
                echo "<thead>";
                echo "<tr>";
                echo "<td>Customer id</td>";
                echo "<td>Customer Name </td>";
                echo "<td>Contact Number</td>";
                echo "<td>Email</td>";
                echo "<td>Date</td>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                while ($Row = $Result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td class="product-ID">' . $Row['C_ID'] . '</td>';
                    echo '<td class="Product-name">' . $Row['F_NAME'] . " " . $Row['L_NAME'] . '</td>';
                    echo '<td class="Price">' . $Row['CONTECT_NUMBER'] . '</td>';
                    echo '<td class="Price">' . $Row['EMAIL'] . '</td>';
                    echo '<td class="Product-name">' . $Row['R_date'] . '</td>';
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
                echo "</div>";
            } else {
                echo "<script>alert('NO record Found');
                    window.location.href = 'Reports.php';
                        </script>";
            }
        }
        ?>

        <!-- Click To Top -->
        <div class="Arrow-btn">
            <a href="Reports.php"><span class="fa-solid fa-angle-left"></span></a>
        </div>


        <!-- Print -->

        <body id="container">
            <a href="#" id="print" class="Print">GENERATE PDF!</a>
        </body>

    </section>


</body>

</html>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        let printLink = document.getElementById("print");
        let container = document.getElementById("container");

        printLink.addEventListener("click", event => {
            event.preventDefault();
            printLink.style.display = "none";
            window.print();
        }, false);

        container.addEventListener("click", event => {
            printLink.style.display = "flex";
        }, false);

    }, false);
</script>