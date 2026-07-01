<?php include('header.php'); ?>
<?php
// DB se fresh data fetch karo
$cust_id = $_SESSION['cust_id'];
$sql     = "SELECT * FROM cust_details WHERE cust_id='$cust_id'";
$result  = mysqli_query($conn, $sql);
$row     = mysqli_fetch_assoc($result);

$name     = $row['cust_name'];
$number   = $row['cust_number'];
$email    = $row['cust_email'];
$state    = $row['cust_state'];
$city     = $row['cust_city'];
$address  = $row['cust_address'];
$landmark = $row['cust_landmark'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Shram - Profile</title>
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
    .profile-card {
      background: #fff;
      border-radius: 15px;
      box-shadow: 0 2px 15px rgba(0,0,0,0.08);
      padding: 30px;
      max-width: 600px;
      margin: 40px auto;
    }
    .profile-item {
      display: flex;
      padding: 12px 0;
      border-bottom: 1px solid #f0f0f0;
      font-size: 15px;
    }
    .profile-item:last-child { border-bottom: none; }
    .profile-label {
      font-weight: bold;
      color: #333;
      min-width: 120px;
    }
    .profile-value { color: #555; }
    .btn-update {
      background: #fcbc04;
      color: #000;
      font-weight: bold;
      border: none;
      padding: 12px 35px;
      border-radius: 25px;
      font-size: 15px;
      cursor: pointer;
      text-decoration: none;
      display: inline-block;
      margin-top: 20px;
    }
    .btn-update:hover { background: #f0a500; color: #000; }
  </style>
</head>
<body>

<main id="main">
  <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/breadcrumbs-bg.jpg');">
    <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
      <h2>Profile</h2>
      <ol>
        <li><a href="index.php">Home</a></li>
        <li>Profile</li>
      </ol>
    </div>
  </div>

  <section id="contact" class="contact">
    <div class="profile-card">
      <h4 style="color:#333;margin-bottom:20px;border-left:4px solid #fcbc04;padding-left:12px;">My Profile</h4>

      <div class="profile-item">
        <span class="profile-label">👤 Name</span>
        <span class="profile-value"><?php echo $name; ?></span>
      </div>
      <div class="profile-item">
        <span class="profile-label">📱 Number</span>
        <span class="profile-value"><?php echo $number; ?></span>
      </div>
      <div class="profile-item">
        <span class="profile-label">📧 Email</span>
        <span class="profile-value"><?php echo $email; ?></span>
      </div>
      <div class="profile-item">
        <span class="profile-label">🏛️ State</span>
        <span class="profile-value"><?php echo $state; ?></span>
      </div>
      <div class="profile-item">
        <span class="profile-label">🏙️ City</span>
        <span class="profile-value"><?php echo $city; ?></span>
      </div>
      <div class="profile-item">
        <span class="profile-label">🏠 Address</span>
        <span class="profile-value"><?php echo $address; ?></span>
      </div>
      <div class="profile-item">
        <span class="profile-label">📍 Landmark</span>
        <span class="profile-value"><?php echo $landmark; ?></span>
      </div>

      <div class="text-center">
        <a href="update_profile.php" class="btn-update">✏️ Update Profile</a>
      </div>
    </div>
  </section>
</main>

<?php include('footer.php'); ?>
<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<div id="preloader"></div>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>