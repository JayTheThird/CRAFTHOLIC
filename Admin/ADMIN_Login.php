<?php
session_start();
include("../Includes/Connection.php");

if (isset($_SESSION['AdminLoginID'])) {
  header("location:CRAFTHOLIC-admin.php");
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
  <link rel="stylesheet" href="../CSS/style.css">

  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <!-- Favicon -->
  <link rel="icon" type="image/png" sizes="32x32" href="../CH_favicon/favicon-32x32.png">
  <!-- <script src="JavaScript/script.js"></script> -->
</head>

<body>




  <div class="container">
    <div class="forms">
      <div class="form-ADMIN-login">
        <span class="title"><span>Admin</span> Login</span>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);   ?>">

          <div class="input-field">
            <input type="text" placeholder="Name" name="Admin_Passcode">
            <i class="uil uil-user"></i>
          </div>

          <div class="input-field">
            <input type="password" class="password" placeholder="Password" name="Admin_Password" id="myinput">
            <i class="uil uil-lock icon"></i>
            <!-- <i class="uil uil-eye-slash showHidePw" id="hide1" onclick="myFunction()"></i> -->
            <!-- <i class="uil uil-eye-slash showHidePw" ></i> -->
            <!-- <i class="uil uil-eye "  id="hide2" onclick="myFunction()"></i> -->
          </div>

          <div class="button">
            <button name="Login">Login Now</button>
          </div>
        </form>

      </div>
    </div>

</body>

</html>

<?php

require("../Includes/Connection.php");

// meaking input feild filter so we can check if entered data is not malicious
function Input_Filter($Data)
{
  $Data = trim($Data);
  $Data = stripslashes($Data);
  $Data = htmlentities($Data);
  return $Data;
}

if (isset($_POST['Login'])) {
  // echo "clicked";
  # Filtering Data that is Entered By Admins
  $Admin_Passcode = Input_Filter($_POST['Admin_Passcode']);
  $Admin_Password = Input_Filter($_POST['Admin_Password']);


  # prevent Mysqli injection (ignor Special Symbols)
  $Admin_Passcode = mysqli_real_escape_string($conn, $Admin_Passcode);
  $Admin_Password = mysqli_real_escape_string($conn, $Admin_Password);

  #query Template
  $query = "SELECT * FROM `admin-login` WHERE `Admin_Name` = ? AND `Admin_Password` = ?";

  #prepared Statment
  if ($prepared_Statment = mysqli_prepare($conn, $query)) {
    #Binding Values To Templete or Prepared Statment
    mysqli_stmt_bind_param($prepared_Statment, "ss", $Admin_Passcode, $Admin_Password);
    # Executing Prepared Statment
    mysqli_stmt_execute($prepared_Statment);
    # Transfering the Result of Execution in $prepared_Statment 
    mysqli_stmt_store_result($prepared_Statment);

    if (mysqli_stmt_num_rows($prepared_Statment) == 1) {
      // echo "Details Matched";
      session_start();
      $_SESSION['AdminLoginID'] = $Admin_Passcode;
      header("location:CRAFTHOLIC-admin.php");
    } else {
      echo "<script>
              alert('Invalid Details');
            </script>";
    }
    mysqli_stmt_close($prepared_Statment);
  } else {
    echo "<script>
            alert('Can Not be Prepared');
         </script>";
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