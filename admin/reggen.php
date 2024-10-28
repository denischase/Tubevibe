<?php
include 'header.php';
include 'ft.php';
include 'db.php';
?>
<div class="container">
    <center><h1>Register Genre</h1></center>
    <hr>
    <form action="reggen.php" method="post">
  <div class="mb-1">
    
    <input type="text" name="genname" placeholder="Genre Name" class="form-control" >
    
  </div>
  <div class="mb-1">
    
    <input type="text" name="subid" placeholder="Sub Category ID" class="form-control" >
  </div>

  <div class="mb-3">
    
    <input type="text" name="catid" placeholder="Category ID" class="form-control" >
  </div>
  
  <button type="submit" name="submit" class="btn btn" style="background-color:#16a085;color:#fff;">Submit</button>
</form>
</div>
<?php

include 'ft.php';

?>

<?php

if(isset($_POST['submit'])){
    $catname = $_POST['genname'];
    $subid = $_POST['subid'];
    $genid = $_POST['catid'];

    $duplicate = mysqli_query($con,"SELECT * FROM genre where genrename='$catname'");

    if(mysqli_num_rows($duplicate)>0){
        echo "<script>alert('Genre ".$catname." Already available in Database');</script>";
        // echo "<script>alert('Admin ".$uname." Has Been Deleted');window.location.href='adminlist.php';</script>";
    }
    else{

    $query = "INSERT INTO `genre`(`genrename`, `subcat_id`, `catid`) VALUES ('$catname','$subid','$genid')";

    $run = mysqli_query($con,$query);

    if($run){
        echo "<script>alert('Genre ".$catname." has been inserted successfully');window.location.href='genre.php'</script>";
    }
    else{
        echo "<script>alert('Genre ".$catname." Not inserted ');</script>";
    }
}
}

?>