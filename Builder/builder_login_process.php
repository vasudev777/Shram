<?php
include('../db.php');
session_start();

$email    = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

$stmt = mysqli_prepare($conn, "SELECT * FROM build_details WHERE b_email = ?");
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
mysqli_stmt_close($stmt);

if(mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);

    if(password_verify($password, $row['b_password'])) {

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

        // Session set karo
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
        echo "<script>alert('Wrong Password!'); window.location='login.php';</script>";
    }
} else {
    echo "<script>alert('Email not registered!'); window.location='login.php';</script>";
}
?>
