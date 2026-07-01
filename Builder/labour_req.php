<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Shram-Builder</title>
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
</head>

<body>

  <!-- ======= Header ======= -->
  <?php
  include('header.php');
  $id = $_SESSION['b_id'];

  // ✅ DB se har type ke labour count fetch karo
  $types = ['Mason', 'Carpentor', 'Electrician', 'Plumber', 'Painter', 'Welder', 'Helper'];
  $counts = [];

  foreach ($types as $type) {
      $sql = "SELECT COUNT(*) as total FROM labour_details WHERE l_type='$type'";
      $res = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($res);
      $counts[$type] = $row['total'];
  }
  ?>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <?php include('left_menu.php'); ?>
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Labour Request</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Labour Request</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <!-- ======= Services Section ======= -->
    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">

            <!-- Mason Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <a href="mason.php">
                    <h5 class="card-title">Mason</h5>
                  </a>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class='bx bx-user'></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $counts['Mason']; ?></h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Carpentor Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <a href="carpentor.php">
                    <h5 class="card-title">Carpentor</h5>
                  </a>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class='bx bx-user'></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $counts['Carpentor']; ?></h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Electrician Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <a href="electrician.php">
                    <h5 class="card-title">Electrician</h5>
                  </a>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class='bx bx-user'></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $counts['Electrician']; ?></h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Plumber Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <a href="plumber.php">
                    <h5 class="card-title">Plumber</h5>
                  </a>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class='bx bx-user'></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $counts['Plumber']; ?></h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Painter Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <a href="painter.php">
                    <h5 class="card-title">Painter</h5>
                  </a>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class='bx bx-user'></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $counts['Painter']; ?></h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Welder Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <a href="welder.php">
                    <h5 class="card-title">Welder</h5>
                  </a>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class='bx bx-user'></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $counts['Welder']; ?></h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Helper Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <a href="helper.php">
                    <h5 class="card-title">Helper</h5>
                  </a>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class='bx bx-user'></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $counts['Helper']; ?></h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
    <!-- End Services Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include('footer.php') ?>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i>
  </a>

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