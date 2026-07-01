  <!-- ======= Header ======= -->
<?php  session_start();  
 include('db.php');
?>
  <header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>Shram<span>.</span></h1>
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.php" class="active">Home</a></li>
        
          <li><a href="/service.php">Services</a></li>
          <li><a href="/Labour">Labour</a></li>
          <li><a href="/Builder">Builder</a></li>
            <li><a href="/admin">Admin</a></li>
          <?php 
          
          if (isset($_SESSION['uemail'])){ 
           $name = $_SESSION['cust_name'] ?? '';
$id = $_SESSION['cust_id'] ?? 0;
            include('db.php');
          
            $sql = "SELECT * FROM cust_details where cust_id=$id";
//                   echo "$sql";
            if ($result = mysqli_query($conn, $sql)) {
                if (mysqli_num_rows($result) > 0) {

                    while ($row = mysqli_fetch_assoc($result)) {
                      $custid = $row['cust_id'];

                      $name = $row['cust_name'];
                      $number = $row['cust_number'];
                      $email = $row['cust_email'];
                      $state = $row['cust_state'];
                      $city = $row['cust_city'];
                      $address = $row['cust_address'];
                      $landmark = $row['cust_landmark'];
                      $password = $row['cust_password'];
                      $status = $row['cust_status'];
                      if($status == 0 )
                      {
                          
                          echo "<script>window.location='logout.php'</script>";  
                      } 
                    }
                } else {
                    echo "No record found";
                }

            }

            ?>
          <li class="dropdown"><a href="#"><span>Hello, <?php echo $name; ?></span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="profile.php">Profile</a></li>
              <li><a href="cust_history.php">History</a></li>
              <li><a href="logout.php">Logout</a></li>
            </ul>
            <?php
          }
            else {
              ?>
              <li><a href="login.php">Login</a></li>
            <?php    
            }

                        ?>
          </li>
        </ul>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
