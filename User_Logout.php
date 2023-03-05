<?php
// include("../craftholic/Includes/config.php");
// include("../craftholic/Includes/Connection.php");
session_start();

unset($_SESSION['UserFirstName']);
unset($_SESSION['UserLastName']);
// unset($_SESSION['UserID']);

header('location:Indexed.php');

// this is test
