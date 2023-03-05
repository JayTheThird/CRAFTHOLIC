<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRAFTHOLIC </title>
    <!-- Registration form css  -->
    <link rel="stylesheet" href="CSS/Forgot.css?v=<? $version ?>">
    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon_io/favicon-32x32.png" type="image/x-icon">
</head>

<body>
    <div class="popup-container">
        <div class="Forgot-popup">
            <form method="post">

                <h2>
                    <span>FORGOT PASSWORD.</span>
                </h2>
                <input type="text" placeholder="Email Address" name="Email">
                <button type="Forgot-submit" class="Forgot-btn" name="Forgot">
                    submit
                </button>
            </form>

        </div>
    </div>

</body>

</html>

<?php
include 'config.php';
include 'Connection.php';

if (isset($_POST['Forgot'])) {

    $email = mysqli_real_escape_string($conn, $_POST['Email']);

    $email = "SELECT * FROM `registration` WHERE `EMAIL`='$email'";
    $query = mysqli_query($conn, $email);
    $emailcount = mysqli_num_rows($query);

    if($emailcount){

    }else{
        echo "No Email found";
    }
   
}

?>