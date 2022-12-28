<?php
include "connection.php";
$id=$_GET["$id"];

$firstname="";
$lastname="";
$address="";
$phone="";

$res=sqlsrv_query($link,"select FirstName, LastName, EmailAddress, Phone from [SalesLT].[Customer] where id=$id");
while($row=mysqli_fetch_array($res)){
    $firstname=$row["FirstName"];
    $lastname=$row["LastName"];
    $address=$row["EmailAddress"];
    $phone=$row["Phone"];
}
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
  <h2>Assigment-2-Maximilian</h2>
  <form action="" name="form1" method="post">
    
    <div class="form-group">
      <label for="EmpName">EmpName</label>
      <input type="text" class="form-control" id="EmpName" placeholder="Enter first name" name="firstname" value="<?php echo $firstname;  ?>">
    </div>
    
    <div class="form-group">
      <label for="EmpSurname">EmpSurname</label>
      <input type="text" class="form-control" id="EmpSurname" placeholder="Enter last name" name="lastname" value="<?php echo $lastname;  ?>">
    </div>
    
    <div class="form-group">
      <label for="EmpAddress">EmpAddress</label>
      <input type="text" class="form-control" id="EmpAddress" placeholder="Enter Address" name="address" value="<?php echo $address;  ?>">
    </div>
    
    <div class="form-group">
      <label for="EmpPhone">EmpPhone:</label>
      <input type="tel" class="form-control" id="EmpPhone" placeholder="Enter phone" name="phone" value="<?php echo $phone;  ?>">
    </div>
    
    
    <button type="submit" name="delete" class="btn btn-default">Delete</button>
    
  </form>
</div>
</div>


</div>
</body>

<?php
if(isset($_POST["update"])){
    mysqli_query($link,"update SalesLT.Customer set FirstName='$_POST[firstname]',LastName='$_POST[lastname]',EmailAddress='$_POST[address]',Phone='$_POST[phone]' where id=$id");
    ?>
    <script type= "text/javascript">
        window.location="index.php";
    </script>

    <?php
}
?>


</html>
