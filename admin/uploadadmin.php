<?php
include 'header.php';
?>

<div class="container">
  <center>
    <h2>Upload Videos</h2>
  </center>
  <hr>
  <div class="form">
    <form action="uploadadmin.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <div class="mb-3">
          <input type="text" name="videotitle" required class="form-control" placeholder="Video Title">
        </div>
        <div class="mb-3">
          <input type="text" name="videodec" required class="form-control" placeholder="Video Description">
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
          <input type="text" name="videotag" required class="form-control" placeholder="Video Tags">
        </div>
        <div class="mb-3">
          <input type="text" name="videometa" required class="form-control" placeholder="Video Meta Tags">
        </div>
        <div class="mb-3">
          <input type="text" name="videometadec" required class="form-control" placeholder="Video meta Description">
        </div>
        <div class="mb-3">
          <input type="file" name="img" class="form-control">
          <label class="form-label">Thumbnail</label>
        </div>
        <div class="mb-3">
          <input type="url" name="videolink" required class="form-control" placeholder="Video link">
        </div>
      </div>

      <button type="submit" name="submit" class="btn btn-" style="background-color:#16a085;color:#fff;">Upload</button>
    </form>
  </div>

</div>
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
  $image_name = $_FILES['img']['name'];


  if(isset($_FILES['img']['name']))
  {
      //upload the image
      //to upload image we need image name ,source path and destination path
      $image_name = $_FILES['img']['name'];
      //upload image only if image is selected
      if($image_name != "")
      {
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
             // $_SESSION['upload'] = "<div class='error'>Failed to Upload Image.</div>";
              //redirect
              //header('location'.SITEURL.'admin/add-category.php');
              echo "<script>alert('Image Uploaded Successfully');window.location.href='adminpost.php';</script>";
              //stop the process
              die();
          }

      }
  }
  else
  {
      //dont upload image and set imagename value as blank
      $image_name="";
  }



  $query = "INSERT INTO `adminupload`( `videotitle`, `videodec`, `videotag`, `videometatag`, `videometadec`, `image`, `url`,`genreid`, `categoryid`) VALUES ('$videotitle','$videodec','$videotag','$videometa',' $videometadec','$image_name','$videolink',$genre,$category)";

  $run = mysqli_query($con, $query);
  if ($run) {
   // if (move_uploaded_file($_FILES['img']['tmp_name'], "../thumbnail/" . $img)) {
      echo "<script>alert('Video Uploaded Successfully');window.location.href='adminpost.php';</script>";
    } else {
      echo "<script>alert('Something Went Wrong');</script>";
    }
 // }
}

?>