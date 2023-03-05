    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registration</title>
        <!--Registraion Css limk -->
        <link rel="stylesheet" href="CSS/Registration.css?v=<? $version ?>">
        <!-- Favicon -->
        <link rel="shortcut icon" href="favicon_io/favicon-32x32.png" type="image/x-icon">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    </head>

    <body>
        <div class="popup-container">
         <div class="register-popup">
             <form method="post">
                 <h2>
                     <span>USER REGISTRATION.</span>
                 </h2>

                 <input type="text" placeholder="First name" name="fname">
                 <input type="text" placeholder="Last name" name="lname">
                 <input type="number" placeholder="Contect number"  name="connumber" min="10" >
                 <input type="text" placeholder="Email Address" name="email">
                 <input type="password" placeholder="Password" name="psw" >

                 <button type="submit" class="Register-btn" name="done">
                     REGISTRATION
                 </button>
             </form>
         </div>
     </div>

    


    </body>

    </html>
    <?php
    include 'Connection.php';
    include 'config.php';

    if (isset($_POST['done'])) {

        $fname = mysqli_real_escape_string($conn, $_POST['fname']);
        $lname = mysqli_real_escape_string($conn, $_POST['lname']);
        $contnum = mysqli_real_escape_string($conn, $_POST['connumber']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['psw']);

        $pass = password_hash($password, PASSWORD_DEFAULT);

        if ($fname != "" && $lname != "" && $contnum != "" && $email != "" && $password != "") {
            $contect_numer_query = "select * from registration where CONTECT_NUMBER = '$contnum' ";
            $query = mysqli_query($conn, $contect_numer_query);

            $cn_count = mysqli_num_rows($query);

            if ($cn_count > 0) {
                echo "<script>alert('contect number already exist');</script>";
            } else {
                $insert_query = " INSERT INTO `registration`( F_NAME, L_NAME, CONTECT_NUMBER, EMAIL, PWD) VALUES ('$fname','$lname','$contnum','$email','$pass')";
                $inst_query = mysqli_query($conn, $insert_query);

                if ($inst_query) {
                    echo "<script>alert('registration succesfull'); 
                    location.replace('login.php');
                    </script>";
                } else {
                    echo "<script>alert('Registration Faild');</script>";
                }
            }
        } else {
            echo "<script>alert('fill the form first');</script>";
        }
    }
    ?>