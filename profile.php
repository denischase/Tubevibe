<?php
include 'header.php';
?>

<?php
if(isset($_SESSION['loginsuc'])){
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    foreach ($_GET as $key => $id) {
        $data = $_GET[$key] = base64_decode(urldecode($id));
        $decrypt = ((($data * 956783) / 54321) / 123456789);
        $query = "SELECT * FROM userreg where id=$decrypt";

        $run = mysqli_query($con, $query);
        if ($run) {
            while ($row = mysqli_fetch_assoc($run)) {
?>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-4 col-lg-4 text-center">
                         
                        <img style="height:200px;width:auto;max-width:100%; max-height:100%;border-radius:50%;" src="userimg/<?php echo $row['img']; ?>">    
                        <h4><?php echo$row['name']; ?></h4>
                        <pre>Your Email: </pre><p><b><?php echo$row['email']; ?></b></p>
                        </div>

                        <div class="col-sm-12 col-md-8 col-lg-8">
                            <a href="upload.php" class="btn btn-warning text-light">Upload</a>
                        </div>
                    </div>
                </div>
<?php
            }
        }
    }
}else{
    header('location:login.php');
}
} else {
    header('location:login.php');
}
?>



<?php
include 'ft.php';
?>