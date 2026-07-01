
<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include('../db.php'); 
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
         
          if (isset($_SESSION['l_id'])){ 
            $name=$_SESSION['l_name'];
            $type=$_SESSION['l_type'];  
            include('db.php');
            $id = $_SESSION['l_id'];
            $sql = "SELECT * FROM labour_details where l_id=$id";
//                    echo "$sql";
            if ($result = mysqli_query($conn, $sql)) {
                if (mysqli_num_rows($result) > 0) {

                    while ($row = mysqli_fetch_assoc($result)) {
                      $l_id = $row['l_id'];
                      $l_name = $row['l_name'];
                      $l_number = $row['l_number'];
                      $l_lang = $row['l_lang'];
                      $l_wage = $row['l_wage'];
                      $l_state = $row['l_state'];
                      $l_city = $row['l_city'];
                      $l_type = $row['l_type'];
                      $l_exp = $row['l_exp'];
                      $l_status = $row['l_status'];
                        $l_photo = $row['l_photo'];
                        
                      if($l_status == 0 )
    {
     
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
    <?php if (!empty($l_photo)) { ?>
      <img src="../admin/Upload/<?php echo $l_photo; ?>" 
           alt="Profile" 
           class="header-profile-img">
    <?php } else { ?>
      <div class="header-profile-placeholder">
        <i class='bx bx-user'></i>
      </div>
    <?php } ?>
        <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $l_name; ?></span>
      </a><!-- End Profile Iamge Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li class="dropdown-header">
          <h6><?php echo $name; ?></h6>
          <span><?php echo $type; ?></span>
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