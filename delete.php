<?php 
include "connection.php";
$id=$_GET["CustomerID"];
sqlsrv_query($link,"delete FROM [SalesLT].[Customer] where CustomerID=$id");
?>
<script type="text/javascript">
    window.location="index.php";
</script>
