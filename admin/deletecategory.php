<?php 
//include 'header.php';
//include 'ft.php';
include 'db.php';
if(isset($_GET['id'])){
$id = $_GET['id'];
$uname= $_GET['catname'];
$query = "DELETE FROM `main_cat` WHERE id = $id";
$run = mysqli_query($con,$query);
if ($run) {
    echo "<script>alert('Category ".$uname." Has Been Deleted');window.location.href='category.php';</script>";
}else{
    echo "<script>alert('something went wrong');window.location.href='category.php';</script>";
}
}
else{
    header("location:category.php");
}
?>
