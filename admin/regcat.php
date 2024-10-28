<?php
include 'header.php';
include 'ft.php';
include 'db.php';
?>
<div class="container">
    <center><h1>Register Category</h1></center>
    <hr>
    <form action="regcat.php" method="post">
  <div class="mb-1">
    
    <input type="text" name="catname" placeholder="Category Name" class="form-control" >
    
  </div>
  <div class="mb-1">
    
    <input type="text" name="subid" placeholder="Sub Category ID" class="form-control" >
  </div>

  <div class="mb-3">
    
    <input type="text" name="genid" placeholder="Genre ID" class="form-control" >
  </div>
  
  <button type="submit" name="submit" class="btn btn" style="background-color:#16a085;color:#fff;">Submit</button>
</form>
</div>
<?php

include 'ft.php';

?>

<?php

if(isset($_POST['submit'])){
    $catname = $_POST['catname'];
    $subid = $_POST['subid'];
    $genid = $_POST['genid'];

    $duplicate = mysqli_query($con,"SELECT * FROM main_cat where categoryname='$catname'");

    if(mysqli_num_rows($duplicate)>0){
        echo "<script>alert('Category ".$catname." Already available in Database');</script>";
        // echo "<script>alert('Admin ".$uname." Has Been Deleted');window.location.href='adminlist.php';</script>";
    }
    else{

    $query = "INSERT INTO `main_cat`(`categoryname`, `subcat_id`, `genre`) VALUES ('$catname','$subid','$genid')";

    $run = mysqli_query($con,$query);

    if($run){
        echo "<script>alert('Category ".$catname." has been inserted successfully');window.location.href='category.php'</script>";
    }
    else{
        echo "<script>alert('Category ".$catname." Not inserted ');</script>";
    }
}
}

?>