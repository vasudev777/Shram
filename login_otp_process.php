<?php
include('db.php');
session_start();

$user_otp = $_POST['user_otp'] ?? '';

if ($user_otp == $_SESSION['login_otp']) {
  $email  = $_SESSION['login_email'] ?? '';
  
  $stmt = mysqli_prepare($conn, "SELECT * FROM cust_details WHERE cust_email = ?");
  mysqli_stmt_bind_param($stmt, "s", $email);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $row    = mysqli_fetch_array($result);

  $_SESSION['uemail']        = $row['cust_email'];
  $_SESSION['cust_id']       = $row['cust_id'];
  $_SESSION['cust_name']     = $row['cust_name'];
  $_SESSION['cust_number']   = $row['cust_number'];
  $_SESSION['cust_email']    = $row['cust_email'];
  $_SESSION['cust_state']    = $row['cust_state'];
  $_SESSION['cust_city']     = $row['cust_city'];
  $_SESSION['cust_address']  = $row['cust_address'];
  $_SESSION['cust_landmark'] = $row['cust_landmark'];
  $_SESSION['cust_password'] = $row['cust_password'];
  $_SESSION['cust_status']   = $row['cust_status'];

  unset($_SESSION['login_otp']);
  unset($_SESSION['login_number']);
  mysqli_stmt_close($stmt);

  header("location: index.php");
} else {
    echo "<script>alert('Invalid OTP!'); window.location='login.php';</script>";
}
?>