<!DOCTYPE html>
<html lang="en">
<?php
// Basic Files
include("../craftholic/Includes/config.php");
include("../craftholic/Includes/Connection.php");


?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRAFTHOLIC</title>
    <link rel="stylesheet" href="CSS/style.css?v=<?php $version ?>">
    <!-- <link rel="stylesheet" href="CSS/indexed.css"> -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="../craftholic/CH_favicon/favicon-32x32.png">
    <!-- <script src="JavaScript/script.js"></script> -->
</head>

<body>

    <!-- Click To back -->
    <section class="Arrow-btn">
        <a href="User_login.php"><span class="uil uil-angle-left-b"></span></a>
    </section>

    <div class="container">
        <div class="forms">
            <div class="form-reset-password">
                <span class="title"><span>Update</span> Password</span>
                <form method="post">
                    <div class="input-field">
                        <input type="password" placeholder="Password" name="Update-PassWord">
                        <i class="uil uil-lock icon"></i>
                        <!-- <i class="uil uil-eye-slash showHidePw"></i> -->
                    </div>
                    <div class="button">
                        <button name="Update">
                            Confirm
                        </button>
                    </div>
                </form>
            </div>
        </div>
</body>

</html>

<?php

if (isset($_POST['Update'])) {

    if (isset($_GET['UserToken'])) {
        $Token = $_GET['UserToken'];
        $Update_PassWord = $_POST['Update-PassWord'];
        $Confirm_Password = password_hash($Update_PassWord, PASSWORD_DEFAULT);

        // Query
        $Update_Query = "UPDATE `registration` SET `PWD`='$Confirm_Password' WHERE `Token` = $Token";
        $Query = mysqli_query($conn, $Update_Query);

        if ($Query) {
            echo "<script>
                    alert('Your Password Has Been Updated');
                    location.replace('User_login.php');  
                 </script>";
            // header("location:User_login.php");
        } else {
            echo "<script>
                    alert('Something Went Worng');
                 </script>";
        }
    }
}


?>