<?php 
include 'header.php';
//Include required phpmailer files
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';
//Define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['sub'])){

    $name = mysqli_real_escape_string($con,$_POST['txtname']);
    $email =mysqli_real_escape_string($con,$_POST['txtEmail']);
    $pwd =mysqli_real_escape_string($con,$_POST['txtpwd']);
    $cpwd =mysqli_real_escape_string($con,$_POST['ctxtpwd']);
    $img = $_FILES['image']['name'];


    $depwd = password_hash($pwd,PASSWORD_BCRYPT);
    $decpwd = password_hash($cpwd,PASSWORD_BCRYPT);
    
    $token = bin2hex(random_bytes(20));
    
    $query = "SELECT * FROM userreg where email='$email'";
    $run = mysqli_query($con,$query);
    
    $emailver = mysqli_num_rows($run);
    
    if ($emailver>0){
       ?>
       <div class="alert alert-danger" role="alert">
               <?php echo "Email Already In Use"; ?>
       </div>
       <?php
    }
    else{
       if($pwd === $cpwd){
           $query1 = "INSERT INTO `userreg`( `name`, `email`, `pwd`, `cpwd`, `token`, `status`, `img`) VALUES ('$name','$email','$depwd','$decpwd','$token','inactive','$img')";
           
           $run1 = mysqli_query($con,$query1);
           if($run1){
           if(move_uploaded_file($_FILES['image']['tmp_name'], "userimg/".$img)){
            //creat an instance of phpmailer
$mail = new PHPMailer();
//set mailer to use smtp
$mail->isSMTP();
//define smtp host
$mail->Host = "smtp.gmail.com";
//enable smtp authentication
$mail->SMTPAuth = "true";
//set type of encryption (ssl/tls)
$mail->SMTPSecure="tls";
//set port to connect smtp
$mail->Port = "587";
//set gmail username
$mail->Username = "yvibe7605@gmail.com";
//set gmail password
$mail->Password = "fgxqcksookxjdyry";
//set email subject
$mail->Subject = "Email Verification";
//set sender email
$mail->setFrom("yvibe7605@gmail.com");
//Enable Html
$mail->isHTML(true);
//Email body
$mail->Body = "<h1>Hi ".$name.", This is Your verification Link Please Click Here to verify for Youtubevibe</h1>http://localhost/youtubevibe/activate.php?token=$token";
//add recipient
$mail->addAddress($email);
//finally send email
if ($mail->send()){
    
    
    $_SESSION['msg'] = "Verification Link successfully sent to ".$email."..."; 
    echo "<script>window.location.href='login.php';</script>";
      
  
}else{
    ?>
    <div class="alert alert-danger" role="alert">
    <?php echo "Email sending failed.."; ?>
          </div>
<?php
}
//closing smtp connection
$mail->smtpClose();
           }
        }
       }
       else
       {
           ?>
           <div class="alert alert-danger" role="alert">
                   <?php echo "Your Password Doesn't Match"; ?>
           </div>
           <?php
       }
    
    }
    
    
    }

?>

<div class="container contact-form">



            <form action="reguser.php" method="post" enctype="multipart/form-data">
                
            <h3>Register for Youtubevibe</h3>
               <div class="row">
                    <div class="col-md-6 col-sm-12 col-lg-6">
                    <div class="form-group">
                            <input type="text" name="txtname" class="form-control" placeholder="Your Full Name *" value="" />
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="text" name="txtEmail" class="form-control" placeholder="Your Email *" value="" />
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="password" name="txtpwd" class="form-control" placeholder="Your Password *" value="" />
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="password" name="ctxtpwd" class="form-control" placeholder="Comfirm Password *" value="" />
                        </div>
                        <br> 
                        <div class="input-group">
                        <input type="file" name="image" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                        
                        </div>
                        <br>
                        <div>
                            <pre>Already Registered? <a href="login.php">Login Here</a></pre>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="sub" class="btnContact" value="Register" />
                        </div>
                    </div>
                   
                </div>
            </form>
</div>


<?php

?>


<?php 
include 'ft.php';

?>

