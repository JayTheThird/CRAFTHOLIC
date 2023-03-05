<?php
require("../Includes/Connection.php");
session_start();

session_unset();

session_destroy();

header("location:ADMIN_Login.php");
