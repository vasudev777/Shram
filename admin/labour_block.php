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

    $sql = "UPDATE `labour_details` SET `l_status` = '0' WHERE `labour_details`.`l_id` = '$bid'";
echo  $sql;
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('labour Blocked')</script>";
        echo "<script>window.location='labour_details.php'</script>";
    } else {
        echo "<script>alert('Error')</script>";

    }

}

if (isset($_GET['unblockid'])) {
    $unblockid = $_GET['unblockid'];

    $sql = "UPDATE `labour_details` SET `l_status` = '1' WHERE `labour_details`.`l_id` = '$unblockid'";
    //echo  $sql;
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Labour Unblocked')</script>";
        echo "<script>window.location='labour_details.php'</script>";
    } else {
        echo "<script>alert('Error')</script>";

    }

}

?>
