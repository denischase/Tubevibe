<?php
include 'header.php';
?>

<div class="container">
  <center>
    <h2>View/Edit Videos</h2>
  </center>
  <hr>
  <?php 

  if(isset($_GET['id'])){
   
    $id =$_GET['id'];
   $query3 = "SELECT * FROM adminupload where id=$id";

   $run3 = mysqli_query($con,$query3);

   if($run3){
    while($row3 = mysqli_fetch_assoc($run3)){
      $current_image = $row3['image'];
        ?>
        <center>
  <img style="width: 18rem;" class="card-img-top" src="../thumbnail/<?php echo $current_image ?>" alt="Card image cap">
  </center>
  <br>
  <div class="form">
    <form action="#" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <div class="mb-3">
          <input type="text" name="videotitle" value="<?php echo$row3['videotitle']?>" required class="form-control" placeholder="Video Title">
        </div>
        <div class="mb-3">
          <input type="text" name="videodec" value="<?php echo$row3['videodec']?>" required class="form-control" placeholder="Video Description">
        </div>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Options</label>
          </div>
          <select name="category" class="custom-select" id="inputGroupSelect01">
            <option selected>Category</option>
            <?php

            $query1 = "SELECT * from main_cat";
            $run1 = mysqli_query($con, $query1);
            if ($run1) {
              while ($row1 = mysqli_fetch_assoc($run1)) {
            ?>
                <option value="<?php echo $row1['id']; ?>"><?php echo $row1['categoryname']; ?></option>
            <?php
              }
            }

            ?>



          </select>
        </div>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Options</label>
          </div>
          <select name="genre" class="custom-select" id="inputGroupSelect01">
            <option selected>Genre</option>

            <?php

            $query2 = "SELECT * FROM genre";
            $run2 = mysqli_query($con, $query2);
            if ($run2) {
              while ($row2 = mysqli_fetch_assoc($run2)) {
            ?>
                <option value="<?php echo $row2['id']; ?>"><?php echo $row2['genrename']; ?></option>
            <?php
              }
            }

            ?>

          </select>
        </div>

        <div class="mb-3">
          <input type="text" name="videotag"  value="<?php echo$row3['videotag']?>" required class="form-control" placeholder="Video Tags">
        </div>
        <div class="mb-3">
          <input type="text" name="videometa" value="<?php echo$row3['videometatag']?>" required class="form-control" placeholder="Video Meta Tags">
        </div>
        <div class="mb-3">
          <input type="text" name="videometadec" value="<?php echo$row3['videometadec']?>" required class="form-control" placeholder="Video meta Description">
        </div>
        <div class="mb-3">
          <input type="file" name="img" class="form-control">
          <label class="form-label">Thumbnail</label>
        </div>
        <div class="mb-3">
          <input type="url" name="videolink" value="<?php echo$row3['url']?>" required class="form-control" placeholder="Video link">
        </div>
      </div>

      <button type="submit" name="submit" class="btn btn-" style="background-color:#16a085;color:#fff;">Upload</button>
    </form>
  </div>

</div>
<?php
    }
   }
}
else{
    header('location:adminpost.php');
}
  ?>
<?php
include 'ft.php';
?>

<?php
if (isset($_POST['submit'])) {
    $videotitle = $_POST['videotitle'];
    $videodec = $_POST['videodec'];
    $videotag = $_POST['videotag'];
    $videometa = $_POST['videometa'];
    $videometadec = $_POST['videometadec'];
    $videolink = $_POST['videolink'];
    $genre = $_POST['genre'];
    $category = $_POST['category'];
    //$img = $_FILES['img']['name'];
    $current_image =$_POST['img'];
  



//2. Updating new Image if selected
                //check whether the image is selected or not
                if(isset($_FILES['img']['name'])){
                  //get image details  

                  $image_name = $_FILES['img']['name'];
                  //check whether the image is availabe or not
                  if($image_name!= "")
                  {
                    // image available
                    //A.upload the new image

                      //auto rename our image
                        //get the extension of our image e.g. "specialfood.jpg"
                        $ext = end(explode('.',$image_name));

                        //rename the Image
                        $image_name = "Youtubevibe_".random_int(000, 999).'.'.$ext;//e.g. Food_Category_544.jpg

                        $source_path = $_FILES['img']['tmp_name'];

                        $detination_path = "../thumbnail/".$image_name;

                        //upload image
                        $upload = move_uploaded_file($source_path,$detination_path);

                        //check whether the image is uploaded or not
                        //and if the image is not uploaded then we stop and redirect with error message
                        if($upload == false)
                        {
                            //set message
                            echo "<script>alert('Failed to Upload Image');window.location.href='adminpost.php';</script>";
                           // $_SESSION['upload'] = "<div class='error'>Failed to Upload Image.</div>";
                            //redirect
                           // header('location:adminpost.php');
                            //stop the process
                            die();
                        }

                    //B. remove the current image
                    if($current_image != "")
                    {
                    $remove_path = "../thumbnail/". $current_image;
                    $remove = unlink($remove_path);

                    //check whether image is removed or not
                    //if failed then display error
                    if($remove == false){
                      echo "<script>alert('Failed to remove current Image');window.location.href='adminpost.php';</script>";
                        //$_SESSION['Failed-remove'] = "<div class='error'>Failed to remove current Image.</div>";
                        //header('location:adminpost.php');
                        die(); //stop process
                    }
                  }
                }
                  else
                  {
                    $image_name = $current_image;
                  }

                }
                else
                {
                    $image_name = $current_image;
                }




$query4 = "UPDATE `adminupload` SET `videotitle`='$videotitle',`videodec`='$videodec',`videotag`='$videotag',`videometatag`='$videometa',`videometadec`=' $videometadec',`image`='$image_name',`url`=' $videolink',`genreid`=$genre,`categoryid`=$category WHERE id=$id";

$run4 = mysqli_query($con,$query4);
if($run4){
    //if(move_uploaded_file($_FILES['img']['tmp_name'], "../thumbnail/".$img)){
        echo "<script>alert('Video Updated Successfully');window.location.href='adminpost.php';</script>";
    } else {
      echo "<script>alert('Something Went Wrong');</script>";
    }
//}

}
?>