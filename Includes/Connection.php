<?php

$conn = mysqli_connect("localhost","root","","craftholic");

if(mysqli_connect_error()){
    echo "<script>alert('cannot connect database');</script>"; 
    exit();
}

?>
