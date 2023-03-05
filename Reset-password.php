<!DOCTYPE html>
<html lang="en">
<?php
// Basic Files
include("../craftholic/Includes/config.php");
include("../craftholic/Includes/Connection.php");

//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



// Send mail
function sendMail($email, $reset_token)
{
    $Subject = "Password Reset Link From CRAFTHOLIC";
    $Body = "We Got a Request From you to Reset Your Password <br> Click The Link Below : <br> <a href='http://localhost/craftholic/UpdatePassword.php?email=$email&reset_token=$reset_token'>Reset Password</a>";
    //Load Composer's autoloader
    require("PHP Mailer/Exception.php");
    require("PHP Mailer/PHPMailer.php");
    require("PHP Mailer/SMTP.php");

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
        $mail->addAddress($email);     //Add a recipient

        //Content
        $mail->isHTML(true);                                    //Set email format to HTML
        $mail->Subject = $Subject;
        $mail->Body = $Body;


        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}



// Password Reset
if (isset($_POST['send-reset-link'])) {

    $Email = $_POST['email'];

    $Query = "SELECT * FROM `registration` WHERE `EMAIL` = '$Email'";
    $Result  = mysqli_query($conn, $Query);

    if ($Result) {
        // echo '<script>
        //         alert("Run");
        //     </script>';
        if (mysqli_num_rows($Result) == 1) {
            // Email Found
            $Reset_Token = bin2hex(random_bytes(16));
            date_default_timezone_set('Asia/Kolkata');
            $Reset_Date = date("y-m-d");

            // Update Query 
            $Update_Query = "UPDATE `registration` SET `Token`='$Reset_Token',`TokenExpire`='$Reset_Date' WHERE `EMAIL` = '$Email'";
            if (mysqli_query($conn, $Update_Query) && sendMail($Email, $Reset_Token)) {
                echo '<script>
                        alert("Password Reset Link Send To mail");
                        window.location.href = "User_login.php";
                    </script>';
            } else {
                echo '<script>
                        alert("Server Down Try Again letter");
                        window.location.href = "User_login.php";
                    </script>';
            }
        } else {
            echo '<script>
                    alert("Email Not Found!");
                    window.location.href = "User_login.php";
                </script>';
        }
    } else {
        echo '<script>
                alert("Can Not Run Query");
                window.location.href = "User_login.php";
            </script>';
    }
}


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
                <span class="title"><span>Reset</span> Password</span>
                <form method="post">
                    <div class="input-field">
                        <input type="text" placeholder="Enter Email" name="email">
                        <i class="uil uil-envelope"></i>
                    </div>
                    <div class="button">
                        <button name="send-reset-link">
                            Send Link
                        </button>
                    </div>
                </form>
            </div>
        </div>
</body>

</html>