<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['a_id'])) {
    header("location: login.php");
    exit;
}

include('db.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

if(isset($_GET['approve'])) {
    $id     = $_GET['approve'];
    $action = 'approve';
} elseif(isset($_GET['reject'])) {
    $id     = $_GET['reject'];
    $action = 'reject';
} else {
    header("location: labour_details.php");
    exit;
}

$result = mysqli_query($conn, "SELECT * FROM labour_details WHERE l_id='$id'");
$row    = mysqli_fetch_assoc($result);
$name   = $row['l_name'];
$email  = $row['l_email'];
$city   = $row['l_city'];
$state  = $row['l_state'];
$type   = $row['l_type'];
$exp    = $row['l_exp'];
$wage   = $row['l_wage'];

if($action == 'approve') {

    mysqli_query($conn, "UPDATE labour_details SET l_approval='1' WHERE l_id='$id'");

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
        $mail->Subject = ' Account Approved - Welcome to Shram Labour Portal!';
        $mail->Body    = "
        <div style='font-family:Arial,sans-serif;max-width:620px;margin:auto;border:1px solid #eee;border-radius:15px;overflow:hidden;box-shadow:0 4px 20px rgba(0,0,0,0.08);'>

            <!-- Header -->
            <div style='background:linear-gradient(135deg,#fcbc04,#f0a500);padding:35px;text-align:center;'>
                <h1 style='color:#000;margin:0;font-size:40px;letter-spacing:2px;'>Shram<span style='color:#fff;'>.</span></h1>
                <p style='color:#000;margin:8px 0 0;font-size:13px;font-weight:bold;'>SMART VIRTUAL CONSTRUCTION COMPANY</p>
            </div>

            <!-- Welcome -->
            <div style='padding:35px 30px;text-align:center;border-bottom:3px solid #fcbc04;'>
                <p style='font-size:50px;margin:0;'>🎉</p>
                <h2 style='color:#333;font-size:24px;margin:15px 0 5px;'>Congratulations, $name!</h2>
                <p style='color:#777;font-size:15px;margin:0;'>Your Labour account has been <b style='color:#28a745;'>Approved!</b></p>
                <div style='margin-top:15px;'>
                    <span style='background:#d4edda;color:#155724;padding:6px 20px;border-radius:20px;font-size:13px;font-weight:bold;'>✅ Account Approved</span>
                </div>
            </div>

            <!-- Account Details -->
            <div style='padding:25px 30px;background:#fafafa;'>
                <h3 style='color:#333;font-size:16px;border-left:4px solid #fcbc04;padding-left:12px;margin-top:0;'>Your Account Details</h3>
                <p style='margin:6px 0;color:#555;font-size:14px;'>👤 <b>Name:</b> $name</p>
                <p style='margin:6px 0;color:#555;font-size:14px;'>📧 <b>Email:</b> $email</p>
                <p style='margin:6px 0;color:#555;font-size:14px;'>🔧 <b>Type:</b> $type</p>
                <p style='margin:6px 0;color:#555;font-size:14px;'>⭐ <b>Experience:</b> $exp Years</p>
                <p style='margin:6px 0;color:#555;font-size:14px;'>💰 <b>Wage:</b> Rs.$wage/day</p>
                <p style='margin:6px 0;color:#555;font-size:14px;'>📍 <b>Location:</b> $city, $state</p>
            </div>

            <!-- What You Can Do -->
            <div style='padding:25px 30px;background:#fff;'>
                <h3 style='color:#333;font-size:16px;border-left:4px solid #fcbc04;padding-left:12px;margin-top:0;'>What You Can Do on Shram</h3>
                <table style='width:100%;border-collapse:collapse;'>
                    <tr>
                        <td style='padding:12px;background:#fff9e6;border-radius:10px;width:48%;vertical-align:top;'>
                            <p style='font-size:24px;margin:0;'>🏠</p>
                            <p style='font-weight:bold;color:#333;margin:6px 0 4px;'>Serve Customers</p>
                            <p style='color:#666;font-size:12px;margin:0;'>Get booked by customers for your skilled services directly from the platform</p>
                        </td>
                        <td style='width:4%;'></td>
                        <td style='padding:12px;background:#fff9e6;border-radius:10px;width:48%;vertical-align:top;'>
                            <p style='font-size:24px;margin:0;'>🏗️</p>
                            <p style='font-weight:bold;color:#333;margin:6px 0 4px;'>Work with Builders</p>
                            <p style='color:#666;font-size:12px;margin:0;'>Get hired by professional builders for large construction projects</p>
                        </td>
                    </tr>
                    <tr><td colspan='3' style='height:12px;'></td></tr>
                    <tr>
                        <td style='padding:12px;background:#fff9e6;border-radius:10px;width:48%;vertical-align:top;'>
                            <p style='font-size:24px;margin:0;'>🛒</p>
                            <p style='font-weight:bold;color:#333;margin:6px 0 4px;'>Shop on Shram</p>
                            <p style='color:#666;font-size:12px;margin:0;'>Purchase tools and construction materials from Shram's virtual shop</p>
                        </td>
                        <td style='width:4%;'></td>
                        <td style='padding:12px;background:#fff9e6;border-radius:10px;width:48%;vertical-align:top;'>
                            <p style='font-size:24px;margin:0;'>📊</p>
                            <p style='font-weight:bold;color:#333;margin:6px 0 4px;'>Your Dashboard</p>
                            <p style='color:#666;font-size:12px;margin:0;'>Monitor all your bookings, requests and history from your personal dashboard</p>
                        </td>
                    </tr>
                </table>
            </div>

            <!-- CTA -->
            <div style='padding:25px 30px;text-align:center;background:#fff;'>
                <p style='color:#555;font-size:14px;margin-bottom:15px;'>Ready to start your journey with Shram?</p>
                <a href='https://shram.free.nf/Labour/login.php' style='background:#fcbc04;color:#000;padding:14px 40px;border-radius:25px;text-decoration:none;font-weight:bold;font-size:15px;display:inline-block;'>
                    Login to Labour Portal
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
        // Mail fail
    }

    echo "<script>alert('Labour Approved! Email sent.'); window.location='labour_details.php';</script>";

} else {

    // Reject — Mail bhejo phir delete karo
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
        $mail->Subject = 'Application Update - Shram Labour Portal';
        $mail->Body    = "
        <div style='font-family:Arial,sans-serif;max-width:620px;margin:auto;border:1px solid #eee;border-radius:15px;overflow:hidden;'>
            <div style='background:linear-gradient(135deg,#fcbc04,#f0a500);padding:35px;text-align:center;'>
                <h1 style='color:#000;margin:0;font-size:40px;'>Shram<span style='color:#fff;'>.</span></h1>
                <p style='color:#000;margin:8px 0 0;font-size:13px;font-weight:bold;'>Labour Portal</p>
            </div>
            <div style='padding:35px 30px;text-align:center;'>
                <p style='font-size:45px;margin:0;'>❌</p>
                <h2 style='color:#333;margin:15px 0 5px;'>Application Not Approved</h2>
                <p style='color:#666;font-size:15px;'>Hi <b>$name</b>, unfortunately your labour application has not been approved at this time.</p>
                <p style='color:#888;font-size:13px;margin-top:15px;'>If you believe this is an error, please contact us at shram0610@gmail.com</p>
            </div>
            <div style='background:#222;padding:22px;text-align:center;'>
                <h2 style='color:#fcbc04;margin:0;font-size:20px;'>Shram.</h2>
                <p style='color:#aaa;font-size:12px;margin:6px 0 0;'>Vadodara, Gujarat, India</p>
            </div>
        </div>";

        $mail->send();
    } catch (Exception $e) {
        // Mail fail
    }

    // DB se delete karo
    mysqli_query($conn, "DELETE FROM labour_details WHERE l_id='$id'");

    echo "<script>alert('Labour Rejected & Removed! Email sent.'); window.location='labour_details.php';</script>";
}
?>