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
<?php include('header.php'); ?>
<!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/breadcrumbs-bg.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2>Registration</h2>
        <ol>
          <li><a href="index.php">Home</a></li>
          <li>Sign-Up</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->
    <section id="contact" class="contact">
  <center>
          <div class="col-lg-6">
          <div id="sender">
            <form action="cust_reg_process.php" method="post"  class="form-control">
              <div class="row gy-4">
              <center>  
              <div class="col-lg-8 form-group">
                <input type="text" name="name"  class="form-control" placeholder="Your Name"   required>  
             </div>
             <br>
             <div class="col-lg-8 form-group">
                <input type="text" name="number"  class="form-control" placeholder="Your Number"  value="+91" required>  
             </div>
             <br>
             <div class="col-lg-8 form-group">
                <input type="email" name="email"  class="form-control" placeholder="Your Email"  required>  
             </div>
             
<br>

             <div class="col-lg-8 form-group">
             
             <input type="text" name="pincode"  class="form-control" placeholder="Your Pincode"  id="pincode" required>
                  
             </div>
             <br>
             <div class="col-lg-2 form-group">
                
             <input type="button" class="form-control" value="Get Details" onclick="get_details()" style="background-color:#fcbc04; outline: none;" required>  
             </div>
<br>
                   <div class="col-lg-8 form-group">
                <input type="text" name="state"  class="form-control" placeholder="Your state" id="state">  
             </div>
             <br>
             <div class="col-lg-8 form-group">
                <input type="text" name="city"  class="form-control" placeholder="Your City" id="city" >  
             </div>
<br>
             <div class="col-lg-8 form-group">
                <input type="text" name="address"  class="form-control" placeholder="Your Address" id="city"  required>  
             </div>
<br>
             <div class="col-lg-8 form-group">
                <input type="text" name="landmark"  class="form-control" placeholder="Your Landmark" id="city"  required>  
             </div>
<br>
<div class="col-lg-8 form-group">
                <input type="password" name="password"  class="form-control" placeholder="Your Password" id="city"  required>  
             </div>


             </center>
             <div id="recaptcha-container"></div>
              </div><br>
              <div class="text-center">
              <input type="submit" value="Send OTP"  style="background-color:#fcbc04; outline: none;">
              &nbsp&nbsp&nbsp&nbsp&nbsp<a href="login.php"><input type="button" value="Sign-In" style="background-color:#fcbc04; outline: none;"></a>
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

  <script>
function get_details(){
	var pincode=jQuery('#pincode').val();
	if(pincode==''){
		jQuery('#city').val('');
		jQuery('#state').val('');
	}else{
		jQuery.ajax({
			url:'get_pincode.php',
			type:'post',
			data:'pincode='+pincode,
			success:function(data){
				if(data=='no'){
					alert('Wrong Pincode');
					jQuery('#city').val('');
					jQuery('#state').val('');
				}else{
					var getData=$.parseJSON(data);
					jQuery('#city').val(getData.city);
					jQuery('#state').val(getData.state);
				}
			}
		});
	}
}
</script>
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