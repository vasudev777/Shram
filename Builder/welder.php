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

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.5.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
 <?php  include('header.php');   ?>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <?php  include('left_menu.php');   ?>
 
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Welder</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active"><a href="labour_req.php">Labour Request </a> </li>
          <li class="breadcrumb-item active">Welder </li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
    <div class="row">

 
            <!-- Top Selling -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body pb-0">
                  <h5 class="card-title">Details</h5>

                  <table class="table table-borderless">
                    <thead>
                    
                    <?php
                         $sql = "SELECT * FROM `labour_details` WHERE l_type='Welder';";
                         if ($result = mysqli_query($conn, $sql)){
                         if (mysqli_num_rows($result) > 0){
                         ?>

                    <tr>
                        
                        <th scope="col">Photo</th>
                        <th scope="col">name</th>
                        <th scope="col">Number</th>
                        <th scope="col">language</th>
                        <th scope="col">Education</th>
                        <th scope="col">experience</th>
                        <th scope="col">State</th>
                        <th scope="col">city</th>
                        <th scope="col">Rating</th>
                        <th scope="col">Book</th>
                      </tr>
                    </thead>
                    <tbody>
                   
  <?php
                            while ($row = mysqli_fetch_assoc($result)) { ?>
                      <tr>
                        <th scope="row"><a href="#"><img src="../admin/Upload/<?php echo $row['l_photo']; ?>" alt=""></a></th>
                        <td><?php echo $row['l_name']; ?></td>
                        <td><?php echo $row['l_number']; ?></td>
                        <td><?php echo $row['l_lang']; ?></td>
                        <td><?php echo $row['l_education']; ?></td>
                        <td><?php echo $row['l_exp']; ?></td>
                        <td><?php echo $row['l_state']; ?></td>
                        <td><?php echo $row['l_city']; ?></td>
                        <td><?php echo $row['l_rating']; ?></td>
                       <td><a href="labour_book.php?lid=<?php echo $row['l_id']; ?>"><span class="badge bg-primary">Book</span></a></td>
                                  

                      </tr>
                </tbody>
                <?php
                            }
                        
                            ?>
                </table>
                <?php
                        }
                        else {
                            echo "No record found";
                        }

                        }
                        ?>


                </div>

              </div>
            </div><!-- End Top Selling -->



          </div>
        </section>
    </main><!-- End #main -->

<!-- ======= Footer ======= -->
<?php include('footer.php') ?>
<!-- End Footer -->

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