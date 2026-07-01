<?php
include('db.php');

    $bid = $_GET['id'];
    
?>
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
     <style>
     .container {
       }
       #number, #verificationcode {
       }
       #recaptcha-container {
       }
       #send, #verify {
           
       }
       .p-conf, .n-conf {
           display: none;
       }
       .n-conf {
       }
   </style>
   </head>
   
   <body>
   
   
   <!-- ======= Header ======= -->
   <?php include('header.php');
   if (is_null($_SESSION['cust_id'])) {
    echo "<script>alert('please Login First')</script>";
    header("location: index.php");

   }

   $cid = $_SESSION['cust_id'];

   ?>
   <!-- End Header -->
   
     <main id="main">
   
       <!-- ======= Breadcrumbs ======= -->
       <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/breadcrumbs-bg.jpg');">
         <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
   
           <h2>Appointment</h2>
           <ol>
             <li><a href="index.php">Home</a></li>
             <li><a href="labour.php">Builder</a></li>
             <li>Appointment</li>
           </ol>
   
         </div>
       </div><!-- End Breadcrumbs -->
       <section id="contact" class="contact">
     <center>
             <div class="col-lg-6">
             <div id="sender">
               <form action="build_Appointment_process.php" method="post"  class="form-control">
                 <div class="row gy-4">
                 <center>  
                 <div class="col-lg-8 form-group">
                   <input type="date" name="date"  class="form-control" placeholder="Your Name"   required>
                   <input type="text" name="bid" value="<?php echo $bid;  ?>" class="form-control" placeholder="Your Name"   hidden>
                   <input type="text" name="cid" value="<?php echo $cid;  ?>" class="form-control" placeholder="Your Name"   hidden>   
                </div>
                <br>
                <div class="col-lg-8 form-group">
                <textarea id="w3review" placeholder="Enter Your Notes" name="note" class="form-control" rows="4" cols="50" required>
</textarea>  
                </div>
                <br>
                
   
                </center>
                 </div><br>
                 <div class="text-center">
                 <input type="submit" value="Book Appointment" name="submit"  style="background-color:#fcbc04; outline: none;">
                 </div>
                 </div>
                  
       </form>
             </div><!-- End Contact Form -->
             </center>
         
   
         </div>
       </section><!-- End Contact Section -->
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

 
