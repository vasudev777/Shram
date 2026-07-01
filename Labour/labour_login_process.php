<?php
include('../db.php');
session_start();

$email    = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

$stmt = mysqli_prepare($conn, "SELECT * FROM labour_details WHERE l_email = ?");
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
mysqli_stmt_close($stmt);

if(mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);

    if(password_verify($password, $row['l_password'])) {

        // Email verify check
        if($row['l_emailverify'] == 0) {
            echo "<script>alert('Please verify your email first! Check your inbox.'); window.location='login.php';</script>";
            exit;
        }

        // Admin approval check
        if($row['l_approval'] == 0) {
            echo "<script>alert('Your account is pending admin approval. Please wait!'); window.location='login.php';</script>";
            exit;
        }

        if($row['l_approval'] == 2) {
            echo "<script>alert('Your account has been rejected. Please contact support.'); window.location='login.php';</script>";
            exit;
        }

        // Block check
        if($row['l_status'] == 0) {
            echo "<script>alert('Your account has been blocked! Contact support.'); window.location='login.php';</script>";
            exit;
        }

        // Session set karo
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
        echo "<script>alert('Wrong Password!'); window.location='login.php';</script>";
    }
} else {
    echo "<script>alert('Email not registered!'); window.location='login.php';</script>";
}
?>