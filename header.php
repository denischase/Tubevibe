<?php 
    include 'db.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tubevibe</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
      <!-- FontAwesome JS-->
      <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">
    <link rel="icon" type="image/png" href="img/favicon.png">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
  <!-- nav -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="img/logo.png" height="50px"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-auto" >
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        
          <?php
          if (isset($_SESSION['loginsuc'])){
            $userid = $_SESSION['id'];

            $enc1 = (($userid*123456789*54321)/956783);
            $url = "profile.php?id=".urldecode(base64_encode($enc1));

             ?><li class="nav-item dropdown">
             
             <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?php echo $_SESSION['user']; ?></a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?php echo $url; ?>">Profile</a></li>
            <li><a class="dropdown-item" href="#">Action ao</a></li>
            <li></li>
            <li class="bg-danger"><a  class="dropdown-item" href="logout.php">Logout</a></li>
          </ul>
        </li>
             <?php
          }
          else{
            echo "<a class='nav-link' href='login.php'>Login<i class='fas fa-sign-in-alt' style='color:#000;'></i></a>";
          }
          ?>  
          </a>
      </li>
       
      
       
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

  <!-- nav end -->
    
