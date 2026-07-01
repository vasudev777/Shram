<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Shram</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: UpConstruction - v1.3.0
  * Template URL: https://bootstrapmade.com/upconstruction-bootstrap-construction-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

</head>

<body>


<!-- ======= Header ======= -->
<?php include('header.php'); ?>
<!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/breadcrumbs-bg.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2>History</h2>
        <ol>
          <li><a href="index.php">Home</a></li>
          <li>Customer</li>
          <li><a href="cust_history.php">History</a></li>
          <li>Labour History</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->



   <!-- ======= Services Section ======= -->
   <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="row gy-4">

        <div class="col-12">
              <div class="card recent-sales overflow-auto">


                <div class="card-body">

                  <table class="table table-borderless datatable">
                    <thead>

                    <?php

                                              $cust_id = $_SESSION['cust_id'];
$sql = "SELECT * FROM labour_details 
        JOIN labour_cust_book ON labour_details.l_id = labour_cust_book.l_id 
        JOIN cust_details ON cust_details.cust_id = labour_cust_book.cust_id
        WHERE labour_cust_book.cust_id = '$cust_id'";
                        //echo $sql;
                       
                         if ($result = mysqli_query($conn, $sql)){
                         if (mysqli_num_rows($result) > 0){
                         ?>

                      <tr>
                        <th scope="col">Labour Name</th>
                        <th scope="col">Labour Type</th>
                        <th scope="col">Labour Number</th>
                        <th scope="col">Date</th>
                        <th scope="col">Note</th>
                      
                        <th scope="col">Wage</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                            while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>

                        <th scope="row"><?php echo $row['l_name']; ?></th>
                        <td><?php echo $row['l_type']; ?></td>
                        <td><?php echo $row['l_number']; ?></td>
                        <td><?php echo $row['lc_date']; ?></td>
                        
                        <td><?php echo $row['lc_note']; ?></td>
                        <td><?php echo $row['l_wage']; ?></td>
                       
                        <?php
                                    $flag = $row['lc_status'];
//echo $flag;
                                    if ($flag == 0) { ?>
                                            <td>     <span class="badge bg-primary"><i class="bi bi-star me-1"></i> Pending</span> </td>

                                        <?php } elseif($flag == 1) { ?>
                                       <td>   <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Accepted</span> </td>
                                   <?php     } else{ ?>
                                    <td>           <span class="badge bg-danger"><i class="bi bi-exclamation-octagon me-1"></i> Rejected</span> </td>
                               <?php    } ?>
  
                      </tr>
                      <?php
                                    }
                                    ?>
                
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

                     
                        ?>


                </div>

              </div>
            </div><!-- End Recent Sales -->

         
        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Servie Cards Section ======= -->
    

    </main><!-- End #main -->

  <!-- ======= Footer ======= -->
 <?php include('footer.php'); ?>
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>


  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>