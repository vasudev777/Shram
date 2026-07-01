<?php
include('db.php');
session_start();

$email = $_POST['email'];
$sql   = "SELECT * FROM cust_details WHERE cust_email='$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);

    if ($row['cust_status'] == 0) {
        echo "<script>alert('You Are Blocked! Please Contact Our Helpline.'); window.location='login.php';</script>";
        exit;
    }

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

    header("location: index.php");
} else {
    echo "<script>alert('No account found with this Google email! Please register first.'); window.location='reg.php';</script>";
}
?>