<?php
session_start();
require('db.php');

$payment_id = $_POST['razorpay_payment_id'] ?? '';
$custid = $_SESSION["l_id"];
$amount = $_SESSION["total"];
$paymode = "Razorpay";
$status = "Success";

if (!empty($payment_id)) {
    $query = "INSERT INTO `labour_item_history` (`payment_id`, `l_id`, `payment_amount`, `payment_mode`, `payment_status`) VALUES ('$payment_id', '$custid', '$amount', '$paymode', '$status')";
    
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Order placed successfully')</script>";
        echo "<script>window.location='index.php'</script>";
    } else {
        echo 'Error ' . mysqli_error($conn);
    }
} else {
    echo "Invalid access.";
}
?>