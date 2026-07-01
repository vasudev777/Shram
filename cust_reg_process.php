<?php
include('db.php');
error_reporting(E_ALL); ini_set('display_errors', 1); 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$name     = $_POST['name'];
$number   = $_POST['number'];
$email    = $_POST['email'];
$state    = $_POST['state'];
$city     = $_POST['city'];
$address  = $_POST['address'];
$landmark = $_POST['landmark'];
$password = $_POST['password'];

// Check duplicate number
$result = mysqli_query($conn, "SELECT * FROM cust_details WHERE cust_number='$number'");
if(mysqli_num_rows($result) == 1){
    echo "<script>alert('Number already exists, try new one')</script>";
    echo "<script>window.location='reg.php'</script>";
    exit;
}

// Check duplicate email
$result1 = mysqli_query($conn, "SELECT * FROM cust_details WHERE cust_email='$email'");
if(mysqli_num_rows($result1) == 1){
    echo "<script>alert('Email already exists, try new one')</script>";
    echo "<script>window.location='reg.php'</script>";
    exit;
}

$pass_encode = password_hash($password, PASSWORD_DEFAULT);
$otp = rand(100000, 999999);

// PHPMailer
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
    $mail->Subject = 'OTP Verification - Shram';
    $mail->Body = "
    <div style='font-family:Arial,sans-serif;padding:20px;max-width:600px;margin:auto;'>
        <h2 style='color:#fcbc04;'>Shram</h2>
        <hr>
        <p>Hi, <b>$name</b></p>
        <p>Thank you for registering! Use the OTP below to complete your signup:</p>
        <h2 style='background:#4db4c0;color:#fff;padding:10px;width:fit-content;letter-spacing:5px;'>$otp</h2>
        <p>OTP is valid for <b>15 minutes</b>.</p>
        <p>Regards,<br><b>Shram Team</b></p>
        <hr>
        <small>Vadodara, Gujarat, India</small>
    </div>";

    $mail->send();
} catch (Exception $e) {
    echo "Mail failed: {$mail->ErrorInfo}";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>UpConstruction Bootstrap Template - Services</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: UpConstruction - v1.3.0
  * Template URL: https://bootstrapmade.com/upconstruction-bootstrap-construction-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>
  .container {
	}
	#number, #verificationcode {
	}
	#recaptcha-container {
	}
	#send, #verify {
        
	}
	.p-conf, .n-conf {
		display: none;
	}
	.n-conf {
	}
</style>
</head>

<body>


<!-- ======= Header ======= -->
<?php include('header.php'); ?>
<!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/breadcrumbs-bg.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2>Registration</h2>
        <ol>
          <li><a href="index.php">Home</a></li>
          <li>Sign-Up</li>
          <li>OTP</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->
    <section id="contact" class="contact">
  <center>
          <div class="col-lg-6">
          <div id="sender">
            <form action="cust_otp_process.php" method="post"  class="form-control">
              <div class="row gy-4">
              <center>  
              <div class="col-lg-8 form-group">
                <input type="text" name="user_otp"  class="form-control" placeholder="Your OTP"   required>  
             </div>
             <br>
             </center>
              </div><br>
              <div class="text-center">
              <input type="submit" value="Verify OTP"  style="background-color:#fcbc04; outline: none;">
        </div>
        <input name="name" value="<?php echo $name ?>" type="hidden">
        <input name="number" value="<?php echo $number ?>" type="hidden">
        <input name="email" value="<?php echo $email ?>" type="hidden">
        <input name="state" value="<?php echo $state ?>" type="hidden">
        <input name="city" value="<?php echo $city ?>" type="hidden">
        <input name="address" value="<?php echo $address ?>" type="hidden">
        <input name="landmark" value="<?php echo $landmark ?>" type="hidden">
        <input name="password" value="<?php echo $pass_encode ?>" type="hidden">
        <input name="sys_otp" value="<?php echo $otp ?>" type="hidden">
        
              </div>
               
    </form>
          </div><!-- End Contact Form -->
          </center>
      

      </div>
    </section><!-- End Contact Section -->
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
 <?php include('footer.php'); ?>
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

   <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
