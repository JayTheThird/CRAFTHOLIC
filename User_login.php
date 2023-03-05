<?php
session_start();
if (isset($_SESSION['UserFirstName'], $_SESSION['UserLastName'])) {
  header("location:Indexed.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRAFTHOLIC</title>
  <link rel="stylesheet" href="CSS/style.css">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <!-- Favicon -->
  <link rel="icon" type="image/png" sizes="32x32" href="../craftholic/CH_favicon/favicon-32x32.png">
  <!-- <script src="JavaScript/script.js"></script> -->
  <!-- Icon Library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body>


  <!-- Click To back -->
  <section class="Arrow-btn">
    <a href="Indexed.php"><span class="uil uil-estate"></span></a>
  </section>


  <div class="container">
    <div class="forms">
      <div class="form-login">
        <span class="title"><span>user</span> Login</span>
        <form method="post">

          <div class="input-field">
            <input type="tel" placeholder="Enter Phone Number" name="Cont_number" pattern="[0-9]{6}[0-9]{2}[0-9]{2}" required maxlength='10' minlength="1" value="<?php if (isset($_COOKIE['contect-number-cookie'])) {
                                                                                                                                                                    echo $_COOKIE['contect-number-cookie'];
                                                                                                                                                                  } ?>">
            <i class="uil uil-phone-alt icon"></i>
          </div>

          <div class="input-field">
            <input type="password" class="password" placeholder="Enter your password" name="pwd" required id="myinput" value="<?php if (isset($_COOKIE['password-cookie'])) {
                                                                                                                                echo $_COOKIE['password-cookie'];
                                                                                                                              } ?>">
            <i class="uil uil-lock icon"></i>
            <!-- <i class="uil uil-eye-slash showHidePw" id="hide1" onclick="myFunction()"></i>
            <i class="uil uil-eye-slash showHidePw" ></i>
             <i class="uil uil-eye "  id="hide2" onclick="myFunction()"></i> -->
          </div>

          <div class="ckeckbox-text">
            <div class="checkbox-content">
              <input type="checkbox" name="Remember-me" id="logCheck">
              <label for="logCheck" class="text">Remember me</label>
            </div>
            <a href="Reset-password.php" class="text">Forgot Password?</a>
          </div>

          <div class="button">
            <button name="submit">Login Now</button>
          </div>
        </form>
        <div class="login-signup">
          <span class="text">Not a Member?
            <a href="User_signup.php" class="text signup-text">Signup now</a>
          </span>
        </div>
      </div>
    </div>
  </div>



</body>

</html>

<?php

include '../craftholic/Includes/Connection.php';
include '../craftholic/Includes/config.php';

if (isset($_POST['submit'])) {

  $contect_number = $_POST['Cont_number'];
  $password = $_POST['pwd'];

  $contect_number_search = "select * from registration where CONTECT_NUMBER ='$contect_number' ";
  $query = mysqli_query($conn,  $contect_number_search);

  $cn_count = mysqli_num_rows($query);

  if ($cn_count) {
    $contect_number_pass = mysqli_fetch_assoc($query);
    $db_pass = $contect_number_pass['PWD'];

    $_SESSION['UserFirstName'] = $contect_number_pass['F_NAME'];
    $_SESSION['UserLastName'] = $contect_number_pass['L_NAME'];
    $_SESSION['UserContectNumber'] = $contect_number_pass['CONTECT_NUMBER'];
    $_SESSION['UserEmail'] = $contect_number_pass['EMAIL'];
    $_SESSION['UserID'] = $contect_number_pass['C_ID'];
    // print_r($db_pass);
    // die();
    $pass_decode = password_verify($password, $db_pass);

    if ($pass_decode) {
      if (isset($_POST['Remember-me'])) {
        setcookie("contect-number-cookie", $contect_number, time() + 86400);
        setcookie("password-cookie", $password, time() + 86400);

        echo "<script>alert('login sucesfull'); 
                      location.replace('indexed.php');
              </script>";
      } else {
        echo "<script>alert('login sucesfull'); 
                      location.replace('indexed.php');      
              </script>";
      }
    } else {
      echo "<script>alert('incorrect password');</script>";
    }
  } else {
    echo "<script>alert('$contect_number - not found, Register First!');</script>";
  }
}
?>


<script>
  // function myFunction(){
  //   var x = document.getElementById("myinput");
  //   var y = document.getElementById("hide1");
  //   var z = document.getElementById("hide2");

  //   if(x.type === 'password'){
  //     x.type = "text";
  //     y.style.display = "block";
  //     z.style.display = "none";

  //   }else{
  //     x.type = "password";
  //     y.style.display = "none";
  //     z.style.display = "block";
  //   }
  // }
</script>