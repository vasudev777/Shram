<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['a_id'])) {
    header("location: login.php");
    exit;
}

include('../db.php');
if (isset($_GET['blockid'])) {
    $bid = $_GET['blockid'];

    $sql = "UPDATE `cust_details` SET `cust_status` = '1' WHERE `cust_details`.`cust_id` = '$bid'";
echo  $sql;
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Customer Unblocked')</script>";
        echo "<script>window.location='customer_details.php'</script>";
    } else {
        echo "<script>alert('Error')</script>";

    }

}

if (isset($_GET['unblockid'])) {
    $unblockid = $_GET['unblockid'];

    $sql = "UPDATE `cust_details` SET `cust_status` = '0' WHERE `cust_details`.`cust_id` = '$unblockid'";
    //echo  $sql;
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Customer blocked')</script>";
        echo "<script>window.location='customer_details.php'</script>";
    } else {
        echo "<script>alert('Error')</script>";

    }

}

?>
