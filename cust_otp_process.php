<?php
include('db.php');
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (isset($_POST['user_otp'])) {
    $user_otp   = $_POST['user_otp'];
    $system_otp = $_POST['sys_otp'];

    if ($user_otp == $system_otp) {
        $name     = mysqli_real_escape_string($conn, $_POST['name']);
        $number   = mysqli_real_escape_string($conn, $_POST['number']);
        $email    = mysqli_real_escape_string($conn, $_POST['email']);
        $state    = mysqli_real_escape_string($conn, $_POST['state']);
        $city     = mysqli_real_escape_string($conn, $_POST['city']);
        $address  = mysqli_real_escape_string($conn, $_POST['address']);
        $landmark = mysqli_real_escape_string($conn, $_POST['landmark']);
        $password = $_POST['password']; // already encrypted

        $sql = "INSERT INTO cust_details(cust_name,cust_number,cust_email,cust_state,cust_city,cust_address,cust_landmark,cust_password,cust_status)
                VALUES ('$name','$number','$email','$state','$city','$address','$landmark','$password','1')";

        if (mysqli_query($conn, $sql)) {

            // Congratulations Email
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
               $mail->Subject = ' Welcome to Shram Family, ' . $name . '!';
$mail->Body = "
<div style='font-family:Arial,sans-serif;max-width:620px;margin:auto;border:1px solid #eee;border-radius:15px;overflow:hidden;box-shadow:0 4px 20px rgba(0,0,0,0.1);'>

    <!-- Header -->
    <div style='background:linear-gradient(135deg,#fcbc04,#f0a500);padding:40px;text-align:center;'>
        <h1 style='color:#000;margin:0;font-size:48px;letter-spacing:3px;'>Shram<span style='color:#fff;'>.</span></h1>
        <p style='color:#000;margin:10px 0 0;font-size:14px;font-weight:bold;letter-spacing:1px;'>SMART VIRTUAL CONSTRUCTION COMPANY</p>
    </div>

    <!-- Welcome Banner -->
    <div style='padding:35px 30px;background:#fff;text-align:center;border-bottom:3px solid #fcbc04;'>
        <h2 style='color:#333;font-size:24px;margin:0;'>Welcome to Shram, <span style='color:#fcbc04;'>$name</span>! 🎉</h2>
        <p style='color:#777;font-size:15px;margin:12px 0 0;line-height:1.8;'>
            Your account has been successfully created.<br>
            You are now part of the <b>Shram Family!</b>
        </p>
    </div>

    <!-- What is Shram -->
    <div style='padding:35px 30px;background:#fffdf0;'>
        <h3 style='color:#333;font-size:19px;border-left:4px solid #fcbc04;padding-left:12px;margin-top:0;'>🏗️ What is Shram?</h3>
        <p style='color:#555;font-size:15px;line-height:1.9;'>
            <b>Shram</b> is a <b>Smart Virtual Construction Company</b> that connects <b>Customers, Labourers, and Builders</b> on one powerful platform.
            Whether you need a skilled worker for a small task or a professional builder for a large project — 
            <b>Shram makes it simple, fast, and reliable!</b>
        </p>
    </div>

    <!-- 3 Users Section -->
    <div style='padding:30px;background:#fff;'>
        <h3 style='color:#333;font-size:19px;border-left:4px solid #fcbc04;padding-left:12px;margin-top:0;'>👥 Who Uses Shram?</h3>
        <table style='width:100%;border-collapse:collapse;'>
            <tr>
                <td style='width:32%;padding:15px;background:#fff9e6;border-radius:10px;text-align:center;vertical-align:top;'>
                    <p style='font-size:28px;margin:0;'>🏠</p>
                    <p style='font-weight:bold;color:#333;margin:8px 0 4px;'>Customer</p>
                    <p style='color:#666;font-size:12px;margin:0;'>Book labour & builders for any project</p>
                </td>
                <td style='width:2%;'></td>
                <td style='width:32%;padding:15px;background:#fff9e6;border-radius:10px;text-align:center;vertical-align:top;'>
                    <p style='font-size:28px;margin:0;'>👷</p>
                    <p style='font-weight:bold;color:#333;margin:8px 0 4px;'>Labour</p>
                    <p style='color:#666;font-size:12px;margin:0;'>7 skilled categories available</p>
                </td>
                <td style='width:2%;'></td>
                <td style='width:32%;padding:15px;background:#fff9e6;border-radius:10px;text-align:center;vertical-align:top;'>
                    <p style='font-size:28px;margin:0;'>🏢</p>
                    <p style='font-weight:bold;color:#333;margin:8px 0 4px;'>Builder</p>
                    <p style='color:#666;font-size:12px;margin:0;'>Large projects with expert builders</p>
                </td>
            </tr>
        </table>
    </div>

    <!-- Features with Images -->
    <div style='padding:30px;background:#f9f9f9;'>
        <h3 style='color:#333;font-size:19px;border-left:4px solid #fcbc04;padding-left:12px;margin-top:0;'>⭐ Explore Shram</h3>

        <!-- Feature 1 -->
        <div style='background:#fff;border-radius:12px;overflow:hidden;margin-bottom:15px;box-shadow:0 2px 8px rgba(0,0,0,0.06);'>
            <img src='https://shram.free.nf/assets/img/17-SM701138.jpg' style='width:100%;height:180px;object-fit:cover;' alt='Dream House'>
            <div style='padding:15px 20px;'>
                <h4 style='color:#333;margin:0 0 6px;font-size:16px;'>🏠 Make Your Dream House</h4>
                <p style='color:#666;font-size:13px;margin:0;line-height:1.7;'>Book skilled workers and professional builders to construct your dream home with ease and confidence.</p>
            </div>
        </div>

        <!-- Feature 2 -->
        <div style='background:#fff;border-radius:12px;overflow:hidden;margin-bottom:15px;box-shadow:0 2px 8px rgba(0,0,0,0.06);'>
            <img src='https://shram.free.nf/assets/img/12-SM925889.jpg' style='width:100%;height:180px;object-fit:cover;' alt='Experienced Labour'>
            <div style='padding:15px 20px;'>
                <h4 style='color:#333;margin:0 0 6px;font-size:16px;'>👷 Experienced Labour</h4>
                <p style='color:#666;font-size:13px;margin:0;line-height:1.7;'>Choose from 7 skilled categories — Mason, Carpenter, Electrical, Plumber, Painter, Welder & Helper. All verified professionals!</p>
            </div>
        </div>

        <!-- Feature 3 -->
        <div style='background:#fff;border-radius:12px;overflow:hidden;margin-bottom:15px;box-shadow:0 2px 8px rgba(0,0,0,0.06);'>
            <img src='https://shram.free.nf/assets/img/20-SM203718.jpg' style='width:100%;height:180px;object-fit:cover;' alt='Construction Shop'>
            <div style='padding:15px 20px;'>
                <h4 style='color:#333;margin:0 0 6px;font-size:16px;'>🛒 Construction Shop</h4>
                <p style='color:#666;font-size:13px;margin:0;line-height:1.7;'>Shop for all construction materials and tools directly from Shram's virtual item shop — everything you need in one place!</p>
            </div>
        </div>

        <!-- Feature 4 -->
        <div style='background:#fff;border-radius:12px;overflow:hidden;margin-bottom:15px;box-shadow:0 2px 8px rgba(0,0,0,0.06);'>
            <img src='https://shram.free.nf/assets/img/220-SM896259.jpg' style='width:100%;height:180px;object-fit:cover;' alt='Passionate Builder'>
            <div style='padding:15px 20px;'>
                <h4 style='color:#333;margin:0 0 6px;font-size:16px;'>🏢 Passionate Builders</h4>
                <p style='color:#666;font-size:13px;margin:0;line-height:1.7;'>Find experienced builders based on location, rating & experience. Perfect for large construction projects!</p>
            </div>
        </div>
    </div>

    <!-- Labour Categories -->
    <div style='padding:30px;background:#fff;'>
        <h3 style='color:#333;font-size:19px;border-left:4px solid #fcbc04;padding-left:12px;margin-top:0;'>🔧 Our 7 Labour Categories</h3>
        <table style='width:100%;border-collapse:collapse;'>
            <tr>
                <td style='text-align:center;padding:10px;'>
                    <div style='background:#fff9e6;border-radius:10px;padding:12px 8px;'>
                        <p style='font-size:22px;margin:0;'>🧱</p>
                        <p style='font-size:12px;font-weight:bold;color:#333;margin:5px 0 0;'>Mason</p>
                    </div>
                </td>
                <td style='text-align:center;padding:10px;'>
                    <div style='background:#fff9e6;border-radius:10px;padding:12px 8px;'>
                        <p style='font-size:22px;margin:0;'>🪚</p>
                        <p style='font-size:12px;font-weight:bold;color:#333;margin:5px 0 0;'>Carpenter</p>
                    </div>
                </td>
                <td style='text-align:center;padding:10px;'>
                    <div style='background:#fff9e6;border-radius:10px;padding:12px 8px;'>
                        <p style='font-size:22px;margin:0;'>⚡</p>
                        <p style='font-size:12px;font-weight:bold;color:#333;margin:5px 0 0;'>Electrical</p>
                    </div>
                </td>
                <td style='text-align:center;padding:10px;'>
                    <div style='background:#fff9e6;border-radius:10px;padding:12px 8px;'>
                        <p style='font-size:22px;margin:0;'>🔧</p>
                        <p style='font-size:12px;font-weight:bold;color:#333;margin:5px 0 0;'>Plumber</p>
                    </div>
                </td>
            </tr>
            <tr>
                <td style='text-align:center;padding:10px;'>
                    <div style='background:#fff9e6;border-radius:10px;padding:12px 8px;'>
                        <p style='font-size:22px;margin:0;'>🎨</p>
                        <p style='font-size:12px;font-weight:bold;color:#333;margin:5px 0 0;'>Painter</p>
                    </div>
                </td>
                <td style='text-align:center;padding:10px;'>
                    <div style='background:#fff9e6;border-radius:10px;padding:12px 8px;'>
                        <p style='font-size:22px;margin:0;'>🔩</p>
                        <p style='font-size:12px;font-weight:bold;color:#333;margin:5px 0 0;'>Welder</p>
                    </div>
                </td>
                <td style='text-align:center;padding:10px;'>
                    <div style='background:#fff9e6;border-radius:10px;padding:12px 8px;'>
                        <p style='font-size:22px;margin:0;'>🤝</p>
                        <p style='font-size:12px;font-weight:bold;color:#333;margin:5px 0 0;'>Helper</p>
                    </div>
                </td>
                <td></td>
            </tr>
        </table>
    </div>

    <!-- Account Details -->
    <div style='padding:25px 30px;background:#fffdf0;'>
        <h3 style='color:#333;font-size:18px;border-left:4px solid #fcbc04;padding-left:12px;margin-top:0;'>📋 Your Account Details</h3>
        <p style='margin:6px 0;color:#555;font-size:14px;'>👤 <b>Name:</b> $name</p>
        <p style='margin:6px 0;color:#555;font-size:14px;'>📧 <b>Email:</b> $email</p>
        <p style='margin:6px 0;color:#555;font-size:14px;'>📍 <b>Location:</b> $city, $state</p>
    </div>

    <!-- CTA -->
    <div style='padding:35px 30px;background:#fff;text-align:center;'>
        <p style='color:#555;font-size:15px;margin:0 0 20px;'>Ready to build something great?</p>
        <a href='https://shram.free.nf' style='background:#fcbc04;color:#000;padding:15px 45px;border-radius:30px;text-decoration:none;font-weight:bold;font-size:16px;display:inline-block;'>
            🚀 Explore Shram Now
        </a>
    </div>

    <!-- Footer -->
    <div style='background:#222;padding:25px;text-align:center;'>
        <h2 style='color:#fcbc04;margin:0;font-size:24px;'>Shram.</h2>
        <p style='color:#aaa;font-size:12px;margin:8px 0 0;'>Smart Virtual Construction Company</p>
        <p style='color:#aaa;font-size:12px;margin:5px 0 0;'>Vadodara, Gujarat, India</p>
        <p style='color:#aaa;font-size:12px;margin:5px 0 0;'>© 2024 Shram. All rights reserved.</p>
    </div>

</div>";
                $mail->send();
            } catch (Exception $e) {
                // Mail fail hogi toh bhi registration complete hoga
            }

            echo "<script>alert('Registration Successful! Welcome to Shram 🎉'); window.location='login.php';</script>";

        } else {
            echo "<script>alert('Registration failed, try again!'); window.location='reg.php';</script>";
        }

    } else {
        echo "<script>alert('Invalid OTP! Please try again.'); window.location='reg.php';</script>";
    }
}
?>