<?php 
include 'header.php';



?>

<div class="container contact-form">
         
            <form action="login.php" method="post">
                <h3>Sign in to Youtubevibe</h3>
               <div class="row">
                    <div class="col-md-6 col-sm-12 col-lg-6">


                    
                      <?php
                            if(isset($_POST['btnSubmit'])){
                                $email = $_POST['txtEmail'];
                                $pwd = $_POST['txtpwd'];
                            
                                $query1 = "SELECT * from userreg where email = '$email' and status= 'active'";
                            
                                $run = mysqli_query($con,$query1);
                            
                                if($run){
                                    while ($row = mysqli_fetch_assoc($run)){
                                        if(password_verify($pwd, $row['pwd'])){
                                         
                                            header('location:index.php');
                                            $_SESSION['loginsuc'] = 1;
                                            $_SESSION['id'] = $row['id'];
                                            $_SESSION['user'] = $row['name'];
                                        }
                                        else{
                                            ?>
                                            <div class="alert alert-danger" role="alert">
                                           <?php echo "Wrong credentials"; ?>
                                   </div>
                                            <?php
                                        }
                                    }
                                }
                            }
                            else{
                                ?>
                                <div class="alert alert-success" role="alert">
                                <?php 
                                if(isset($_SESSION['msg'])){
                                echo $_SESSION['msg'];
                                unset($_SESSION['msg']);
                             }
                             else if(isset($_SESSION['message'])){
                                 echo $_SESSION['message'];
                                 unset($_SESSION['message']);
                              }
                             else{
                                 echo "<p>Login with your Email & Password</p>";
                             }
                             
                                ?>
                             </div>
                                <?php
                                 
                            } 
                      ?>
                    
                    
                        <div class="form-group">
                            <input type="text" name="txtEmail" class="form-control" placeholder="Your Email *" value="" />
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="password" name="txtpwd" class="form-control" placeholder="Your Password *" value="" />
                        </div>
                        <br>
                        <div>
                            <pre>Not Registered? <a href="reguser.php">Register Here</a></pre>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="btnSubmit" class="btnContact" value="Login" />
                        </div>
                    </div>
                   
                </div>
            </form>
</div>


<?php 
include 'ft.php';
?>