

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login </title>
    <!-- login form css  -->
    <link rel="stylesheet" href="CSS/login.css?v=<?$version?>">
    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon_io/favicon-32x32.png" type="image/x-icon">
</head>

<body>
    <div class="popup-container">
        <div class="login-popup">
            <form method="post">

                <h2>
                    <span>USER LOGIN.</span>
                </h2>

                <input type="text" placeholder="Contect Number" name="Email">
                <input type="password" placeholder="Password" name="pwd">

                
                <button type="Login-submit" class="login-btn" name="submit">
                    Login
                </button>
            </form>
            <div class="forgot-link">
                <a href="password_recover.php">Forgot Password?</a>
            </div>

            <div class="new-user">
                <h4>Don't have account?</h4>
                <a href="Register.php" target="_self">Register</a>
            </div>
        </div>
    </div>

</body>

</html>

<?php

include 'Connection.php';
include 'config.php';

if (isset($_POST['submit'])) {

    $contect_number = $_POST['Email'];
    $password = $_POST['pwd'];

    $contect_number_search = "select * from registration where CONTECT_NUMBER ='$contect_number' ";
    $query = mysqli_query($conn,  $contect_number_search);

    $cn_count = mysqli_num_rows($query);

    if ($cn_count) {
        $contect_number_pass = mysqli_fetch_assoc($query);
        $db_pass = $contect_number_pass['PWD'];
        // print_r($db_pass);
        // die();
        $pass_decode = password_verify($password, $db_pass);

        if ($pass_decode) {
            echo "<script>alert('login sucesfull'); 
            location.replace('indexed.php');
                    </script>";
        } else {
            echo "<script>alert('incorrect password');</script>";
        }
    } else {
        echo "<script>alert('$contect_number - not found, Register First!');</script>";
    }
}
?> 