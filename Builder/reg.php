<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Shram Builder</title>
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

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

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.php" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">Shram</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                    <p class="text-center small">Enter your personal details to create account</p>
                  </div>

                  <form class="row g-3 needs-validation" novalidate method="post" action="build_reg_process.php" enctype="multipart/form-data">
                    <div class="col-12">
                      <label for="yourName" class="form-label">Your Name</label>
                      <input type="text" name="name" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Please, enter your name!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourName" class="form-label">Your Number</label>
                      <input type="text" name="number" class="form-control" id="yourName" value="91" required>
                      <div class="invalid-feedback">Please, enter your Number!</div>
                    </div>


                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Your Email</label>
                      <input type="email" name="email" class="form-control" id="yourEmail" required>
                      <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                    </div>
                    <div class="col-12">
                      <label for="yourName" class="form-label">Your Experience</label>
                      <input type="text" name="exp_number" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Experience</div>
                    </div>


                    <div class="col-12">
                  <label for="inputNumber" class="form-label">Pincode</label>
                  <div class="col-sm-10">
                    <input type="text" name="pincode" id="pincode" class="form-control" required>
                  </div>
                </div>
                <div class="col-12">
                  <label for="inputNumber" class="form-label"></label>
                  <div class="col-sm-10">
                  <input type="button" class="btn btn-primary" value="Get Details" onclick="get_details()" required>
                  </div>
                </div>
                <div class="col-12">
                  <label for="inputNumber" class="form-label">state</label>
                  <div class="col-sm-10">
                    <input type="text" name="state"  id= "state" class="form-control" required>
                  </div>
                </div>
                <div class="col-12">
                  <label for="inputNumber" class="col-sm-2 col-form-label">City</label>
                  <div class="col-sm-10">
                    <input type="text" name="city" id="city" class="form-control" required>
                  </div>
                </div>
                <div class="col-12">
                      <label for="yourName" class="form-label">Your Landmark</label>
                      <input type="text" name="landmark" class="form-control" id="yourName" required>
                      </div>
                    <div class="col-12">
                      <label for="yourName" class="form-label">Your Password</label>
                      <input type="password" name="password" class="form-control" id="yourName" required>
                     </div>


                     <div class="row mb-3">
                  <label for="inputNumber" class="form-label">Profile Photo</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="formFile" name="photo" required>
                  </div>
                </div>

                     


                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                        <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                        <div class="invalid-feedback">You must agree before submitting.</div>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Create Account</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Already have an account? <a href="login.php">Log in</a></p>
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                Designed by Shram</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
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