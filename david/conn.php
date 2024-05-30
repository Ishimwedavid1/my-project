<?php
session_start();
$conn = mysqli_connect("localhost","root","","xwisdom_tvet");
if(!$conn){
    echo" not connected";
}
if(!$_SESSION['user_id']){
    header("location:./login.php");
}else{
    // echo "is set";
}
?>