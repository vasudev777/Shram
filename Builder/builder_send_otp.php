<?php
include('../db.php');
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

$email  = $_POST['email'];
$sql    = "SELECT * FROM build_details WHERE b_email='$email'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) == 1) {
    $row  = mysqli_fetch_array($result);
    $name = $row['b_name'];

 // Email verify check
if($row['b_emailverify'] == 0) {
    echo "<script>alert('Please verify your email first!'); window.location='login.php';</script>";
    exit;
}
// Admin approval check
if($row['b_approval'] == 0) {
    echo "<script>alert('Your account is pending admin approval!'); window.location='login.php';</script>";
    exit;
}
if($row['b_approval'] == 2) {
    echo "<script>alert('Your account has been rejected!'); window.location='login.php';</script>";
    exit;
}
// Block check
if($row['b_status'] == 1) {
    echo "<script>alert('Your account has been blocked! Contact support.'); window.location='login.php';</script>";
    exit;
}

    $otp = rand(100000, 999999);
    $_SESSION['builder_login_otp']   = $otp;
    $_SESSION['builder_login_email'] = $email;

    // Email bhejo
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
        $mail->Subject = 'Login OTP - Shram Builder';
        $mail->Body    = "
        <div style='font-family:Arial,sans-serif;max-width:600px;margin:auto;border:1px solid #eee;border-radius:15px;overflow:hidden;'>
            <div style='background:#0d6efd;padding:30px;text-align:center;'>
                <h1 style='color:#fff;margin:0;font-size:32px;'>Shram<span style='color:#fcbc04;'>.</span></h1>
                <p style='color:#fff;margin:5px 0 0;font-size:13px;'>Builder Portal</p>
            </div>
            <div style='padding:35px 30px;text-align:center;'>
                <h2 style='color:#333;'>Hi, $name!</h2>
                <p style='color:#555;'>Your Login OTP is:</p>
                <h1 style='background:#0d6efd;color:#fff;padding:15px 30px;border-radius:10px;letter-spacing:8px;display:inline-block;'>$otp</h1>
                <p style='color:#888;font-size:13px;margin-top:15px;'>Valid for <b>15 minutes</b>. Do not share with anyone.</p>
            </div>
            <div style='background:#333;padding:20px;text-align:center;'>
                <p style='color:#fcbc04;font-weight:bold;margin:0;'>Shram. Builder Portal</p>
                <p style='color:#aaa;font-size:12px;margin:5px 0 0;'>Vadodara, Gujarat, India</p>
            </div>
        </div>";

        $mail->send();
    } catch (Exception $e) {
        echo "<script>alert('Mail failed!'); window.location='login.php';</script>";
        exit;
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <title>Verify OTP - Shram</title>
      <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link href="assets/css/style.css" rel="stylesheet">
    </head>
    <body>
    <main>
      <div class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-4 col-md-6">
                <div class="card mb-3">
                  <div class="card-body p-4">
                    <h5 class="text-center mb-4">OTP Sent to Email!</h5>
                    <p class="text-center text-muted" style="font-size:14px;">Check your registered email for OTP</p>
                    <form action="builder_otp_process.php" method="post">
                      <div class="mb-3">
                        <input type="text" name="user_otp" class="form-control" placeholder="Enter 6-digit OTP" required>
                      </div>
                      <button type="submit" class="btn btn-primary w-100">Verify & Login</button>
                    </form>
                    <p class="text-center mt-3" style="font-size:13px;">
                      <a href="login.php" style="color:#0d6efd;">Back to Login</a>
                    </p>
                  </div>
                </div>
              </div>
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
    echo "<script>alert('Email not registered!'); window.location='login.php';</script>";
}
?>