<?php
include('../db.php');
session_start();

$user_otp = $_POST['user_otp'];

if($user_otp == $_SESSION['labour_login_otp']) {
    $email  = $_SESSION['labour_login_email'];
    $sql    = "SELECT * FROM labour_details WHERE l_email='$email'";
    $result = mysqli_query($conn, $sql);
    $row    = mysqli_fetch_array($result);

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

    unset($_SESSION['labour_login_otp']);
    unset($_SESSION['labour_login_email']);

    header("location: index.php");
} else {
    echo "<script>alert('Invalid OTP! Please try again.'); window.location='login.php';</script>";
}
?>