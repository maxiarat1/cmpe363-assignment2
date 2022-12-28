<?php 
include "connection.php";
$id=$_GET["id"];
sqlsrv_query($link,"delete from SalesLT.Customer where id=$id");
?>
<script type="text/javascript">
    window.location="index.php";
</script>
