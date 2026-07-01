<?php
include('db.php');
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

if (isset($_POST['submit'])) {
    $date = $_POST['date'];
    $bid  = $_POST['bid'];
    $lid  = $_POST['lid'];
    $note = $_POST['note'];

    // DB insert
    $sql = "INSERT INTO build_labour_book 
            (b_id, l_id, build_labour_book_date, build_labour_book_note, build_labour_book_status) 
            VALUES ('$bid', '$lid', '$date', '$note', '0')";

    if (mysqli_query($conn, $sql)) {

        // ═══════════════════════════
        // Builder + Labour details fetch
        // ═══════════════════════════
        $fetchSql = "SELECT 
                        build_details.b_name, build_details.b_email,
                        labour_details.l_name, labour_details.l_type, 
                        labour_details.l_wage, labour_details.l_education,
                        labour_details.l_email
                     FROM build_details, labour_details
                     WHERE build_details.b_id = '$bid' 
                     AND labour_details.l_id = '$lid'";

        $fetchResult = mysqli_query($conn, $fetchSql);
        $data        = mysqli_fetch_assoc($fetchResult);

        // ═══════════════════════════
        // BUILDER KO MAIL
        // ═══════════════════════════
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
            $mail->Subject = ' Labour Booking Confirmed - Shram';

            $mail->Body = "
            <div style='font-family:Arial,sans-serif;max-width:600px;margin:auto;border:1px solid #eee;border-radius:15px;overflow:hidden;'>

                <div style='background:linear-gradient(135deg,#fcbc04,#f0a500);padding:30px;text-align:center;'>
                    <h1 style='color:#000;margin:0;font-size:36px;letter-spacing:2px;'>Shram.</h1>
                    <p style='color:#000;margin:8px 0 0;font-size:12px;font-weight:bold;letter-spacing:1px;'>SMART VIRTUAL CONSTRUCTION COMPANY</p>
                </div>

                <div style='padding:30px;text-align:center;background:#fff;border-bottom:3px solid #fcbc04;'>
                    <p style='font-size:50px;margin:0;'>📋</p>
                    <h2 style='color:#333;font-size:22px;margin:10px 0 5px;'>Labour Booking Request Sent!</h2>
                    <p style='color:#777;font-size:14px;margin:0;'>Hi <b>{$data['b_name']}</b>, your labour booking request has been submitted!</p>
                    <div style='margin-top:15px;'>
                        <span style='background:#fff3cd;color:#856404;padding:6px 20px;border-radius:20px;font-size:13px;font-weight:bold;'>⏳ Pending Confirmation</span>
                    </div>
                </div>

                <div style='padding:25px 30px;background:#fafafa;'>
                    <h3 style='color:#333;font-size:15px;border-left:4px solid #fcbc04;padding-left:12px;margin-top:0;'>📋 Booking Details</h3>
                    <p style='margin:6px 0;color:#555;font-size:14px;'>👷 <b>Labour Name:</b> {$data['l_name']}</p>
                    <p style='margin:6px 0;color:#555;font-size:14px;'>🔧 <b>Type:</b> {$data['l_type']}</p>
                    <p style='margin:6px 0;color:#555;font-size:14px;'>💰 <b>Wage:</b> ₹{$data['l_wage']} / day</p>
                    <p style='margin:6px 0;color:#555;font-size:14px;'>📅 <b>Date:</b> $date</p>
                    <p style='margin:6px 0;color:#555;font-size:14px;'>📝 <b>Note:</b> $note</p>
                </div>

                <div style='padding:20px 30px;background:#fff9e6;border-left:4px solid #fcbc04;margin:20px;border-radius:8px;'>
                    <p style='margin:0;color:#555;font-size:14px;'>
                        ✅ You will be notified once the labour confirms your booking!
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

        // ═══════════════════════════
        // LABOUR KO MAIL — sirf literate ho toh
        // ═══════════════════════════
        if ($data['l_education'] == 'literate' && !empty($data['l_email'])) {

            $mail2 = new PHPMailer(true);
            try {
                $mail2->isSMTP();
                $mail2->Host       = 'smtp.gmail.com';
                $mail2->SMTPAuth   = true;
                $mail2->Username   = 'shram0610@gmail.com';
                $mail2->Password   = 'tbzy bbit aogh hbgj';
                $mail2->SMTPSecure = 'tls';
                $mail2->Port       = 587;

                $mail2->setFrom('shram0610@gmail.com', 'Shram');
                $mail2->addAddress($data['l_email'], $data['l_name']);
                $mail2->isHTML(true);
                $mail2->Subject = ' New Booking Request - Shram';

                $mail2->Body = "
                <div style='font-family:Arial,sans-serif;max-width:600px;margin:auto;border:1px solid #eee;border-radius:15px;overflow:hidden;'>

                    <div style='background:linear-gradient(135deg,#fcbc04,#f0a500);padding:30px;text-align:center;'>
                        <h1 style='color:#000;margin:0;font-size:36px;letter-spacing:2px;'>Shram.</h1>
                        <p style='color:#000;margin:8px 0 0;font-size:12px;font-weight:bold;letter-spacing:1px;'>SMART VIRTUAL CONSTRUCTION COMPANY</p>
                    </div>

                    <div style='padding:30px;text-align:center;background:#fff;border-bottom:3px solid #fcbc04;'>
                        <p style='font-size:50px;margin:0;'></p>
                        <h2 style='color:#333;font-size:22px;margin:10px 0 5px;'>New Booking Request!</h2>
                        <p style='color:#777;font-size:14px;margin:0;'>Hi <b>{$data['l_name']}</b>, you have a new booking request from a builder!</p>
                        <div style='margin-top:15px;'>
                            <span style='background:#fff3cd;color:#856404;padding:6px 20px;border-radius:20px;font-size:13px;font-weight:bold;'>⏳ Action Required</span>
                        </div>
                    </div>

                    <div style='padding:25px 30px;background:#fafafa;'>
                        <h3 style='color:#333;font-size:15px;border-left:4px solid #fcbc04;padding-left:12px;margin-top:0;'>📋 Booking Details</h3>
                        <p style='margin:6px 0;color:#555;font-size:14px;'> <b>Builder Name:</b> {$data['b_name']}</p>
                        <p style='margin:6px 0;color:#555;font-size:14px;'> <b>Date:</b> $date</p>
                        <p style='margin:6px 0;color:#555;font-size:14px;'> <b>Note:</b> $note</p>
                    </div>

                    <div style='padding:20px 30px;background:#fff9e6;border-left:4px solid #fcbc04;margin:20px;border-radius:8px;'>
                        <p style='margin:0;color:#555;font-size:14px;'>
                             Please login to your Shram account to Accept or Reject this request!
                        </p>
                    </div>

                    <div style='background:#222;padding:20px;text-align:center;'>
                        <h2 style='color:#fcbc04;margin:0;font-size:20px;'>Shram.</h2>
                        <p style='color:#aaa;font-size:12px;margin:5px 0 0;'>Vadodara, Gujarat, India | © 2024 Shram</p>
                    </div>

                </div>";

                $mail2->send();
            } catch (Exception $e) {
                // Mail fail — continue
            }
        }

        echo "<script>alert('Appointment Booked! Confirmation email sent ✅')</script>";
        echo "<script>window.location='labour_req.php'</script>";

    } else {
        echo "<script>alert('Appointment Not Booked')</script>";
        header("location:labour_req.php");
    }
}
?>