<!DOCTYPE html>
<html lang='en'>

<head>

    <title>CRAFTHOLIC</title>
    <link rel='stylesheet' href='CSS/style.css'>
    <link rel='stylesheet' href='https://unicons.iconscout.com/release/v4.0.0/css/line.css'>
    <link rel='icon' type='image/png' sizes='32x32' href='../craftholic/CH_favicon/favicon-32x32.png'>
</head>

<body>

    <?php
    // Basic Files
    include("../craftholic/Includes/config.php");
    include("../craftholic/Includes/Connection.php");

    if (isset($_GET['email']) && isset($_GET['reset_token'])) {
        date_default_timezone_set('Asia/Kolkata');
        $Date = date("y-m-d");

        $query = "SELECT * FROM `registration` WHERE `EMAIL` = '$_GET[email]' AND `Token` = '$_GET[reset_token]' AND `TokenExpire` = '$Date'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            if (mysqli_num_rows($result) == 1) {
                echo "<div class='container'>
                <div class='forms'>
                    <div class='form-reset-password'>
                        <Password class='title'>Update Password</span>
                            <form method='post'>
                                <div class='input-field'>
                                    <input type='password' class='password' placeholder='Enter your password' name='password' required id='myinput'>
                                    <i class='uil uil-lock icon'></i>
                                </div>
                                    <input type='hidden' name='email' value='$_GET[email]'>
                                <div class='button'>
                                    <button type='submit' name='Update'>Update</button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>";
            } else {
                echo '<script>
                alert("invalid or Expired Link");
                window.location.href = "User_login.php";
            </script>';
            }
        } else {
            echo '<script>
            alert("Server Down Try Again letter");
            window.location.href = "User_login.php";
        </script>';
        }
    }

    ?>

    <?php

    if (isset($_POST['Update'])) {
        // echo 'clicked';

        $Password = $_POST['password'];
        $pass = password_hash($Password, PASSWORD_DEFAULT);

        // Query
        $Update = "UPDATE `registration` SET `PWD`='$pass',`Token`=NULL,`TokenExpire`=NULL WHERE `EMAIL` = '$_POST[email]'";

        if (mysqli_query($conn, $Update)) {
            echo '<script>
            alert("Password Successfully Updated");
            window.location.href = "User_login.php";
        </script>';
        } else {
            echo '<script>
            alert("Server Down Try Again letter");
            window.location.href = "User_login.php";
        </script>';
        }
    }

    ?>
</body>


</html>