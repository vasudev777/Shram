


<?php
include('db.php');
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// ═══════════════════════════════
// EMAIL FUNCTION — Reusable
// ═══════════════════════════════
function sendBookingEmail($to, $toName, $subject, $bodyContent) {
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
        $mail->addAddress($to, $toName);
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $bodyContent;
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

// ═══════════════════════════════
// EMAIL TEMPLATE FUNCTION
// ═══════════════════════════════
function bookingEmailTemplate($type, $bookingDetails, $recipientName, $status = 'Pending') {

    // Type based config
    if ($type == 'builder') {
        $icon      = '🏢';
        $typeLabel = 'Builder Appointment';
        $color     = '#4db4c0';
        $detailRows = "
            <tr><td style='padding:8px 0;color:#555;'><b>👷 Builder Name:</b></td><td style='padding:8px 0;color:#333;'>{$bookingDetails['name']}</td></tr>
            <tr><td style='padding:8px 0;color:#555;'><b>📧 Builder Email:</b></td><td style='padding:8px 0;color:#333;'>{$bookingDetails['email']}</td></tr>
            <tr><td style='padding:8px 0;color:#555;'><b>📱 Builder Number:</b></td><td style='padding:8px 0;color:#333;'>{$bookingDetails['number']}</td></tr>
            <tr><td style='padding:8px 0;color:#555;'><b>📅 Date:</b></td><td style='padding:8px 0;color:#333;'>{$bookingDetails['date']}</td></tr>
            <tr><td style='padding:8px 0;color:#555;'><b>📝 Note:</b></td><td style='padding:8px 0;color:#333;'>{$bookingDetails['note']}</td></tr>
            <tr><td style='padding:8px 0;color:#555;'><b>⭐ Experience:</b></td><td style='padding:8px 0;color:#333;'>{$bookingDetails['experience']} years</td></tr>
            <tr><td style='padding:8px 0;color:#555;'><b>📍 City:</b></td><td style='padding:8px 0;color:#333;'>{$bookingDetails['city']}</td></tr>
        ";
    } elseif ($type == 'labour') {
        $icon      = '👷';
        $typeLabel = 'Labour Booking';
        $color     = '#fcbc04';
        $detailRows = "
            <tr><td style='padding:8px 0;color:#555;'><b>👤 Labour Name:</b></td><td style='padding:8px 0;color:#333;'>{$bookingDetails['name']}</td></tr>
            <tr><td style='padding:8px 0;color:#555;'><b>🔧 Labour Type:</b></td><td style='padding:8px 0;color:#333;'>{$bookingDetails['type']}</td></tr>
            <tr><td style='padding:8px 0;color:#555;'><b>📱 Labour Number:</b></td><td style='padding:8px 0;color:#333;'>{$bookingDetails['number']}</td></tr>
            <tr><td style='padding:8px 0;color:#555;'><b>📅 Date:</b></td><td style='padding:8px 0;color:#333;'>{$bookingDetails['date']}</td></tr>
            <tr><td style='padding:8px 0;color:#555;'><b>💰 Wage:</b></td><td style='padding:8px 0;color:#333;'>₹{$bookingDetails['wage']}/day</td></tr>
            <tr><td style='padding:8px 0;color:#555;'><b>📝 Note:</b></td><td style='padding:8px 0;color:#333;'>{$bookingDetails['note']}</td></tr>
            <tr><td style='padding:8px 0;color:#555;'><b>📍 City:</b></td><td style='padding:8px 0;color:#333;'>{$bookingDetails['city']}</td></tr>
        ";
    } elseif ($type == 'shop') {
        $icon      = '🛒';
        $typeLabel = 'Shop Order';
        $color     = '#28a745';
        $detailRows = "
            <tr><td style='padding:8px 0;color:#555;'><b>📦 Item Name:</b></td><td style='padding:8px 0;color:#333;'>{$bookingDetails['name']}</td></tr>
            <tr><td style='padding:8px 0;color:#555;'><b>🔢 Quantity:</b></td><td style='padding:8px 0;color:#333;'>{$bookingDetails['quantity']}</td></tr>
            <tr><td style='padding:8px 0;color:#555;'><b>💰 Price:</b></td><td style='padding:8px 0;color:#333;'>₹{$bookingDetails['price']}</td></tr>
            <tr><td style='padding:8px 0;color:#555;'><b>📅 Order Date:</b></td><td style='padding:8px 0;color:#333;'>{$bookingDetails['date']}</td></tr>
            <tr><td style='padding:8px 0;color:#555;'><b>📍 Delivery Address:</b></td><td style='padding:8px 0;color:#333;'>{$bookingDetails['address']}</td></tr>
        ";
    }

    // Status badge
    if ($status == 'Pending') {
        $statusBadge = "<span style='background:#fff3cd;color:#856404;padding:5px 15px;border-radius:20px;font-size:13px;font-weight:bold;'>⏳ Pending</span>";
    } elseif ($status == 'Accepted') {
        $statusBadge = "<span style='background:#d4edda;color:#155724;padding:5px 15px;border-radius:20px;font-size:13px;font-weight:bold;'>✅ Accepted</span>";
    } else {
        $statusBadge = "<span style='background:#f8d7da;color:#721c24;padding:5px 15px;border-radius:20px;font-size:13px;font-weight:bold;'>❌ Rejected</span>";
    }

    return "
    <div style='font-family:Arial,sans-serif;max-width:620px;margin:auto;border:1px solid #eee;border-radius:15px;overflow:hidden;box-shadow:0 4px 20px rgba(0,0,0,0.08);'>

        <!-- Header -->
        <div style='background:linear-gradient(135deg,#fcbc04,#f0a500);padding:35px;text-align:center;'>
            <h1 style='color:#000;margin:0;font-size:40px;letter-spacing:2px;'>Shram<span style='color:#fff;'>.</span></h1>
            <p style='color:#000;margin:8px 0 0;font-size:13px;font-weight:bold;letter-spacing:1px;'>SMART VIRTUAL CONSTRUCTION COMPANY</p>
        </div>

        <!-- Title -->
        <div style='background:#fff;padding:30px;text-align:center;border-bottom:3px solid $color;'>
            <p style='font-size:40px;margin:0;'>$icon</p>
            <h2 style='color:#333;font-size:22px;margin:10px 0 5px;'>$typeLabel Confirmation</h2>
            <p style='color:#777;font-size:14px;margin:0;'>Hi <b>$recipientName</b>, your booking has been received!</p>
            <div style='margin-top:15px;'>$statusBadge</div>
        </div>

        <!-- Booking Details -->
        <div style='padding:30px;background:#fafafa;'>
            <h3 style='color:#333;font-size:16px;border-left:4px solid $color;padding-left:12px;margin-top:0;'>📋 Booking Details</h3>
            <table style='width:100%;border-collapse:collapse;'>
                $detailRows
            </table>
        </div>

        <!-- Info Box -->
        <div style='padding:20px 30px;background:#fff9e6;border-left:4px solid #fcbc04;margin:0 20px 20px;border-radius:8px;'>
            <p style='margin:0;color:#555;font-size:14px;line-height:1.7;'>
                ℹ️ Your booking status is currently <b>Pending</b>. You will receive an email once it is <b>Accepted</b> or <b>Rejected</b>. 
                You can also track your booking status on the <a href='https://shram.free.nf/cust_history.php' style='color:#fcbc04;font-weight:bold;'>History Page</a>.
            </p>
        </div>

        <!-- CTA -->
        <div style='padding:25px 30px;background:#fff;text-align:center;'>
            <a href='https://shram.free.nf' style='background:#fcbc04;color:#000;padding:13px 40px;border-radius:25px;text-decoration:none;font-weight:bold;font-size:15px;display:inline-block;'>
                🏠 Go to Shram
            </a>
        </div>

        <!-- Footer -->
        <div style='background:#222;padding:22px;text-align:center;'>
            <h2 style='color:#fcbc04;margin:0;font-size:22px;'>Shram.</h2>
            <p style='color:#aaa;font-size:12px;margin:6px 0 0;'>Smart Virtual Construction Company</p>
            <p style='color:#aaa;font-size:12px;margin:4px 0 0;'>Vadodara, Gujarat, India | © 2024 Shram</p>
        </div>

    </div>";
}

// ═══════════════════════════════
// MAIN BOOKING PROCESS
// ═══════════════════════════════
if (isset($_POST['submit'])) {
    $date = $_POST['date'];
    $lid  = $_POST['lid'];
    $cid  = $_POST['cid'];
    $note = $_POST['note'];

    // DB Insert
    $sql = "INSERT INTO labour_cust_book(cust_id,l_id,lc_date,lc_note,lc_status)values ('$cid','$lid','$date','$note','0')";

    if (mysqli_query($conn, $sql)) {

        // labour Details
        $labourResult = mysqli_query($conn, "SELECT * FROM labour_details WHERE l_id='$lid'");
        $labour       = mysqli_fetch_assoc($labourResult);

        // Customer Details
        $custResult = mysqli_query($conn, "SELECT * FROM cust_details WHERE cust_id='$cid'");
        $cust       = mysqli_fetch_assoc($custResult);

        // Booking Details Array
       $bookingDetails = [
    'name'   => $labour['l_name'],
    'type'   => $labour['l_type'],
    'number' => $labour['l_number'],
    'wage'   => $labour['l_wage'],
    'city'   => $labour['l_city'],
    'date'   => $date,
    'note'   => $note,
];
$body = bookingEmailTemplate('labour', $bookingDetails, $cust['cust_name'], 'Pending');
        
        $customerBody = bookingEmailTemplate('labour', $bookingDetails, $cust['cust_name'], 'Pending');
        sendBookingEmail($cust['cust_email'], $cust['cust_name'], ' Labour Appointment Confirmed - Shram', $customerBody);

        echo "<script>alert('Appointment Booked! Confirmation email sent.'); window.location='labour_history.php';</script>";

    } else {
        echo "<script>alert('Appointment Not Booked!'); window.location='labour.php';</script>";
    }
}
?>