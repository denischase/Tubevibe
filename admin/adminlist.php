<?php
include 'header.php';

?>
<!-- table -->

<div class="container">
    <div class="head" style="padding-top:10px;padding-bottom:10px;text-align:center;">
        <h1>Admin List</h1>
        <hr>
    </div>
    <a href="reg.php" class="btn btn-success" style="color: #000;">Register Admin</a>
<table class="table ">
  <thead>
   
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Username</th>
      <th scope="col">Password</th>
      <th scope="col">Curd</th>
    </tr>
  </thead>
  <?php 
    $query = "SELECT * from admin";
    $run = mysqli_query($con,$query);
    if ($run) {
        while ($row = mysqli_fetch_assoc($run)){
            
   ?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $row['id']; ?></th>
      <td><?php echo $row['uname']; ?></td>
      <td><pre>Password Encrypted</pre></td>
      <td><a class="btn btn-danger" href="deleteadmin.php?id=<?php echo $row['id']; ?>&uname=<?php echo$row['uname'];?>"><i class="fas fa-trash-alt"></i></a> 
      </td>
    </tr>
    <?php
}
}

?>
  </tbody>
</table>


<!-- table end -->

<?php

include 'ft.php';

?>