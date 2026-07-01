<?php
include('../db.php');
session_start();

$email  = $_POST['email'];
$sql    = "SELECT * FROM build_details WHERE b_email='$email'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);

// Email verify check
if($row['b_emailverify'] == 0) {
    echo "<script>alert('Please verify your email first!'); window.location='login.php';</script>";
    exit;
}
// Admin approval check
if($row['b_approval'] == 0) {
    echo "<script>alert('Your account is pending admin approval!'); window.location='login.php';</script>";
    exit;
}
if($row['b_approval'] == 2) {
    echo "<script>alert('Your account has been rejected!'); window.location='login.php';</script>";
    exit;
}
// Block check
if($row['b_status'] == 1) {
    echo "<script>alert('Your account has been blocked! Contact support.'); window.location='login.php';</script>";
    exit;
}

    $_SESSION['b_email']      = $row['b_email'];
    $_SESSION['b_id']         = $row['b_id'];
    $_SESSION['b_name']       = $row['b_name'];
    $_SESSION['b_number']     = $row['b_number'];
    $_SESSION['b_city']       = $row['b_city'];
    $_SESSION['b_state']      = $row['b_state'];
    $_SESSION['b_experience'] = $row['b_experience'];
    $_SESSION['b_status']     = $row['b_status'];

    header("location: index.php");
} else {
    echo "<script>alert('No builder account found with this Google email!'); window.location='login.php';</script>";
}
?>