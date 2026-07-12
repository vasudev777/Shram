<?php
include('../db.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

$token = $_GET['token'] ?? '';

if(empty($token)) {
    echo "<script>alert('Invalid link!'); window.location='login.php';</script>";
    exit;
}

// Token se builder dhundho
$sql    = "SELECT * FROM build_details WHERE b_token='$token' AND b_emailverify='0'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);

    // Email verify karo
    mysqli_query($conn, "UPDATE build_details SET b_emailverify='1' WHERE b_token='$token'");

    $name  = $row['b_name'];
    $email = $row['b_email'];

    // ═══════════════════════════
    // ADMIN APPROVAL PENDING MAIL
    // ═══════════════════════════
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
        $mail->Subject = 'Email Verified - Pending Admin Approval | Shram';
        $mail->Body    = "
        <div style='font-family:Arial,sans-serif;max-width:620px;margin:auto;border:1px solid #eee;border-radius:15px;overflow:hidden;'>
            <div style='background:linear-gradient(135deg,#fcbc04,#f0a500);padding:35px;text-align:center;'>
                <h1 style='color:#000;margin:0;font-size:40px;letter-spacing:2px;'>Shram<span style='color:#fff;'>.</span></h1>
                <p style='color:#000;margin:8px 0 0;font-size:13px;font-weight:bold;'>Builder Portal</p>
            </div>
            <div style='padding:35px 30px;text-align:center;'>
                <p style='font-size:45px;margin:0;'>✅</p>
                <h2 style='color:#333;margin:15px 0 5px;'>Email Verified!</h2>
                <p style='color:#666;font-size:15px;'>Hi <b>$name</b>, your email has been successfully verified!</p>
            </div>

            <!-- Status Steps -->
            <div style='padding:25px 30px;background:#fafafa;'>
                <h3 style='color:#333;font-size:16px;border-left:4px solid #fcbc04;padding-left:12px;margin-top:0;'>Registration Status</h3>
                <div style='display:flex;align-items:center;gap:12px;margin:12px 0;'>
                    <span style='background:#d4edda;color:#155724;padding:5px 12px;border-radius:20px;font-size:12px;font-weight:bold;'>✅ Registered</span>
                    <span style='color:#555;font-size:13px;'>Account created successfully</span>
                </div>
                <div style='display:flex;align-items:center;gap:12px;margin:12px 0;'>
                    <span style='background:#d4edda;color:#155724;padding:5px 12px;border-radius:20px;font-size:12px;font-weight:bold;'>✅ Email Verified</span>
                    <span style='color:#555;font-size:13px;'>Email verified successfully</span>
                </div>
                <div style='display:flex;align-items:center;gap:12px;margin:12px 0;'>
                    <span style='background:#fff3cd;color:#856404;padding:5px 12px;border-radius:20px;font-size:12px;font-weight:bold;'>⏳ Admin Approval</span>
                    <span style='color:#555;font-size:13px;'>Waiting for admin approval</span>
                </div>
            </div>

            <div style='padding:20px 30px;background:#fff9e6;border-left:4px solid #fcbc04;margin:0 20px 20px;border-radius:8px;'>
                <p style='margin:0;color:#555;font-size:14px;line-height:1.7;'>
                    Your account is currently under review by our admin team. You will receive an email once your account is <b>approved</b>. This usually takes <b>24-48 hours</b>.
                </p>
            </div>

            <div style='padding:25px 30px;background:#fff;text-align:center;'>
                <a href='https://shram.free.nf/Builder/login.php' style='background:#fcbc04;color:#000;padding:13px 40px;border-radius:25px;text-decoration:none;font-weight:bold;font-size:15px;display:inline-block;'>
                    Go to Login
                </a>
            </div>

            <div style='background:#222;padding:22px;text-align:center;'>
                <h2 style='color:#fcbc04;margin:0;font-size:20px;'>Shram.</h2>
                <p style='color:#aaa;font-size:12px;margin:6px 0 0;'>Vadodara, Gujarat, India</p>
            </div>
        </div>";

        $mail->send();
    } catch (Exception $e) {
        // Mail fail — verify complete rahega
    }

    // Success page dikhao
    ?>
    <!DOCTYPE html>
    <html>
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Email Verified - Shram</title>
      <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link href="assets/css/style.css" rel="stylesheet">
    </head>
    <body>
    <main>
      <div class="container">
        <section class="section min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
          <div class="col-lg-5 col-md-7">
            <div class="card text-center p-4">
              <div style="font-size:60px;">✅</div>
              <h3 style="color:#333;margin:15px 0 5px;">Email Verified!</h3>
              <p style="color:#666;font-size:14px;">Your email has been verified successfully. Your account is now pending admin approval. You will receive an email once approved.</p>
              <div style="margin:20px 0;">
                <span style="background:#d4edda;color:#155724;padding:6px 15px;border-radius:20px;font-size:12px;font-weight:bold;display:inline-block;margin:5px;">✅ Registered</span>
                <span style="background:#d4edda;color:#155724;padding:6px 15px;border-radius:20px;font-size:12px;font-weight:bold;display:inline-block;margin:5px;">✅ Email Verified</span>
                <span style="background:#fff3cd;color:#856404;padding:6px 15px;border-radius:20px;font-size:12px;font-weight:bold;display:inline-block;margin:5px;">⏳ Admin Approval Pending</span>
              </div>
              <a href="login.php" style="background:#fcbc04;color:#000;padding:12px 35px;border-radius:25px;text-decoration:none;font-weight:bold;display:inline-block;margin-top:10px;">
                Go to Login
              </a>
            </div>
          </div>
        </section>
      </div>
    </main>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
    <?php

} else {
    // Already verified ya invalid token
    ?>
    <!DOCTYPE html>
    <html>
    <head>
      <meta charset="utf-8">
      <title>Shram</title>
      <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link href="assets/css/style.css" rel="stylesheet">
    </head>
    <body>
    <main>
      <div class="container">
        <section class="section min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
          <div class="col-lg-5 col-md-7">
            <div class="card text-center p-4">
              <div style="font-size:60px;">❌</div>
              <h3 style="color:#333;margin:15px 0 5px;">Invalid or Expired Link</h3>
              <p style="color:#666;font-size:14px;">This verification link is invalid or already used.</p>
              <a href="login.php" style="background:#fcbc04;color:#000;padding:12px 35px;border-radius:25px;text-decoration:none;font-weight:bold;display:inline-block;margin-top:10px;">
                Go to Login
              </a>
            </div>
          </div>
        </section>
      </div>
    </main>
    </body>
    </html>
    <?php
}
?>