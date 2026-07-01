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
 <?php  include('header.php'); 
 $id=$_SESSION['b_id'];
 ?>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <?php  include('left_menu.php');   ?>
 
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Customer History</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Builder </li>
          <li class="breadcrumb-item active">Labour Status </li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
    <div class="row">




    <div class="card">
            <div class="card-body">
              <h5 class="card-title">Labour Status</h5>

              <!-- Table with hoverable rows -->
              <table class="table table-hover">
                <thead>
                <?php
                         $sql = "SELECT *FROM build_details JOIN build_labour_book ON build_details.b_id = build_labour_book.b_id JOIN labour_details ON labour_details.l_id = build_labour_book.l_id WHERE  build_details.b_id='$id';";
                          if ($result = mysqli_query($conn, $sql)){
                         if (mysqli_num_rows($result) > 0){
                         ?>

                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Education</th>
                    <th scope="col">Date</th>
                    <th scope="col">Wage</th>
                    <th scope="col">Type</th>
                    <th scope="col">Notes</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                            while ($row = mysqli_fetch_assoc($result)) { ?>
                  
                <tr>
                        <td><?php echo $row['l_name']; ?></td>
                        <td><?php echo $row['l_education']; ?></td>
                        
                        <td><?php echo $row['build_labour_book_date']; ?></td>
                        <td><?php echo $row['l_wage']; ?></td>
                        <td><?php echo $row['l_type']; ?></td>
                        <td><?php echo $row['build_labour_book_note']; ?></td>
                        <?php
                                    $flag = $row['build_labour_book_status'];
//echo $flag;
                                    if ($flag == 0) { ?>
                                            <td>     <span class="badge bg-primary"><i class="bi bi-star me-1"></i> Pending</span> </td>

                                        <?php } elseif($flag == 1) { ?>
                                       <td>   <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Accepted</span> </td>
                                   <?php     } else{ ?>
                                    <td>           <span class="badge bg-danger"><i class="bi bi-exclamation-octagon me-1"></i> Rejected</span> </td>
                               <?php    } ?>
                        
                        
                       
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

              <!-- End Table with hoverable rows -->

            </div>
          </div>



















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