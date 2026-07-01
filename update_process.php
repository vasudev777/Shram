<?php
include('db.php');
session_start();

$custid   = $_SESSION['cust_id'];
$name     = mysqli_real_escape_string($conn, $_POST['name']);
$state    = mysqli_real_escape_string($conn, $_POST['state']);
$city     = mysqli_real_escape_string($conn, $_POST['city']);
$address  = mysqli_real_escape_string($conn, $_POST['address']);
$landmark = mysqli_real_escape_string($conn, $_POST['landmark']);
$password = $_POST['password'];

if(!empty($password)) {
    $pass_encode = password_hash($password, PASSWORD_DEFAULT);
    $pass_update = ", cust_password='$pass_encode'";
} else {
    $pass_update = "";
}

$sql = "UPDATE cust_details SET 
        cust_name='$name',
        cust_state='$state',
        cust_city='$city',
        cust_address='$address',
        cust_landmark='$landmark'
        $pass_update
        WHERE cust_id='$custid'";

if(mysqli_query($conn, $sql)) {
    $_SESSION['cust_name']    = $name;
    $_SESSION['cust_city']    = $city;
    $_SESSION['cust_state']   = $state;
    $_SESSION['cust_address'] = $address;
    echo "<script>alert('Profile Updated Successfully!'); window.location='profile.php';</script>";
} else {
    echo "<script>alert('Update Failed! Try again.'); window.location='profile.php';</script>";
}
?>