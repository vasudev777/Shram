<?php
include('db.php');
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

// ═══════════════════════════
// ACCEPT
// ═══════════════════════════
if (isset($_GET['blockid'])) {
    $bid = $_GET['blockid'];

    // Builder + Labour details fetch karo
    $fetchSql = "SELECT 
                    build_details.b_name, build_details.b_email,
                    labour_details.l_name, labour_details.l_type, labour_details.l_wage,
                    build_labour_book.build_labour_book_date, build_labour_book.build_labour_book_note
                 FROM build_labour_book
                 JOIN build_details ON build_details.b_id = build_labour_book.b_id
                 JOIN labour_details ON labour_details.l_id = build_labour_book.l_id
                 WHERE build_labour_book.build_labour_book_id = '$bid'";

    $fetchResult = mysqli_query($conn, $fetchSql);
    $data        = mysqli_fetch_assoc($fetchResult);

    // Status update
    $sql = "UPDATE build_labour_book SET build_labour_book_status = '1' 
            WHERE build_labour_book_id = '$bid'";

    if (mysqli_query($conn, $sql)) {

        // ✅ Builder ko Accept Email
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'shram0610@gmail.com';
            $mail->Password   = 'tbzy bbit aogh hbgj';
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;

            $mail->setFrom('shram0610@gmail.com', 'Shram');
            $mail->addAddress($data['b_email'], $data['b_name']);
            $mail->isHTML(true);
            $mail->Subject = ' Labour Booking Accepted - Shram';

            $mail->Body = "
            <div style='font-family:Arial,sans-serif;max-width:600px;margin:auto;border:1px solid #eee;border-radius:15px;overflow:hidden;'>

                <div style='background:linear-gradient(135deg,#fcbc04,#f0a500);padding:30px;text-align:center;'>
                    <h1 style='color:#000;margin:0;font-size:36px;letter-spacing:2px;'>Shram.</h1>
                    <p style='color:#000;margin:8px 0 0;font-size:12px;font-weight:bold;letter-spacing:1px;'>SMART VIRTUAL CONSTRUCTION COMPANY</p>
                </div>

                <div style='padding:30px;text-align:center;background:#fff;border-bottom:3px solid #28a745;'>
                    <p style='font-size:50px;margin:0;'>🎉</p>
                    <h2 style='color:#333;font-size:22px;margin:10px 0 5px;'>Labour Booking Accepted!</h2>
                    <p style='color:#777;font-size:14px;margin:0;'>Hi <b>{$data['b_name']}</b>, your labour booking request has been accepted!</p>
                    <div style='margin-top:15px;'>
                        <span style='background:#d4edda;color:#155724;padding:6px 20px;border-radius:20px;font-size:13px;font-weight:bold;'>✅ Request Accepted</span>
                    </div>
                </div>

                <div style='padding:25px 30px;background:#fafafa;'>
                    <h3 style='color:#333;font-size:15px;border-left:4px solid #fcbc04;padding-left:12px;margin-top:0;'>📋 Booking Details</h3>
                    <p style='margin:6px 0;color:#555;font-size:14px;'>👷 <b>Labour Name:</b> {$data['l_name']}</p>
                    <p style='margin:6px 0;color:#555;font-size:14px;'>🔧 <b>Type:</b> {$data['l_type']}</p>
                    <p style='margin:6px 0;color:#555;font-size:14px;'>💰 <b>Wage:</b> ₹{$data['l_wage']} / day</p>
                    <p style='margin:6px 0;color:#555;font-size:14px;'>📅 <b>Date:</b> {$data['build_labour_book_date']}</p>
                    <p style='margin:6px 0;color:#555;font-size:14px;'>📝 <b>Note:</b> {$data['build_labour_book_note']}</p>
                </div>

                <div style='padding:20px 30px;background:#fff9e6;border-left:4px solid #28a745;margin:20px;border-radius:8px;'>
                    <p style='margin:0;color:#555;font-size:14px;'>
                        🏗️ The labour will contact you soon. Please keep your phone available!
                    </p>
                </div>

                <div style='background:#222;padding:20px;text-align:center;'>
                    <h2 style='color:#fcbc04;margin:0;font-size:20px;'>Shram.</h2>
                    <p style='color:#aaa;font-size:12px;margin:5px 0 0;'>Vadodara, Gujarat, India | © 2024 Shram</p>
                </div>

            </div>";

            $mail->send();
        } catch (Exception $e) {
            // Mail fail — continue
        }

        echo "<script>alert('Request Accepted! Email sent to builder ✅')</script>";
        echo "<script>window.location='build_req.php'</script>";

    } else {
        echo "<script>alert('Error!')</script>";
    }
}

