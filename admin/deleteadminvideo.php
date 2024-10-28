
<?php 
//include 'header.php';
//include 'ft.php';
include 'db.php';
if(isset($_GET['id'])){
$id = $_GET['id'];

$query2 = "SELECT * FROM adminupload where id=$id";
$run1 = mysqli_query($con,$query2);
if($run1){
    while($row = mysqli_fetch_assoc($run1)){
        $name = $row['image'];
$query = "DELETE FROM `adminupload` WHERE id = $id";
$run = mysqli_query($con,$query);
if ($run) {
    echo "<script>alert('Video Has Been Deleted');window.location.href='adminpost.php';</script>";
    unlink("../thumbnail/".$name);
}else{
    echo "<script>alert('something went wrong');</script>";
}
}
}
}
else{
    header("location:adminpost.php");
}
?>
