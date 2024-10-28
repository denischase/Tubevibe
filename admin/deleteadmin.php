<?php 
//include 'header.php';
//include 'ft.php';
include 'db.php';
if(isset($_GET['id'])){
$id = $_GET['id'];
$uname= $_GET['uname'];
$query = "DELETE FROM `admin` WHERE id = $id";
$run = mysqli_query($con,$query);
if ($run) {
    echo "<script>alert('Admin ".$uname." Has Been Deleted');window.location.href='adminlist.php';</script>";
}else{
    echo "<script>alert('something went wrong');window.location.href='adminlist.php';</script>";
}
}
else{
    header("location:adminlist.php");
}
?>
