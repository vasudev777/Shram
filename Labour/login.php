<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>SHRAM - Labour Login</title>
  <link href="assets/img/favicon.png" rel="icon">
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Nunito:300,400,600,700|Poppins:300,400,500,600,700" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <style>
    .login-box {
      background: #fff;
      border-radius: 15px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
      padding: 35px 30px;
      max-width: 420px;
      margin: auto;
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
      font-size: 13px;
      border-bottom: 3px solid transparent;
      margin-bottom: -2px;
      transition: all 0.3s;
    }
    .login-tab.active { color: #000; border-bottom: 3px solid #fcbc04; }
    .tab-content { display: none; }
    .tab-content.active { display: block; }
    .btn-shram {
      background: #fcbc04;
      color: #000;
      font-weight: bold;
      border: none;
      padding: 12px 30px;
      border-radius: 8px;
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
      border-radius: 8px;
      width: 100%;
      font-size: 15px;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      transition: 0.3s;
    }
    .btn-google:hover { background: #f5f5f5; }
    .form-control:focus { border-color: #fcbc04; box-shadow: 0 0 0 3px rgba(252,188,4,0.15); }
  </style>
</head>
<body>
<main>
  <div class="container">
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <!-- Logo -->
            <div class="d-flex justify-content-center py-4">
              <a href="../index.php" class="logo d-flex align-items-center w-auto">
                <span style="font-size:28px;font-weight:bold;">Shram<span style="color:#fcbc04;">.</span></span>
              </a>
            </div>

            <div class="login-box">
              <h5 class="text-center mb-1" style="font-size:20px;font-weight:bold;">Labour Portal</h5>
              <p class="text-center text-muted mb-4" style="font-size:13px;">Login to your account</p>

              <!-- Tabs -->
              <div class="login-tabs">
                <div class="login-tab active" onclick="switchTab('password', this)">🔑 Password</div>
                <div class="login-tab" onclick="switchTab('otp', this)">📧 Email OTP</div>
                <div class="login-tab" onclick="switchTab('google', this)">🔵 Google</div>
              </div>

              <!-- Tab 1: Password -->
              <div class="tab-content active" id="tab-password">
                <form action="labour_login_process.php" method="post">
                  <input type="hidden" name="login_type" value="password">
                  <div class="mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Your Registered Email" required>
                  </div>
                  <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Your Password" required>
                  </div>
                  <button type="submit" class="btn-shram">Login</button>
                </form>
              </div>

              <!-- Tab 2: Email OTP -->
              <div class="tab-content" id="tab-otp">
                <form action="labour_send_otp.php" method="post">
                  <input type="hidden" name="login_type" value="otp">
                  <div class="mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Your Registered Email" required>
                  </div>
                  <button type="submit" class="btn-shram">Send OTP to Email</button>
                </form>
              </div>

              <!-- Tab 3: Google -->
              <div class="tab-content" id="tab-google">
                <p style="text-align:center;color:#666;font-size:14px;margin-bottom:20px;">
                  Sign in with your registered Google account
                </p>
                <button class="btn-google" onclick="googleLogin()">
                  <img src="https://www.google.com/favicon.ico" width="20" height="20" alt="Google">
                  Continue with Google
                </button>
                <p style="text-align:center;color:#aaa;font-size:12px;margin-top:15px;">
                  Your Google email must match your registered email
                </p>
              </div>

              <!-- Register Link -->
              <div style="text-align:center;margin-top:20px;font-size:14px;color:#666;">
                New Labour? <a href="labour_reg.php" style="color:#fcbc04;font-weight:bold;">Register Here</a>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</main>

<!-- Firebase -->
<script src="https://www.gstatic.com/firebasejs/10.8.0/firebase-app-compat.js"></script>
<script src="https://www.gstatic.com/firebasejs/10.8.0/firebase-auth-compat.js"></script>

<script>
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

  function switchTab(tab, el) {
    document.querySelectorAll('.tab-content').forEach(t => t.classList.remove('active'));
    document.querySelectorAll('.login-tab').forEach(t => t.classList.remove('active'));
    document.getElementById('tab-' + tab).classList.add('active');
    el.classList.add('active');
  }

  function googleLogin() {
    const provider = new firebase.auth.GoogleAuthProvider();
    firebase.auth().signInWithPopup(provider).then(function(result) {
      const email = result.user.email;
      const name  = result.user.displayName;
      const form  = document.createElement('form');
      form.method = 'POST';
      form.action = 'labour_google_login.php';
      const emailInput = document.createElement('input');
      emailInput.type  = 'hidden';
      emailInput.name  = 'email';
      emailInput.value = email;
      const nameInput  = document.createElement('input');
      nameInput.type   = 'hidden';
      nameInput.name   = 'name';
      nameInput.value  = name;
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
<script src="assets/js/main.js"></script>
</body>
</html>