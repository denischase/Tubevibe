<?php

include 'header.php';


?>

<div class="container">
    <center><h1>Category</h1></center>
    <a href="regcat.php" class="btn btn-success" style="color: #000;">Register Category</a>
    <table class="table ">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Category Name</th>
      <th scope="col">Genre ID</th>
      <th scope="col">Sub-Category ID</th>
      <th scope="col">Genre</th>
      <th scope="col">Delete</th>
      <th scope="col">Edit</th>
    </tr>
  </thead>
  <?php
    $query = "SELECT * FROM main_cat";
    $run = mysqli_query($con,$query);
    if ($run){
        while ($row = mysqli_fetch_assoc($run)){
           // $row['id'];

     ?> 
   
  <tbody>
    <tr>
      <th scope="row"><?php echo $row['id']; ?></th>
      <td><?php echo $row['categoryname']; ?></td>
      <td><?php echo $row['genre']; ?></td>
      <td><?php echo $row['subcat_id']; ?></td>
      <?php 
        $id = $row['id'];
          $query1 = "select genrename as genre from main_cat,genre where main_cat.genre=genre.catid and main_cat.id=$id";

          $run1 = mysqli_query($con,$query1);
          if(mysqli_num_rows($run1)>0){
            while ($rows = mysqli_fetch_assoc($run1)){
              ?>
              <td><?php echo $rows['genre']; ?></td>
              <?php
            }
          }
          else{
            echo "<td><pre>Genre Not Listed</pre></td>"; 
          }

      ?>
      

    
      
      <td><a class="btn btn-danger" style="color: #000;" href="deletecategory.php?id=<?php echo $row['id']; ?>&catname=<?php echo$row['categoryname']?>"><i class="fas fa-trash-alt"></i></a></td>
      <td><a class="btn btn-info" style="color: #000;" href="upcat.php?id=<?php echo $row['id']; ?>&cat=<?php echo$row['categoryname']; ?>&sub=<?php echo$row['subcat_id']; ?>&genre=<?php echo$row['genre']; ?>"><i class="fas fa-edit"></i></a></td>
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