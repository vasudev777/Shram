<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Shram - Login</title>
  <link href="assets/img/favicon.png" rel="icon">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/css/main.css" rel="stylesheet">

  <style>
    .login-box {
      background: #fff;
      border-radius: 15px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
      padding: 35px 30px;
      max-width: 480px;
      margin: 40px auto;
    }
    .login-tabs {
      display: flex;
      border-bottom: 2px solid #eee;
      margin-bottom: 25px;
    }
    .login-tab {
      flex: 1;
      text-align: center;
      padding: 12px 5px;
      cursor: pointer;
      font-weight: 600;
      color: #888;
      font-size: 14px;
      border-bottom: 3px solid transparent;
      margin-bottom: -2px;
      transition: all 0.3s;
    }
    .login-tab.active {
      color: #000;
      border-bottom: 3px solid #fcbc04;
    }
    .login-tab:hover { color: #333; }
    .tab-content { display: none; }
    .tab-content.active { display: block; }
    .btn-shram {
      background: #fcbc04;
      color: #000;
      font-weight: bold;
      border: none;
      padding: 12px 30px;
      border-radius: 25px;
      width: 100%;
      font-size: 15px;
      cursor: pointer;
      transition: 0.3s;
    }
    .btn-shram:hover { background: #f0a500; }
    .btn-google {
      background: #fff;
      color: #333;
      font-weight: bold;
      border: 2px solid #ddd;
      padding: 12px 30px;
      border-radius: 25px;
      width: 100%;
      font-size: 15px;
      cursor: pointer;
      transition: 0.3s;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
    }
    .btn-google:hover { background: #f5f5f5; border-color: #aaa; }
    .form-control {
      border-radius: 8px;
      padding: 12px 15px;
      font-size: 14px;
      border: 1px solid #ddd;
    }
    .form-control:focus { border-color: #fcbc04; box-shadow: 0 0 0 3px rgba(252,188,4,0.15); }
    .divider {
      text-align: center;
      margin: 20px 0;
      position: relative;
      color: #aaa;
      font-size: 13px;
    }
    .divider::before, .divider::after {
      content: '';
      position: absolute;
      top: 50%;
      width: 42%;
      height: 1px;
      background: #eee;
    }
    .divider::before { left: 0; }
    .divider::after { right: 0; }
    .signup-link {
      text-align: center;
      margin-top: 20px;
      font-size: 14px;
      color: #666;
    }
    .signup-link a { color: #fcbc04; font-weight: bold; text-decoration: none; }
    .signup-link a:hover { text-decoration: underline; }
  </style>
</head>

<body>

<?php include('header.php'); ?>

<main id="main">

  <!-- Breadcrumbs -->
  <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/breadcrumbs-bg.jpg');">
    <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
      <h2>Login</h2>
      <ol>
        <li><a href="index.php">Home</a></li>
        <li>Login</li>
      </ol>
    </div>
  </div>

  <section id="contact" class="contact">
    <div class="login-box">

      <!-- Tabs -->
      <div class="login-tabs">
        <div class="login-tab active" onclick="switchTab('password')">🔑 Password</div>
        <div class="login-tab" onclick="switchTab('otp')">📧 Email OTP</div>
        <div class="login-tab" onclick="switchTab('google')">🔵 Google</div>
      </div>

      <!-- Tab 1: Password Login -->
      <div class="tab-content active" id="tab-password">
        <form action="login_process.php" method="post">
          <input type="hidden" name="login_type" value="password">
          <div class="mb-3">
            <input type="text" name="number" class="form-control" placeholder="📱 Your Number" value="+91" required>
          </div>
          <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="🔒 Your Password" required>
          </div>
          <button type="submit" class="btn-shram">Login →</button>
        </form>
      </div>

  <!-- Tab 2: Email OTP Login -->
<div class="tab-content" id="tab-otp">
  <form action="login_send_otp.php" method="post">
    <input type="hidden" name="login_type" value="otp">
    <div class="mb-3">
      <input type="email" name="email" class="form-control" 
      placeholder="📧 Your Registered Email" required>
    </div>
    <button type="submit" class="btn-shram">📧 Send OTP to Email</button>
  </form>
</div>

      <!-- Tab 3: Google Login -->
      <div class="tab-content" id="tab-google">
        <p style="text-align:center;color:#666;font-size:14px;margin-bottom:20px;">
          Sign in quickly and securely with your Google account
        </p>
        <button class="btn-google" onclick="googleLogin()">
          <img src="https://www.google.com/favicon.ico" width="20" height="20" alt="Google">
          Continue with Google
        </button>
        <p style="text-align:center;color:#aaa;font-size:12px;margin-top:15px;">
          ⚠️ Your Google email must match your registered email
        </p>
      </div>

      <!-- Divider -->
      <div class="divider">or</div>

      <!-- Signup Link -->
      <div class="signup-link">
        Don't have an account? <a href="reg.php">Sign Up</a>
      </div>

    </div>
  </section>

</main>

<?php include('footer.php'); ?>

<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<div id="preloader"></div>

<!-- Firebase for Google Auth -->
<script src="https://www.gstatic.com/firebasejs/10.8.0/firebase-app-compat.js"></script>
<script src="https://www.gstatic.com/firebasejs/10.8.0/firebase-auth-compat.js"></script>

<script>
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyAL45FTVXQnZH5JrHsN7DeZrzj7AUn_fnU",
  authDomain: "connection-shram.firebaseapp.com",
  projectId: "connection-shram",
  storageBucket: "connection-shram.firebasestorage.app",
  messagingSenderId: "666121782814",
  appId: "1:666121782814:web:2219d7135f683decded00f",
  measurementId: "G-YRDHB65H8X"
};
   firebase.initializeApp(firebaseConfig); 

  // Tab Switch
  function switchTab(tab) {
    document.querySelectorAll('.tab-content').forEach(t => t.classList.remove('active'));
    document.querySelectorAll('.login-tab').forEach(t => t.classList.remove('active'));
    document.getElementById('tab-' + tab).classList.add('active');
    event.target.classList.add('active');
  }

  // Google Login
  function googleLogin() {
    const provider = new firebase.auth.GoogleAuthProvider();
    firebase.auth().signInWithPopup(provider).then(function(result) {
      const email = result.user.email;
      const name  = result.user.displayName;
      // Send to PHP for verification
      const form = document.createElement('form');
      form.method = 'POST';
      form.action = 'google_login_process.php';
      const emailInput = document.createElement('input');
      emailInput.type = 'hidden';
      emailInput.name = 'email';
      emailInput.value = email;
      const nameInput = document.createElement('input');
      nameInput.type = 'hidden';
      nameInput.name = 'name';
      nameInput.value = name;
      form.appendChild(emailInput);
      form.appendChild(nameInput);
      document.body.appendChild(form);
      form.submit();
    }).catch(function(error) {
      alert('Google Login Failed: ' + error.message);
    });
  }
</script>

<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>