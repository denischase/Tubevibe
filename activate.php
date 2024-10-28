<?php
session_start();
include 'db.php';

if (isset($_GET['token'])){
    $token = $_GET['token'];

    $query = "update userreg set status = 'active' where token='$token'";
    $run = mysqli_query($con,$query);
    if($run){
        $_SESSION['message'] = "Verification Successful";
        echo "<script>window.location.href='login.php';</script>";
    }
}
else{
    header('location:login.php');
}

?>