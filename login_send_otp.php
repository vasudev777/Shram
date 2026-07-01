<?php
include('db.php');
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$email  = $_POST['email'] ?? '';
$stmt = mysqli_prepare($conn, "SELECT * FROM cust_details WHERE cust_email = ?");
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
mysqli_stmt_close($stmt);

if (mysqli_num_rows($result) == 1) {
    $row   = mysqli_fetch_array($result);
    $name  = $row['cust_name'];

    if ($row['cust_status'] == 0) {
        echo "<script>alert('You Are Blocked! Please Contact Our Helpline.'); window.location='login.php';</script>";
        exit;
    }

    $otp = rand(100000, 999999);
    $_SESSION['login_otp']    = $otp;
    $_SESSION['login_email'] = $email;

    // Send OTP Email
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
        $mail->Subject = ' Login OTP - Shram';
        $mail->Body    = "
        <div style='font-family:Arial,sans-serif;max-width:600px;margin:auto;border:1px solid #eee;border-radius:15px;overflow:hidden;'>
            <div style='background:linear-gradient(135deg,#fcbc04,#f0a500);padding:30px;text-align:center;'>
                <h1 style='color:#000;margin:0;font-size:36px;'>Shram<span style='color:#fff;'>.</span></h1>
                <p style='color:#000;margin:5px 0 0;font-size:13px;font-weight:bold;'>SMART VIRTUAL CONSTRUCTION COMPANY</p>
            </div>
            <div style='padding:35px 30px;background:#fff;text-align:center;'>
                <h2 style='color:#333;'>Hi, $name! 👋</h2>
                <p style='color:#555;font-size:15px;'>Your Login OTP is:</p>
                <h1 style='background:#fcbc04;color:#000;padding:15px 30px;border-radius:10px;letter-spacing:8px;display:inline-block;margin:15px 0;'>$otp</h1>
                <p style='color:#888;font-size:13px;'>Valid for <b>15 minutes</b>. Do not share with anyone.</p>
            </div>
            <div style='background:#222;padding:20px;text-align:center;'>
                <p style='color:#fcbc04;font-size:16px;font-weight:bold;margin:0;'>Shram.</p>
                <p style='color:#aaa;font-size:12px;margin:5px 0 0;'>Vadodara, Gujarat, India</p>
            </div>
        </div>";

        $mail->send();
    } catch (Exception $e) {
        echo "<script>alert('Mail failed: {$mail->ErrorInfo}'); window.location='login.php';</script>";
        exit;
    }

    // OTP Verify Page
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <title>Shram - Verify OTP</title>
      <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
      <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
      <link href="assets/vendor/aos/aos.css" rel="stylesheet">
      <link href="assets/css/main.css" rel="stylesheet">
    </head>
    <body>
    <?php include('header.php'); ?>
    <main id="main">
      <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/breadcrumbs-bg.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
          <h2>Verify OTP</h2>
          <ol><li><a href="index.php">Home</a></li><li>Login</li><li>OTP</li></ol>
        </div>
      </div>
      <section id="contact" class="contact">
        <center>
          <div class="col-lg-6">
            <div style="background:#fff;border-radius:15px;box-shadow:0 4px 20px rgba(0,0,0,0.1);padding:35px 30px;margin:40px auto;max-width:480px;">
              <h4 style="text-align:center;color:#333;margin-bottom:5px;">📧 OTP Sent!</h4>
              <p style="text-align:center;color:#888;font-size:14px;margin-bottom:25px;">Check your registered email for OTP</p>
              <form action="login_otp_process.php" method="post">
                <div class="mb-3">
                  <input type="text" name="user_otp" class="form-control" placeholder="Enter 6-digit OTP" required>
                </div>
                <button type="submit" style="background:#fcbc04;color:#000;font-weight:bold;border:none;padding:12px 30px;border-radius:25px;width:100%;font-size:15px;cursor:pointer;">
                  ✅ Verify & Login
                </button>
              </form>
              <p style="text-align:center;margin-top:15px;font-size:13px;color:#888;">
                <a href="login.php" style="color:#fcbc04;">← Back to Login</a>
              </p>
            </div>
          </div>
        </center>
      </section>
    </main>
    <?php include('footer.php'); ?>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/js/main.js"></script>
    </body>
    </html>
    <?php
} else {
    echo "<script>alert('Number not registered!'); window.location='login.php';</script>";
}
?>