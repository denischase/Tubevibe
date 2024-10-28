<?php
include 'header.php';
include 'ft.php';
include 'db.php';



?>
<?php
// if (isset($_GET['id'])){
//  $id=$_GET['id'];
//     $cat = $_GET['cat'];
// $sub = $_GET['sub'];
// $gen = $_GET['genre'];


// }



?>
<?php 


if (isset($_GET['id'])){
 $id = $_GET['id'];
   $genre = $_GET['cat'];
   $sub = $_GET['sub'];
   $cat = $_GET['genre'];
  
 


?>
<div class="container">
    <center><h1>Update Genre</h1></center>
    <hr>
    <form action="upgen.php" method="post">
    <div class="mb-1">
    
    <input type="text" hidden name="pid" value="<?php echo $id; ?>" placeholder="Genre ID" class="form-control">
    
  </div>
  <div class="mb-1">
    
    <input type="text" name="genname" value="<?php echo $genre; ?>" placeholder="Genre Name" class="form-control">
    
  </div>
  <div class="mb-1">
    
    <input type="text" name="subid"  value="<?php echo $sub; ?>" placeholder="Sub Category ID" class="form-control">
  </div>

  <div class="mb-3">
    
    <input type="text" name="catid" value="<?php echo $cat; ?>" placeholder="Category ID" class="form-control" >
  </div>
  
  <button type="submit" name="submit" class="btn btn" style="background-color:#16a085;color:#000;">Submit</button>
</form>
</div>


<?php

} else{
  header("location:genre.php");
}
?>
<?php

  
if(isset($_POST['submit'])){
  $id= $_POST['pid'];
    $catname = $_POST['genname'];
    $subid = $_POST['subid'];
    $genid = $_POST['catid'];

   

    $duplicate = mysqli_query($con,"SELECT * FROM genre where genrename='$catname'");

    if(mysqli_num_rows($duplicate)>0){
        echo "<script>alert('Category ".$catname." Already available in Database');</script>";
        // echo "<script>alert('Admin ".$uname." Has Been Deleted');window.location.href='adminlist.php';</script>";
    }
    else{

    $query = "UPDATE `genre` SET `genrename`='$catname',`subcat_id`=$subid,`catid`=$genid WHERE id=$id";
      //$query = "UPDATE `main_cat` SET `categoryname`='[value-2]',`subcat_id`='$subid',`genre`='$genid ' WHERE id=$id";
    //echo $id;

    $run = mysqli_query($con,$query);

    if($run){
        echo "<script>alert('Genre ".$catname." has been Updated successfully');window.location.href='genre.php'</script>";
    }
    else{
        echo "<script>alert('Genre ".$catname." Not Updated ');</script>";
    }
}
 }

?>
