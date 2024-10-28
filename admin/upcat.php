<?php
include 'header.php';
//include 'ft.php';




?>

<?php


if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $cat = $_GET['cat'];
  $sub = $_GET['sub'];
  $genre = $_GET['genre'];






?>
<div class="container">
  <center>
    <h1>Update Category</h1>
  </center>
  <hr>
  <form action="upcat.php" method="post">
  <div class="mb-1">

<input type="text" hidden value="<?php echo $id;?>" name="pid" placeholder="Category ID" class="form-control">

</div>
    <div class="mb-1">

      <input type="text" value="<?php echo $cat;?>" name="cat" placeholder="Category Name" class="form-control">

    </div>
    <div class="mb-1">

      <input type="text" value="<?php echo $sub;?>" name="sub" placeholder="Sub Category ID" class="form-control">
    </div>

    <div class="mb-3">

      <input type="text"  value="<?php echo $genre;?>" name="genre" placeholder="Genre ID" class="form-control">
    </div>

    <input type="submit" name="submit" class="btn btn-" style="background-color:#16a085;color:#000;">
  </form>
</div>
<?php

}
else{
    header("location:category.php");
 }
?>

<?php 

if (isset($_POST['submit'])) {
  $id= $_POST['pid'];
  //$id1 = $_GET['id'];
  $catname = $_POST['cat'];
  $subid = $_POST['sub'];
  $genid = $_POST['genre'];

  $query0 = "SELECT * FROM main_cat where categoryname='$catname'";

  $duplicate = mysqli_query($con, $query0);

  if (mysqli_num_rows($duplicate)>0) {
    echo "<script>alert('Category " . $catname . " Already available in Database');</script>";
    // echo "<script>alert('Admin ".$uname." Has Been Deleted');window.location.href='adminlist.php';</script>";
  } else {

    $query1 = "UPDATE `main_cat` SET `categoryname`='$catname',`subcat_id`=$subid,`genre`=$genid WHERE id=$id";
    //$query = "UPDATE `main_cat` SET `categoryname`='[value-2]',`subcat_id`='$subid',`genre`='$genid ' WHERE id=$id";
    //echo $id;

    $run = mysqli_query($con, $query1);

    if ($run) {
      echo "<script>alert('Category " . $catname . " has been Updated successfully');window.location.href='category.php'</script>";
    } else {
      echo "<script>alert('Category " . $catname . " Not Updated ');</script>";
    }
  }
}


?>
<?php


include 'ft.php';

?>