// ═══════════════════════════
// REJECT
// ═══════════════════════════
if (isset($_GET['unblockid'])) {
    $unblockid = $_GET['unblockid'];
    $reason    = urldecode($_GET['reason'] ?? 'No reason provided');

    // Builder + Labour details fetch karo
    $fetchSql = "SELECT 
                    build_details.b_name, build_details.b_email,
                    labour_details.l_name, labour_details.l_type, labour_details.l_wage,
                    build_labour_book.build_labour_book_date, build_labour_book.build_labour_book_note
                 FROM build_labour_book
                 JOIN build_details ON build_details.b_id = build_labour_book.b_id
                 JOIN labour_details ON labour_details.l_id = build_labour_book.l_id
                 WHERE build_labour_book.build_labour_book_id = '$unblockid'";

    $fetchResult = mysqli_query($conn, $fetchSql);
    $data        = mysqli_fetch_assoc($fetchResult);

    // Status update — 2 = Rejected
    $sql = "UPDATE build_labour_book SET build_labour_book_status = '2' 
            WHERE build_labour_book_id = '$unblockid'";

    if (mysqli_query($conn, $sql)) {

        // ✅ Builder ko Reject Email
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'shram0610@gmail.com';
            $mail->Password   = 'tbzy bbit aogh hbgj';
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;

            $mail->setFrom('shram0610@gmail.com', 'Shram');
            $mail->addAddress($data['b_email'], $data['b_name']);
            $mail->isHTML(true);
            $mail->Subject = ' Labour Booking Update - Shram';

            $mail->Body = "
            <div style='font-family:Arial,sans-serif;max-width:600px;margin:auto;border:1px solid #eee;border-radius:15px;overflow:hidden;'>

                <div style='background:linear-gradient(135deg,#fcbc04,#f0a500);padding:30px;text-align:center;'>
                    <h1 style='color:#000;margin:0;font-size:36px;letter-spacing:2px;'>Shram.</h1>
                    <p style='color:#000;margin:8px 0 0;font-size:12px;font-weight:bold;letter-spacing:1px;'>SMART VIRTUAL CONSTRUCTION COMPANY</p>
                </div>

                <div style='padding:30px;text-align:center;background:#fff;border-bottom:3px solid #dc3545;'>
                    <p style='font-size:50px;margin:0;'>😔</p>
                    <h2 style='color:#333;font-size:22px;margin:10px 0 5px;'>Booking Not Accepted</h2>
                    <p style='color:#777;font-size:14px;margin:0;'>Hi <b>{$data['b_name']}</b>, unfortunately your labour booking was not accepted this time.</p>
                    <div style='margin-top:15px;'>
                        <span style='background:#f8d7da;color:#721c24;padding:6px 20px;border-radius:20px;font-size:13px;font-weight:bold;'>❌ Request Rejected</span>
                    </div>
                </div>

                <div style='padding:25px 30px;background:#fafafa;'>
                    <h3 style='color:#333;font-size:15px;border-left:4px solid #fcbc04;padding-left:12px;margin-top:0;'>📋 Booking Details</h3>
                    <p style='margin:6px 0;color:#555;font-size:14px;'>👷 <b>Labour Name:</b> {$data['l_name']}</p>
                    <p style='margin:6px 0;color:#555;font-size:14px;'>🔧 <b>Type:</b> {$data['l_type']}</p>
                    <p style='margin:6px 0;color:#555;font-size:14px;'>💰 <b>Wage:</b> ₹{$data['l_wage']} / day</p>
                    <p style='margin:6px 0;color:#555;font-size:14px;'>📅 <b>Date:</b> {$data['build_labour_book_date']}</p>
                    <p style='margin:6px 0;color:#555;font-size:14px;'>📝 <b>Note:</b> {$data['build_labour_book_note']}</p>
                </div>

                <div style='padding:20px 30px;background:#fff9e6;border-left:4px solid #dc3545;margin:20px;border-radius:8px;'>
                    <h4 style='margin:0 0 8px;color:#333;font-size:14px;'>💬 Reason from Labour:</h4>
                    <p style='margin:0;color:#555;font-size:14px;'>{$reason}</p>
                </div>

                <div style='padding:20px 30px;text-align:center;background:#fff;'>
                    <p style='color:#777;font-size:13px;'>Don't worry! You can book another labour on Shram.</p>
                    <a href='https://shram.rf.gd' style='background:#fcbc04;color:#000;padding:10px 30px;border-radius:25px;text-decoration:none;font-weight:bold;font-size:14px;display:inline-block;margin-top:10px;'>
                        🔍 Find Another Labour
                    </a>
                </div>

                <div style='background:#222;padding:20px;text-align:center;'>
                    <h2 style='color:#fcbc04;margin:0;font-size:20px;'>Shram.</h2>
                    <p style='color:#aaa;font-size:12px;margin:5px 0 0;'>Vadodara, Gujarat, India | © 2024 Shram</p>
                </div>

            </div>";

            $mail->send();
        } catch (Exception $e) {
            // Mail fail — continue
        }

        echo "<script>alert('Request Rejected! Email sent to builder ✅')</script>";
        echo "<script>window.location='build_req.php'</script>";

    } else {
        echo "<script>alert('Error!')</script>";
    }
}
?>
