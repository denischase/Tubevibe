<?php 
//include 'header.php';
//include 'ft.php';
include 'db.php';
if(isset($_GET['id'])){
$id = $_GET['id'];
$uname= $_GET['catname'];
$query = "DELETE FROM `genre` WHERE id = $id";
$run = mysqli_query($con,$query);
if ($run) {
    echo "<script>alert('Genre ".$uname." Has Been Deleted');window.location.href='genre.php';</script>";
}else{
    echo "<script>alert('something went wrong');window.location.href='genre.php';</script>";
}
}
else{
    header("location:genre.php");
}
?>
