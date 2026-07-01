
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
<nav class="header-nav ms-auto">
<ul class="d-flex align-items-center">
<li class="nav-item dropdown pe-3">
<?php 
         
         if (!isset($_SESSION['a_id']) || is_null($_SESSION['a_id']))
 {
  header("location: login.php");
  exit;
 }
          if (isset($_SESSION['a_id'])){ 
            $name=$_SESSION['a_name'];
            include('db.php');
            $id = $_SESSION['a_id'];
            $sql = "SELECT * FROM admin where a_id=$id";
//                    echo "$sql";
            if ($result = mysqli_query($conn, $sql)) {
                if (mysqli_num_rows($result) > 0) {

                    while ($row = mysqli_fetch_assoc($result)) {
                      $a_id = $row['a_id'];
                      $a_name = $row['a_name'];
                      $a_username = $row['a_userid'];
                      $a_password = $row['a_password'];
                    
                      
                    }
                } else {
                    echo "No record found";
                }

            }
?>

  
 

      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
        <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $name; ?></span>
      </a><!-- End Profile Iamge Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li class="dropdown-header">
          <h6><?php echo $name; ?></h6>
          <span>Admin</span>
        </li>
        </li>

        
        <li>
          <a class="dropdown-item d-flex align-items-center" href="logout.php">
            <i class="bi bi-box-arrow-right"></i>
            <span>Sign Out</span>
          </a>
        </li>

      </ul><!-- End Profile Dropdown Items -->
      <?php
    }
    else {
        ?>
        <ul class="d-flex align-items-center">
        <li>
    
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="login.php" >
            <span>Login</span>
          </a><!-- End Profile Iamge Icon -->
    
          
            </li>
    
    
          </ul><!-- End Profile Dropdown Items -->
          <?php    
        }

                    ?>
          
    </li><!-- End Profile Nav -->

  </ul>
</nav><!-- End Icons Navigation -->

</header>