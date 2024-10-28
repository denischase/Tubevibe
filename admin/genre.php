<?php

include 'header.php';


?>

<div class="container">
    <center><h1>Genre</h1></center>
    <a href="reggen.php" class="btn btn-success" style="color: #000;">Register Genre</a>
    <table class="table ">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Genre Name</th>
      <th scope="col">Sub-Category ID</th>
      <th scope="col">Category ID</th>
      <th scope="col">Delete</th>
      <th scope="col">Edit</th>
    </tr>
  </thead>
  <?php
    $query = "SELECT * FROM genre";
    $run = mysqli_query($con,$query);
    if ($run){
        while ($row = mysqli_fetch_assoc($run)){
           // $row['id'];

     ?> 
   
  <tbody>
    <tr>
      <th scope="row"><?php echo $row['id']; ?></th>
      <td><?php echo $row['genrename']; ?></td>
      <td><?php echo $row['subcat_id']; ?></td>
      <td><?php echo $row['catid']; ?></td>

    
      
      <td><a class="btn btn-danger" style="color: #000;" href="deletegenre.php?id=<?php echo $row['id']; ?>&catname=<?php echo$row['genrename']?>"><i class="fas fa-trash-alt"></i></a></td>
      <td><a class="btn btn-info" style="color: #000;" href="upgen.php?id=<?php echo $row['id']; ?>&cat=<?php echo$row['genrename']; ?>&sub=<?php echo$row['subcat_id']; ?>&genre=<?php echo$row['catid']; ?>"><i class="fas fa-edit"></i></a></td>
    </tr>
   
  </tbody>
  <?php      
        }
    }
  ?>
</table>
</div>

<?php


include 'ft.php';


?>