<?php
include('../db.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

$name      = mysqli_real_escape_string($conn, $_POST['name']);
$number    = mysqli_real_escape_string($conn, $_POST['number']);
$email     = mysqli_real_escape_string($conn, $_POST['email']);
$lang      = mysqli_real_escape_string($conn, $_POST['lang']);
$type      = mysqli_real_escape_string($conn, $_POST['type']);
$exp       = mysqli_real_escape_string($conn, $_POST['exp']);
$wage      = mysqli_real_escape_string($conn, $_POST['wage']);
$state     = mysqli_real_escape_string($conn, $_POST['state']);
$city      = mysqli_real_escape_string($conn, $_POST['city']);
$password  = $_POST['password'];
$education = 'literate'; // Auto set

// Duplicate number check
$check = mysqli_query($conn, "SELECT * FROM labour_details WHERE l_number='$number'");
if(mysqli_num_rows($check) == 1) {
    echo "<script>alert('Number already exists!'); window.location='reg.php';</script>";
    exit;
}

// Duplicate email check
$check2 = mysqli_query($conn, "SELECT * FROM labour_details WHERE l_email='$email'");
if(mysqli_num_rows($check2) == 1) {
    echo "<script>alert('Email already exists!'); window.location='reg.php';</script>";
    exit;
}

// Image Upload
$image = '';
if(isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
    $photo_tmp  = $_FILES['photo']['tmp_name'];
    $photo_name = $_FILES['photo']['name'];
    $photo_ext  = strtolower(pathinfo($photo_name, PATHINFO_EXTENSION));
    $allowed    = ['jpg', 'jpeg', 'png', 'gif'];

    if(!in_array($photo_ext, $allowed)) {
        echo "<script>alert('Only JPG, PNG, GIF allowed!'); window.location='reg.php';</script>";
        exit;
    }
    if($_FILES['photo']['size'] > 500000) {
        echo "<script>alert('File too large!'); window.location='reg.php';</script>";
        exit;
    }

    $new_name    = 'labour_' . time() . '.' . $photo_ext;
    $upload_path = '../admin/Upload/' . $new_name;

    if(!move_uploaded_file($photo_tmp, $upload_path)) {
        echo "<script>alert('Photo upload failed!'); window.location='reg.php';</script>";
        exit;
    }
    $image = $new_name;
}

$pass_encode = password_hash($password, PASSWORD_DEFAULT);
$token       = bin2hex(random_bytes(32));

// DB Insert
$sql = "INSERT INTO labour_details(l_name, l_number, l_email, l_lang, l_type, l_exp, l_wage, l_state, l_city, l_education, l_photo, l_password, l_status, l_emailverify, l_approval, l_rating)
        VALUES ('$name', '$number', '$email', '$lang', '$type', '$exp', '$wage', '$state', '$city', '$education', '$image', '$pass_encode', '1', '0', '0', '0')";

if(mysqli_query($conn, $sql)) {

    // Get labour ID for token update
    $lid = mysqli_insert_id($conn);
    mysqli_query($conn, "UPDATE labour_details SET l_token='$token' WHERE l_id='$lid'");

    // Email Verify Mail
    $verify_link = "https://shram.free.nf/Labour/labour_email_verify.php?token=$token";

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
        $mail->Subject = 'Verify Your Email - Shram Labour Portal';
        $mail->Body    = "
        <div style='font-family:Arial,sans-serif;max-width:620px;margin:auto;border:1px solid #eee;border-radius:15px;overflow:hidden;'>
            <div style='background:linear-gradient(135deg,#fcbc04,#f0a500);padding:35px;text-align:center;'>
                <h1 style='color:#000;margin:0;font-size:40px;letter-spacing:2px;'>Shram<span style='color:#fff;'>.</span></h1>
                <p style='color:#000;margin:8px 0 0;font-size:13px;font-weight:bold;'>Labour Portal</p>
            </div>
            <div style='padding:35px 30px;text-align:center;'>
                <p style='font-size:45px;margin:0;'>📧</p>
                <h2 style='color:#333;margin:15px 0 5px;'>Verify Your Email</h2>
                <p style='color:#666;font-size:15px;'>Hi <b>$name</b>, thank you for registering on Shram!</p>
                <p style='color:#666;font-size:14px;margin:15px 0 25px;'>Please click the button below to verify your email address.</p>
                <a href='$verify_link' style='background:#fcbc04;color:#000;padding:14px 40px;border-radius:25px;text-decoration:none;font-weight:bold;font-size:16px;display:inline-block;'>
                    Verify Email Address
                </a>
                <p style='color:#aaa;font-size:12px;margin-top:20px;'>Link expires in 24 hours.</p>
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

    echo "<script>alert('Registration Successful! Please check your email to verify your account.'); window.location='login.php';</script>";

} else {
    echo "<script>alert('Registration Failed! Try again.'); window.location='reg.php';</script>";
}
?>