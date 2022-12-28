<?php
include "connection.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Assigment2</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>


<div class="container">
<div class="col-lg-4">
  <h2>Assigment-2-Maximilian-119200099</h2>
  <form action="" name="form1" method="post">
    
    <div class="form-group">
      <label for="EmpName">EmpName</label>
      <input type="text" class="form-control" id="EmpName" placeholder="Enter first name" name="firstname">
    </div>
    
    <div class="form-group">
      <label for="EmpSurname">EmpSurname</label>
      <input type="text" class="form-control" id="EmpSurname" placeholder="Enter last name" name="lastname">
    </div>
    
    <div class="form-group">
      <label for="EmpAddress">EmpAddress</label>
      <input type="text" class="form-control" id="EmpAddress" placeholder="Enter Address" name="address">
    </div>
    
    <div class="form-group">
      <label for="EmpPhone">EmpPhone:</label>
      <input type="tel" class="form-control" id="EmpPhone" placeholder="Enter phone" name="phone">
    </div>
    
    <button type="submit" name="insert" class="btn btn-default">Submit</button>
    <button type="submit" name="delete" class="btn btn-default">Delete</button>
    <button type="submit" name="update" class="btn btn-default">Update</button>
  </form>
</div>
</div>

<div class="col-lg-4">
 
<table class="table table-bordered">
    <thead>
      <tr>
      <th>#</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $res=sqlsrv_query($link,"select FirstName, LastName, EmailAddress, Phone FROM [SalesLT].[Customer]");
        while($row=mysqli_fetch_array($res)){
          echo "<tr>";
          echo "<td>"; echo $row["id"] ;echo"</td>";
          echo "<td>"; echo $row["firstname"] ;echo"</td>";
          echo "<td>"; echo $row["lastname"] ;echo"</td>";
          echo "<td>"; echo $row["address"] ;echo"</td>";
          echo "<td>"; echo $row["phone"] ;echo"</td>";
          echo "<td>"; ?> <a href="edit.php?id=<?php echo $row["id"]; ?>"> <button type="button" class="btn btn-success">Edit</button></a> <?php echo"</td>";
          echo "<td>"; ?> <a href="delete.php?id=<?php echo $row["id"]; ?>"> <button type="button" class="btn btn-danger">Delete</button></a> <?php echo"</td>";
          echo "<tr>";
        }
      ?>
    </tbody>
  </table>
</div>
</body>

<?php

if(isset($_POST["insert"]))
{
  sqlsrv_query($link,"insert into [SalesLT].[Customer] values(NULL,NULL,NULL,'$_POST[firstname]',NULL,'$_POST[lastname]',NULL,NULL,NULL,'$_POST[address]','$_POST[phone]',NULL,NULL,NULL,NULL)");
  
  ?>
  <script type="text/javascript">
    window.location.href=window.location.href;
  </script>
  <?php

}
if(isset($_POST["delete"])){
  sqlsrv_query($link,"delete FROM [SalesLT].[Customer] where firstname='$_POST[firstname]'");

  ?>
  <script type="text/javascript">
    window.location.href=window.location.href;
  </script>
  <?php
}


if(isset($_POST["update"])){
  sqlsrv_query($link,"update SalesLT.Customer set firstname='$_POST[lastname]' where firstname='$_POST[firstname]'");

  ?>
  <script type="text/javascript">
    window.location.href=window.location.href;
  </script>
  <?php
}

?>
</html>
