<?php
include('db.php');
session_start();

$number   = $_POST['number'] ?? '';
$password = $_POST['password'] ?? '';

$stmt = mysqli_prepare($conn, "SELECT * FROM cust_details WHERE cust_number = ?");
mysqli_stmt_bind_param($stmt, "s", $number);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    
    if (password_verify($password, $row['cust_password'])) {
        if ($row['cust_status'] == 0) {
            echo "<script>alert('You Are Blocked! Please Contact Our Helpline.'); window.location='login.php';</script>";
        } else {
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
        }
    } else {
        echo "<script>alert('Wrong Password!'); window.location='login.php';</script>";
    }
} else {
    echo "<script>alert('Number not registered!'); window.location='login.php';</script>";
}
mysqli_stmt_close($stmt);
?>