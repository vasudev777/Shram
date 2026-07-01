<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Shram - Labour</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.5.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
<?php include('header.php');
 if (!isset($_SESSION['l_id']) || is_null($_SESSION['l_id']))
 {
  header("location: login.php");
  exit;
 }  
 
?>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <?php  include('left_menu.php') ?>
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Customers Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

               
                <div class="card-body">
                  <h5 class="card-title">Total Customer Service</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class='bx bx-user'></i>
                    </div>
                    <div class="ps-3">
                      <h6>
                      <?php
                                        $query = "SELECT * FROM labour_cust_book where l_id=$id";
                                        $result = mysqli_query($conn, $query);
                                        if ($result) {
                                            // it return number of rows in the table.
                                            $row = mysqli_num_rows($result);

                                            echo $row;

                                            // close the result.
                                            mysqli_free_result($result);
                                        }

                                        ?>

                      </h6>
                      
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

          

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-">
              <div class="card info-card sales-card">

               
                <div class="card-body">
                  <h5 class="card-title">Total  Builder Service </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class='bx bxs-user'></i>
                    </div>
                    <div class="ps-3">
                      <h6>
                      <?php
                                        $query = "SELECT * FROM build_labour_book where l_id=$id";
                                        $result = mysqli_query($conn, $query);
                                        if ($result) {
                                            // it return number of rows in the table.
                                            $row = mysqli_num_rows($result);

                                            echo $row;

                                            // close the result.
                                            mysqli_free_result($result);
                                        }

                                        ?>

                      </h6>
                      
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

             
         
        <!--main code   -->


      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php  include('footer.php') ?>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>