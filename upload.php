<?php 

include 'header.php';

?>
<div class="container">
<h2 class="text-center">Upload</h2>
<div class="form">
    <form action="upload.php" method="post" enctype="multipart/form-data">
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
        <label class="form-label">Thumbnail</label>
          <input type="file" name="img" class="form-control">
          
        </div>
        <div class="mb-3">
        <label class="form-label">Video</label>
          <input type="file" name="video" required class="form-control" placeholder="Video link">
        </div>
      </div>

      <button type="submit" name="submit" class="btn btn-" style="background-color:#16a085;color:#fff;">Upload</button>
    </form>
  </div>

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
    $video = $_FILES['video']['name'];
    $genre = $_POST['genre'];
    $category = $_POST['category'];
    $image_name = $_FILES['img']['name'];
    $user = $_SESSION['user'];
    $userid = $_SESSION['id'];
     $today = date('m.d.y');
    //echo date('Y') = $date;
    

    $query0 = "INSERT INTO `userupload`( `userid`,`videotitle`, `videodec`, `videotag`, `videometatag`, `videometadec`, `image`, `url`, `genreid`, `categoryid`,`channelname`, `date`) VALUES ($userid,'$videotitle','$videodec','$videotag','$videometa',' $videometadec','$image_name','$video',$genre,$category,'$user','$today')";
    $run0 = mysqli_query($con,$query0);
   
    if($run0){
        if(move_uploaded_file($_FILES['img']['tmp_name'], "thumbnail/". $image_name)){
            if(move_uploaded_file($_FILES['video']['tmp_name'], "../useruploadvideos/". $video)){

                $userid = $_SESSION['id'];
                $user = $_SESSION['user'];
            $enc1 = (($userid*123456789*54321)/956783);
            $url = "profile.php?id=".urldecode(base64_encode($enc1));
                echo "<script>alert('Video Upload Sucessful');window.location.href='".$url."'</script>";
            }
            else{
                echo "<script>alert('Video Not Uploaded');</script>";
            }

        }
        else{
            echo "<script>alert('Thumbnail Not Uploaded');</script>";
        }
    }
    else{
        echo "<script>alert('something is wrong with query');</script>";
    }

}
?>