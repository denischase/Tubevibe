<?php
include 'header.php'
?>

<div class="container">
    <center>
        <h2>Videos Posted By Admin</h2>
    </center>
    <a href="uploadadmin.php" class="btn btn-success" style="color: #000;">Upload</a>
    <hr>
    <div class="row">
        <?php 
        
        $query = "SELECT * FROM adminupload";
        $run = mysqli_query($con,$query);

        if($run){
            while ($row = mysqli_fetch_assoc($run)){
                
                ?>
               
        <div class="col-4">
            <div class="card" style="width: 18rem; text-align:center;">
                <img class="card-img-top" src="../thumbnail/<?php echo $row['image']; ?>" alt="Card image cap">
                <?php //echo "<img height='180px' width=' ' src='../thumbnail/".$row['image']."'>";?>
                <!-- <img src="<?php //echo"../thumbnail/".$row['image'] ?>" height="180px"> -->
                <?php // echo "<img height='180px' width='auto' src='../thumb/".$row2['img']."'>"; ?>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['videotitle']; ?></h5>
                    <?php 
                    $id1=$row['id'];
                    $query1 = "SELECT categoryname as category FROM adminupload,main_cat where adminupload.categoryid=main_cat.id and adminupload.id=$id1";

                    $run1 = mysqli_query($con,$query1);
                    if ($run1){
                        while ($row1 =mysqli_fetch_assoc($run1)){
                            echo "<pre>Category <b>".$row1['category'] ."</b></pre>";

                        }
                    }

                    ?>
                    <?php 
                    
                    $query2 = "SELECT genrename as genre from adminupload,genre where adminupload.genreid=genre.id and adminupload.id=$id1";
                    $run2 = mysqli_query($con,$query2);
                    if($run2){
                        while($row2=mysqli_fetch_assoc($run2)){
                            echo "<pre>Genre <b>".$row2['genre'] ."</b></pre>";
                        }
                    }

                    ?>
                    <a href="viewvideo.php?id=<?php echo$row['id'] ?>" class="btn btn-success" style="color: #000;">View <i class="fas fa-eye"></i></a>
                   
                    <a href="deleteadminvideo.php?id=<?php echo$row['id'] ?>" class="btn btn-danger" style="color: #000;"><i class="fas fa-trash-alt"></i></a>
                </div>
            </div>
        </div>

        <?php
            }
        }
        ?>

    </div>

    <?php
    include 'ft.php'
    ?>