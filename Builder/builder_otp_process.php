<?php
include('../db.php');
session_start();

$user_otp = $_POST['user_otp'];

if($user_otp == $_SESSION['builder_login_otp']) {
    $email  = $_SESSION['builder_login_email'];
    $sql    = "SELECT * FROM build_details WHERE b_email='$email'";
    $result = mysqli_query($conn, $sql);
    $row    = mysqli_fetch_array($result);

    $_SESSION['b_email']      = $row['b_email'];
    $_SESSION['b_id']         = $row['b_id'];
    $_SESSION['b_name']       = $row['b_name'];
    $_SESSION['b_number']     = $row['b_number'];
    $_SESSION['b_city']       = $row['b_city'];
    $_SESSION['b_state']      = $row['b_state'];
    $_SESSION['b_experience'] = $row['b_experience'];
    $_SESSION['b_status']     = $row['b_status'];

    unset($_SESSION['builder_login_otp']);
    unset($_SESSION['builder_login_email']);

    header("location: index.php");
} else {
    echo "<script>alert('Invalid OTP!'); window.location='login.php';</script>";
}
?>
