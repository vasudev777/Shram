<?php
include('db.php');
session_start();


if (isset($_GET['id'])) {
    $id = $_GET['id'];
$cuid=$_SESSION['cust_id'];
    $sql = "DELETE FROM cust_cart WHERE `cust_cart`.`item_id` = $id and `cust_cart`.`cust_id`=$cuid";
//echo  $sql;
    if (mysqli_query($conn, $sql)) {
        echo "<script>window.location='cart.php'</script>";
    } else {
        echo "<script>alert('Error')</script>";

    }

}


?>