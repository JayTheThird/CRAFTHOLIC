<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRAFTHOLIC</title>
  <link rel="stylesheet" href="CSS/style.css?v=<?php $version ?>">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <!-- <script src="JavaScript/script.js"></script> -->
  <!-- Favicon -->
  <link rel="icon" type="image/png" sizes="32x32" href="../craftholic/CH_favicon/favicon-32x32.png">
</head>

<body>
  <!-- Click To back -->
  <section class="Arrow-btn">
    <a href="User_login.php"><span class="uil uil-angle-left-b"></span></a>
  </section>


  <div class="container">
    <div class="forms">
      <div class="form signup">
        <span class="title"><span>user</span> Registration</span>
        <form method="post">

          <div class="input-field">
            <input type="text" placeholder="First name" name="fname" required minlength="4" maxlength="8" size="10">
            <i class="uil uil-user"></i>
          </div>

          <div class="input-field">
            <input type="text" placeholder="Last name" name="lname" required maxlength="12" size="10">
            <i class="uil uil-user"></i>
          </div>

          <div class="input-field">
            <input type="tel" placeholder="Contect number" name="connumber" pattern="[0-9]{6}[0-9]{2}[0-9]{2}" required maxlength='10' minlength="1">
            <i class="uil uil-phone-alt icon"></i>
          </div>

          <div class="input-field">
            <input type="email" placeholder="Email Address" name="email" size="30" required>
            <i class="uil uil-envelope"></i>
          </div>

          <div class="input-field">
            <input type="password" placeholder="Password" name="psw">
            <i class="uil uil-lock icon"></i>
            <!-- <i class="uil uil-eye-slash showHidePw"></i> -->
          </div>

          <!-- <div class="ckeckbox-text">
            <div class="checkbox-content">
              <input type="checkbox" name="" id="logCheck">
              <label for="logCheck" class="text">Remember me</label>
            </div>
          </div> -->

          <div class="button">
            <button name="done">Signup Now</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</body>

</html>

<?php

include '../craftholic/Includes/Connection.php';
include '../craftholic/Includes/config.php';

if (isset($_POST['done'])) {

  $fname = mysqli_real_escape_string($conn, $_POST['fname']);
  $lname = mysqli_real_escape_string($conn, $_POST['lname']);
  $contnum = mysqli_real_escape_string($conn, $_POST['connumber']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['psw']);
  $Date = mysqli_real_escape_string($conn, date("Y/m/d"));

  $pass = password_hash($password, PASSWORD_DEFAULT);

  // $Token = bin2hex(random_bytes(15));

  if ($fname != "" && $lname != "" && $contnum != "" && $email != "" && $password != "") {
    $contect_numer_query = "select * from registration where CONTECT_NUMBER = '$contnum' ";
    $query = mysqli_query($conn, $contect_numer_query);

    $cn_count = mysqli_num_rows($query);

    if ($cn_count > 0) {
      echo "<script>alert('contect number already exist');</script>";
    } else {
      $insert_query = " INSERT INTO `registration`( F_NAME, L_NAME, CONTECT_NUMBER, EMAIL, PWD, R_date) VALUES ('$fname','$lname','$contnum','$email','$pass','$Date')";
      $inst_query = mysqli_query($conn, $insert_query);

      if ($inst_query) {
        echo "<script>alert('registration succesfull'); 
                    location.replace('User_login.php');
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