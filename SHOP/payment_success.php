<?php
    error_reporting(E_ALL);
ini_set('display_errors', 1);
include('../db.php');
session_start();

// PHPMailer
require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

// Dompdf
require_once 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Dompdf\Dompdf;
use Dompdf\Options;

$payment_id   = $_POST['razorpay_payment_id'] ?? '';
$payment_mode = $_POST['payment_method'] ?? 'Razorpay'; // ✅ pay.php se aayega
$cust_id      = $_SESSION['cust_id'];
$total        = $_SESSION['pay_total'];
$name         = $_SESSION['pay_name'];
$email        = $_SESSION['pay_email'];
$address      = $_SESSION['pay_address'];
$city         = $_SESSION['pay_city'];
$state        = $_SESSION['pay_state'];

// Email/PDF ke liye readable format
$date_display = date('d M Y');
$time_display = date('h:i A');

// DB ke liye MySQL format
$date_db = date('Y-m-d');
$time_db = date('H:i:s');

// ═══════════════════════════
// CART ITEMS FETCH
// ═══════════════════════════
$cartSql    = "SELECT * FROM cust_cart WHERE cust_id='$cust_id'";
$cartResult = mysqli_query($conn, $cartSql);
$cartItems  = [];
while ($item = mysqli_fetch_assoc($cartResult)) {
    $cartItems[] = $item;
}

// ═══════════════════════════
// HISTORY TABLE INSERT ✅
// ═══════════════════════════
$payment_status = "Completed";
foreach ($cartItems as $item) {
    $ins = "INSERT INTO cust_item_history 
            (cust_id, payment_id, item_id, payment_amount, payment_mode, payment_status, address, city, state, order_date, order_time)
            VALUES (
                '$cust_id',
                '$payment_id',
                '{$item['item_id']}',
                '$total',
                '$payment_mode',
                '$payment_status',
                '$address',
                '$city',
                '$state',
                '$date_db',
                '$time_db'
            )";
    mysqli_query($conn, $ins);
}

// ═══════════════════════════
// CART CLEAR
// ═══════════════════════════
mysqli_query($conn, "DELETE FROM cust_cart WHERE cust_id='$cust_id'");

// ═══════════════════════════
// PDF BILL GENERATE
// ═══════════════════════════
$itemsHtml = '';
$sr = 1;
foreach ($cartItems as $item) {
    $itemsHtml .= "
    <tr>
        <td style='padding:10px;border-bottom:1px solid #eee;text-align:center;'>{$sr}</td>
        <td style='padding:10px;border-bottom:1px solid #eee;'>{$item['cart_name']}</td>
        <td style='padding:10px;border-bottom:1px solid #eee;text-align:center;'>{$item['cart_type']}</td>
        <td style='padding:10px;border-bottom:1px solid #eee;text-align:right;'>₹{$item['cart_amount']}</td>
    </tr>";
    $sr++;
}

$subtotal = $total - 50;

