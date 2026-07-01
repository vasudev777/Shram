<?php
include('db.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM build_cart WHERE `build_cart`.`cart_id` = $id";
echo  $sql;
    if (mysqli_query($conn, $sql)) {
        echo "<script>window.location='cart.php'</script>";
    } else {
        echo "<script>alert('Error')</script>";

    }

}


?>