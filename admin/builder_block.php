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

    $sql = "UPDATE `build_details` SET `b_status` = '1' WHERE `build_details`.`b_id` = '$bid'";
//echo  $sql;
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Builder Blocked')</script>";
        echo "<script>window.location='builder_details.php'</script>";
    } else {
        echo "<script>alert('Error')</script>";

    }

}

if (isset($_GET['unblockid'])) {
    $unblockid = $_GET['unblockid'];

    $sql = "UPDATE `build_details` SET `b_status` = '0' WHERE `build_details`.`b_id` = '$unblockid'";
    //echo  $sql;
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Builder Unblocked')</script>";
        echo "<script>window.location='builder_details.php'</script>";
    } else {
        echo "<script>alert('Error')</script>";

    }

}

?>
