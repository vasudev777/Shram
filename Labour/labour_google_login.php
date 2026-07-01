<?php
include('../db.php');
session_start();

$email  = $_POST['email'];
$sql    = "SELECT * FROM labour_details WHERE l_email='$email'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);

    if($row['l_emailverify'] == 0) {
        echo "<script>alert('Please verify your email first!'); window.location='login.php';</script>";
        exit;
    }
    if($row['l_approval'] == 0) {
        echo "<script>alert('Your account is pending admin approval!'); window.location='login.php';</script>";
        exit;
    }
    if($row['l_approval'] == 2) {
        echo "<script>alert('Your account has been rejected!'); window.location='login.php';</script>";
        exit;
    }
    if($row['l_status'] == 0) {
        echo "<script>alert('Your account has been blocked!'); window.location='login.php';</script>";
        exit;
    }

    $_SESSION['l_email']     = $row['l_email'];
    $_SESSION['l_id']        = $row['l_id'];
    $_SESSION['l_name']      = $row['l_name'];
    $_SESSION['l_number']    = $row['l_number'];
    $_SESSION['l_city']      = $row['l_city'];
    $_SESSION['l_state']     = $row['l_state'];
    $_SESSION['l_type']      = $row['l_type'];
    $_SESSION['l_wage']      = $row['l_wage'];
    $_SESSION['l_exp']       = $row['l_exp'];
    $_SESSION['l_education'] = $row['l_education'];
    $_SESSION['l_status']    = $row['l_status'];

    header("location: index.php");
} else {
    echo "<script>alert('No labour account found with this Google email!'); window.location='login.php';</script>";
}
?>