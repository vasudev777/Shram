<?php
include('db.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM cust_fev_item WHERE `cust_fev_item`.`fev_id` = $id";
//echo  $sql;
    if (mysqli_query($conn, $sql)) {
        echo "<script>window.location='fev.php'</script>";
    } else {
        echo "<script>alert('Error')</script>";

    }

}


?>