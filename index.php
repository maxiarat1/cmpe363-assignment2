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
      <label for="EmpName">EmpName (Also you can type here to delete)</label>
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

<div class="col-lg-12">
 
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
        $res=sqlsrv_query($link,"select CustomerID,FirstName, LastName, EmailAddress, Phone FROM [SalesLT].[Customer]");
        sqlsrv_query($link,"alter table [SalesLT].[Customer] nocheck constraint all");
        if( $res === false) {
            die( print_r( sqlsrv_errors(), true) );
        }
        while($row=sqlsrv_fetch_array($res)){
          //echo $row['LastName'].", ".$row['FirstName']."<br />";
          echo "<tr>";
          echo "<td>"; echo $row["CustomerID"] ;echo"</td>";
          echo "<td>"; echo $row["FirstName"] ;echo"</td>";
          echo "<td>"; echo $row["LastName"] ;echo"</td>";
          echo "<td>"; echo $row["EmailAddress"] ;echo"</td>";
          echo "<td>"; echo $row["Phone"] ;echo"</td>";
          echo "<td>"; ?> <a href="edit.php?id=<?php echo $row["CustomerID"]; ?>"> <button type="button" class="btn btn-success">Edit</button></a> <?php echo"</td>";
          echo "<td>"; ?> <a href="delete.php?id=<?php echo $row["CustomerID"]; ?>"> <button type="button" class="btn btn-danger">Delete</button></a> <?php echo"</td>";
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
  sqlsrv_query($link,"INSERT INTO [SalesLT].[Customer] (FirstName,LastName,EmailAddress,Phone,PasswordHash,PasswordSalt) values('$_POST[firstname]','$_POST[lastname]','$_POST[address]','$_POST[phone]','1234','12345')");
  
  ?>
  <script type="text/javascript">
    window.location.href=window.location.href;
  </script>
  <?php

}
if(isset($_POST["delete"])){
  sqlsrv_query($link,"delete FROM [SalesLT].[Customer] where FirstName='$_POST[firstname]'");
                     
  ?>
  <script type="text/javascript">
    window.location.href=window.location.href;
  </script>
  <?php
}

if(isset($_POST["update"])){
  sqlsrv_query($link,"update [SalesLT].[Customer] set FirstName='$_POST[lastname]' where FirstName='$_POST[firstname]'");

  ?>
  <script type="text/javascript">
    window.location.href=window.location.href;
  </script>
  <?php
}

?>
</html>
