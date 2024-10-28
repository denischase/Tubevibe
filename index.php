<?php
//yvibe7605  fgxqcksookxjdyry  username for google account
include 'header.php'

?>
<div class="container-fluid">
    <div class="bg-secondary" style="height: 300px; max-height: 100%; max-width: 100%; justify-content:center; display:flex; text-align:center;">
        <div style="padding-top: 40px;">
            <img src="img/favicon.png" height="200px" width="auto" style="max-height: 100%; max-width: 100%;">
        </div>
        <div class="typewriter">
            <h1 style="color:#fff;">Youtubevibe</h1>
            <h4>Stream Unlimited Videos</h4>
        </div>
    </div>
</div>

<!-- seprator -->
<div class="container">
    <div class="row">
        <!-- body start-->
        <div class="col-sm-12 col-md-9 col-xl-9 ">
            <!-- body -->
            <div class="row">
            <?php 

            $query = "SELECT * FROM movie";
            $run = mysqli_query($con,$query);
        if($run){
            while($row = mysqli_fetch_assoc($run)){
       ?>
                <!-- 1st video -->
                <div class="col-sm-12 col-md-3 col-lg-3"  style="padding-top: 50px;">
                <div class="videohover">
                <div class="content">
                    <img src="thumbnail/maise.mirror.effect.jpg" height="120px">
                    <h6>how to earn money with crypto</h6>
                    <p><b>Derflastorm</b></p>
                    <div class="d-flex">
                    <p>500 views</p>&nbsp;<p>10/10/2023</p>
                    </div>
                    
                </div>
                </div>    
                </div>
                
                <!-- end -->
            </div>

         <?php
                }
            }

            ?>
            
        </div>
        <!-- sidebar start-->
        <div class="col-sm-12 col-md-3 col-xl-3 ">
            <!-- sidebar -->
        </div>

    </div>
</div>

<?php

include 'ft.php'

?>