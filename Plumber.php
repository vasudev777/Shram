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

        <h2>Plumber</h2>
        <ol>
          <li><a href="index.php">Home</a></li>
          <li><a href="labour.php">Labours</a></li>
          <li>Plumber</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

    <?php      $sql = "SELECT * FROM `labour_details` WHERE l_type='Plumber';";
                    if ($result = mysqli_query($conn, $sql)){
 ?>                   

    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4 posts-list">
     
               
<!-- start -->
<?php
if (mysqli_num_rows($result) > 0){
                        while ($row = mysqli_fetch_assoc($result)) { 
                    ?>
          <div class="col-xl-4 col-md-6">
            <div class="post-item position-relative h-100">

              <div class="post-img position-relative overflow-hidden">
                <img src="admin/Upload/<?php echo $row['l_photo']; ?>" class="img-fluid" alt="">
                <span class="post-date">rating: <?php echo $row['l_rating']; ?></span>
              </div>

              <div class="post-content d-flex flex-column">

                
                <div class="meta d-flex align-items-center">
                  <div class="d-flex align-items-center">
                    <i class="bi bi-person"></i> <span class="ps-2"><?php echo $row['l_name']; ?></span>
                  </div>
                  <span class="px-3 text-black-50">/</span>
                  <div class="d-flex align-items-center">
                    <i class="bi bi-folder2"></i> <span class="ps-2"><?php echo $row['l_exp']; ?> year of expriance </span>
                  </div>
                </div>

                <p>
                language : <?php echo $row['l_lang']; ?>
                <br>
                State : <?php echo $row['l_state']; ?> 
                <br>
                City : <?php echo $row['l_city']; ?>
                <br>
                Mobile : <?php echo $row['l_number']; ?>
                <br>
                Per day wage : <?php echo $row['l_wage']; ?>
                <br>
</p>
 
                <hr>

                <a href="appointment.php?id=<?php echo $row['l_id']; ?>" class="readmore stretched-link"><span>Book Apointment</span><i class="bi bi-arrow-right"></i></a>

              </div>

            </div>
          </div><!-- End post list item -->
<!-- ends -->
<?php
                        }
                    }
                    else {
                        echo "No record found";
                    }

                    }
                    ?>
          
          
        </div><!-- End blog posts list -->

  

      </div>
    </section><!-- End Blog Section -->

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