$pdfHtml = "
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { font-family: Arial, sans-serif; color: #333; background: #fff; }
    
    .header { 
        background: #fcbc04; 
        padding: 25px 35px;
        display: table;
        width: 100%;
    }
    .header-left { display: table-cell; vertical-align: middle; }
    .header-right { display: table-cell; vertical-align: middle; text-align: right; }
    .header h1 { font-size: 38px; color: #000; letter-spacing: 3px; margin: 0; }
    .header p { font-size: 11px; color: #000; font-weight: bold; margin: 4px 0 0; }
    .header-right p { font-size: 12px; color: #000; margin: 2px 0; }

    .title-bar {
        background: #333;
        color: #fff;
        padding: 12px 35px;
        display: table;
        width: 100%;
    }
    .title-bar h2 { display: table-cell; font-size: 16px; vertical-align: middle; }
    .title-bar-right { display: table-cell; text-align: right; vertical-align: middle; font-size: 11px; }

    .info-section {
        background: #fafafa;
        padding: 20px 35px;
        display: table;
        width: 100%;
        border-bottom: 2px solid #fcbc04;
    }
    .info-left { display: table-cell; width: 50%; vertical-align: top; }
    .info-right { display: table-cell; width: 50%; vertical-align: top; text-align: right; }
    .info-label { font-size: 10px; color: #fcbc04; text-transform: uppercase; font-weight: bold; margin-bottom: 6px; }
    .info-text { font-size: 12px; color: #555; margin: 2px 0; }
    .info-text b { color: #333; }
    
    .paid-badge {
        background: #28a745;
        color: #fff;
        padding: 4px 14px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: bold;
        display: inline-block;
    }

    .section-title {
        font-size: 13px;
        color: #333;
        font-weight: bold;
        padding: 15px 35px 10px;
        border-left: 4px solid #fcbc04;
        margin: 0 35px;
        margin-top: 20px;
    }

    table.items {
        width: calc(100% - 70px);
        margin: 10px 35px;
        border-collapse: collapse;
    }
    table.items thead tr { background: #fcbc04; }
    table.items thead th { 
        padding: 10px 12px; 
        font-size: 12px; 
        text-align: left;
        color: #000;
    }
    table.items tbody tr:nth-child(even) { background: #f9f9f9; }
    table.items tbody td { 
        padding: 10px 12px; 
        font-size: 12px; 
        border-bottom: 1px solid #eee;
    }

    .total-box {
        background: #333;
        color: #fff;
        margin: 15px 35px;
        padding: 15px 20px;
        border-radius: 8px;
    }
    .total-row {
        display: table;
        width: 100%;
        padding: 4px 0;
    }
    .total-label { display: table-cell; font-size: 13px; }
    .total-value { display: table-cell; text-align: right; font-size: 13px; }
    .total-final .total-label,
    .total-final .total-value { 
        font-size: 16px; 
        font-weight: bold;
        color: #fcbc04;
        padding-top: 8px;
        border-top: 1px solid #555;
        margin-top: 6px;
    }

    .thankyou {
        background: #fff9e6;
        margin: 15px 35px;
        padding: 12px 20px;
        border-radius: 8px;
        border-left: 4px solid #fcbc04;
        font-size: 12px;
        color: #555;
    }

    .footer {
        background: #fcbc04;
        padding: 15px 35px;
        margin-top: 20px;
        display: table;
        width: 100%;
    }
    .footer-left { display: table-cell; vertical-align: middle; }
    .footer-right { display: table-cell; text-align: right; vertical-align: middle; }
    .footer h2 { font-size: 22px; color: #000; margin: 0; }
    .footer p { font-size: 11px; color: #000; margin: 2px 0; }
</style>
</head>
<body>

<!-- Header -->
<div class='header'>
    <div class='header-left'>
        <h1>Shram.</h1>
        <p>SMART VIRTUAL CONSTRUCTION COMPANY</p>
    </div>
    <div class='header-right'>
        <p><b>PURCHASE RECEIPT</b></p>
        <p>Date: $date_display</p>
        <p>Time: $time_display</p>
    </div>
</div>

<!-- Title Bar -->
<div class='title-bar'>
    <h2>ORDER CONFIRMATION</h2>
    <div class='title-bar-right'>
        Payment ID: $payment_id
    </div>
</div>

<!-- Info Section -->
<div class='info-section'>
    <div class='info-left'>
        <div class='info-label'>Bill To</div>
        <p class='info-text'><b>$name</b></p>
        <p class='info-text'>$email</p>
        <p class='info-text'>$address</p>
        <p class='info-text'>$city, $state</p>
    </div>
    <div class='info-right'>
        <div class='info-label'>Payment Status</div>
        <span class='paid-badge'>PAID</span>
        <br><br>
        <p class='info-text'>Mode: $payment_mode</p>
    </div>
</div>

<!-- Items -->
<div class='section-title'>Items Ordered</div>
<table class='items'>
    <thead>
        <tr>
            <th style='width:40px;text-align:center;'>Sr.</th>
            <th>Item Name</th>
            <th style='text-align:center;'>Category</th>
            <th style='text-align:right;'>Amount</th>
        </tr>
    </thead>
    <tbody>
        $itemsHtml
    </tbody>
</table>

<!-- Total -->
<div class='total-box'>
    <div class='total-row'>
        <span class='total-label'>Subtotal</span>
        <span class='total-value'>Rs. $subtotal</span>
    </div>
    <div class='total-row'>
        <span class='total-label'>Shipping Charges</span>
        <span class='total-value'>Rs. 50</span>
    </div>
    <div class='total-row total-final'>
        <span class='total-label'>Total Paid</span>
        <span class='total-value'>Rs. $total</span>
    </div>
</div>

<!-- Thank You -->
<div class='thankyou'>
    Thank you for shopping with Shram! Your order has been confirmed and will be delivered to your address soon.
</div>

<!-- Footer -->
<div class='footer'>
    <div class='footer-left'>
        <h2>Shram.</h2>
        <p>Smart Virtual Construction Company</p>
        <p>Vadodara, Gujarat, India</p>
    </div>
    <div class='footer-right'>
        <p>shram0610@gmail.com</p>
        <p>shram.free.nf</p>
        <p>© 2024 Shram. All rights reserved.</p>
    </div>
</div>

</body>
</html>";

// PDF Generate
$pdfOutput  = null; // ✅ initialize
try {
    $options = new Options();
    $options->set('isHtml5ParserEnabled', true);
    $options->set('isRemoteEnabled', true);

    $dompdf = new Dompdf($options);
    $dompdf->loadHtml($pdfHtml);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();

    $pdfOutput = $dompdf->output();
} catch (Exception $e) {
    // PDF fail — email bina PDF ke jaayega
}

// ═══════════════════════════
// EMAIL BHEJO
// ═══════════════════════════
$emailItems = '';
foreach ($cartItems as $item) {
    $emailItems .= "
    <tr>
        <td style='padding:10px;border-bottom:1px solid #eee;'>{$item['cart_name']}</td>
        <td style='padding:10px;border-bottom:1px solid #eee;text-align:center;color:#666;'>{$item['cart_type']}</td>
        <td style='padding:10px;border-bottom:1px solid #eee;text-align:right;font-weight:bold;'>₹{$item['cart_amount']}</td>
    </tr>";
}

$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'shram0610@gmail.com';
    $mail->Password   = 'kpzcibrgboyomwel';
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    $mail->setFrom('shram0610@gmail.com', 'Shram');
    $mail->addAddress($email, $name);
    $mail->isHTML(true);
    $mail->Subject = 'Order Confirmed - Shram Shop | Receipt Attached';

    // ✅ Memory se seedha attach karo — file save nahi karni
    if (!empty($pdfOutput)) {
        $mail->addStringAttachment($pdfOutput, 'Shram_Receipt.pdf', 'base64', 'application/pdf');
    }

    $mail->Body = "
    <div style='font-family:Arial,sans-serif;max-width:620px;margin:auto;border:1px solid #eee;border-radius:15px;overflow:hidden;box-shadow:0 4px 20px rgba(0,0,0,0.08);'>

        <!-- Header -->
        <div style='background:linear-gradient(135deg,#fcbc04,#f0a500);padding:35px;text-align:center;'>
            <h1 style='color:#000;margin:0;font-size:40px;letter-spacing:2px;'>Shram<span style='color:#fff;'>.</span></h1>
            <p style='color:#000;margin:8px 0 0;font-size:13px;font-weight:bold;letter-spacing:1px;'>SMART VIRTUAL CONSTRUCTION COMPANY</p>
        </div>

        <!-- Success -->
        <div style='padding:30px;text-align:center;border-bottom:3px solid #28a745;background:#fff;'>
            <p style='font-size:55px;margin:0;'>🎉</p>
            <h2 style='color:#333;font-size:24px;margin:10px 0 5px;'>Order Confirmed!</h2>
            <p style='color:#777;font-size:15px;margin:0;'>Hi <b>$name</b>, your payment was successful!</p>
            <div style='margin-top:15px;'>
                <span style='background:#d4edda;color:#155724;padding:6px 20px;border-radius:20px;font-size:13px;font-weight:bold;'>✅ Payment Successful</span>
            </div>
        </div>

        <!-- Payment Info -->
        <div style='padding:25px 30px;background:#fafafa;'>
            <h3 style='color:#333;font-size:16px;border-left:4px solid #fcbc04;padding-left:12px;margin-top:0;'>💳 Payment Details</h3>
            <p style='margin:6px 0;color:#555;font-size:14px;'>🔖 <b>Payment ID:</b> $payment_id</p>
            <p style='margin:6px 0;color:#555;font-size:14px;'>💳 <b>Payment Mode:</b> $payment_mode</p>
            <p style='margin:6px 0;color:#555;font-size:14px;'>📅 <b>Date:</b> $date_display | $time_display</p>
            <p style='margin:6px 0;color:#555;font-size:14px;'>📍 <b>Delivery:</b> $address, $city, $state</p>
        </div>

        <!-- Items -->
        <div style='padding:25px 30px;background:#fff;'>
            <h3 style='color:#333;font-size:16px;border-left:4px solid #fcbc04;padding-left:12px;margin-top:0;'>🛒 Items Ordered</h3>
            <table style='width:100%;border-collapse:collapse;'>
                <tr style='background:#f5f5f5;'>
                    <th style='padding:10px;text-align:left;font-size:13px;'>Item</th>
                    <th style='padding:10px;text-align:center;font-size:13px;'>Category</th>
                    <th style='padding:10px;text-align:right;font-size:13px;'>Price</th>
                </tr>
                $emailItems
                <tr style='background:#fff9e6;'>
                    <td style='padding:10px;font-size:13px;' colspan='2'>Shipping</td>
                    <td style='padding:10px;text-align:right;font-size:13px;'>₹50</td>
                </tr>
                <tr style='background:#fcbc04;'>
                    <td style='padding:12px;font-weight:bold;font-size:15px;' colspan='2'>Total Paid</td>
                    <td style='padding:12px;text-align:right;font-weight:bold;font-size:15px;'>₹$total</td>
                </tr>
            </table>
        </div>

        <!-- PDF Note -->
        <div style='padding:15px 30px;background:#fff9e6;border-left:4px solid #fcbc04;margin:0 20px 20px;border-radius:8px;'>
            <p style='margin:0;color:#555;font-size:14px;'>
                📎 Your <b>purchase receipt (PDF)</b> is attached to this email. Please save it for your records.
            </p>
        </div>

        <!-- CTA -->
        <div style='padding:25px 30px;background:#fff;text-align:center;'>
            <a href='https://shram.free.nf/SHOP/index.php' style='background:#fcbc04;color:#000;padding:13px 40px;border-radius:25px;text-decoration:none;font-weight:bold;font-size:15px;display:inline-block;'>
                🛒 Continue Shopping
            </a>
        </div>

        <!-- Footer -->
        <div style='background:#222;padding:22px;text-align:center;'>
            <h2 style='color:#fcbc04;margin:0;font-size:22px;'>Shram.</h2>
            <p style='color:#aaa;font-size:12px;margin:6px 0 0;'>Smart Virtual Construction Company</p>
            <p style='color:#aaa;font-size:12px;margin:4px 0 0;'>Vadodara, Gujarat, India | © 2024 Shram</p>
        </div>

    </div>";

    $mail->send();

} catch (Exception $e) {
    // Mail fail — order complete rahega
}

echo "<script>alert('Payment Successful! 🎉 Order Confirmed. Receipt sent to your email!'); window.location='index.php';</script>";
?>