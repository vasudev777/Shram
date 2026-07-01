<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include('db.php'); 
?>
<header id="header" class="header fixed-top d-flex align-items-center">
<div class="d-flex align-items-center justify-content-between">
  <a href="index.php" class="logo d-flex align-items-center">
    <img src="assets/img/logo.png" alt="">
    <span class="d-none d-lg-block">Shram</span>
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->

<style>
  .header-profile-img {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid #fcbc04;
    margin-right: 8px;
  }
  .header-profile-placeholder {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: #f0f0f0;
    border: 2px solid #fcbc04;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 8px;
  }
  .header-profile-placeholder i {
    font-size: 18px;
    color: #aaa;
  }
</style>

<nav class="header-nav ms-auto">
<ul class="d-flex align-items-center">
<li class="nav-item dropdown pe-3">
<?php 
  if (!isset($_SESSION['b_id']) || is_null($_SESSION['b_id'])) {
    header("location: login.php");
    exit;
  }

  if (isset($_SESSION['b_id'])) { 
    $name = $_SESSION['b_name'];
    include('db.php');
    $id = $_SESSION['b_id'];
    $sql = "SELECT * FROM build_details WHERE b_id=$id";

    if ($result = mysqli_query($conn, $sql)) {
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          $b_id       = $row['b_id'];
          $b_name     = $row['b_name'];
          $b_email    = $row['b_email'];
          $b_number   = $row['b_number'];
          $b_state    = $row['b_state'];
          $b_city     = $row['b_city'];
          $b_landmark = $row['b_landmark'];
          $b_exp      = $row['b_experience'];
          $b_photo    = $row['b_photo'];
          $b_rating   = $row['b_rating'];
          $b_status   = $row['b_status'];

          if ($b_status == 1) {
            echo "<script>window.location='logout.php'</script>";  
          } 
        }
      } else {
        echo "No record found";
      }
    }
?>

  <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
    
    <!-- ✅ Photo Circle -->
    <?php if (!empty($b_photo)) { ?>
      <img src="../admin/Upload/<?php echo $b_photo; ?>" 
           alt="Profile" 
           class="header-profile-img">
    <?php } else { ?>
      <div class="header-profile-placeholder">
        <i class='bx bx-user'></i>
      </div>
    <?php } ?>

    <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $name; ?></span>
  </a><!-- End Profile Image Icon -->

  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
    <li class="dropdown-header">
      <h6><?php echo $name; ?></h6>
      <span>Builder</span>
    </li>
    <li>
      <a class="dropdown-item d-flex align-items-center" href="logout.php">
        <i class="bi bi-box-arrow-right"></i>
        <span>Sign Out</span>
      </a>
    </li>
  </ul><!-- End Profile Dropdown Items -->

<?php
  } else { ?>
    <ul class="d-flex align-items-center">
      <li>
        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="login.php">
          <span>Login</span>
        </a>
      </li>
    </ul>
  <?php } ?>
      
</li><!-- End Profile Nav -->
</ul>
</nav><!-- End Icons Navigation -->
</header>