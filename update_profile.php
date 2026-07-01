<?php include('header.php'); ?>
<?php
// DB se fresh data fetch karo
$cust_id = $_SESSION['cust_id'];
$sql     = "SELECT * FROM cust_details WHERE cust_id='$cust_id'";
$result  = mysqli_query($conn, $sql);
$row     = mysqli_fetch_assoc($result);

$name     = $row['cust_name'];
$number   = $row['cust_number'];
$email    = $row['cust_email'];
$state    = $row['cust_state'];
$city     = $row['cust_city'];
$address  = $row['cust_address'];
$landmark = $row['cust_landmark'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Shram - Update Profile</title>
  <link href="assets/img/favicon.png" rel="icon">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link href="assets/css/main.css" rel="stylesheet">
</head>
<body>

<main id="main">
  <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/breadcrumbs-bg.jpg');">
    <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
      <h2>Update Profile</h2>
      <ol>
        <li><a href="index.php">Home</a></li>
        <li><a href="profile.php">Profile</a></li>
        <li>Update Profile</li>
      </ol>
    </div>
  </div>

  <section id="contact" class="contact">
    <center>
      <div class="col-lg-6">
        <div id="sender">
          <form action="update_process.php" method="post" class="form-control">
            <div class="row gy-4">
              <center>

                <div class="col-lg-8 form-group"><br>
                  <label style="font-size:13px;color:#888;">Full Name</label>
                  <input type="text" name="name" class="form-control"
                         value="<?php echo $name; ?>" required>
                </div>

                <div class="col-lg-8 form-group"><br>
                  <label style="font-size:13px;color:#888;">Pincode (to update location)</label>
                  <input type="text" name="pincode" class="form-control"
                         placeholder="Enter Pincode" id="pincode">
                </div>

                <div class="col-lg-2 form-group"><br>
                  <input type="button" class="form-control"
                         value="Get Details" onclick="get_details()"
                         style="background-color:#fcbc04; outline:none;">
                </div>

                <div class="col-lg-8 form-group"><br>
                  <label style="font-size:13px;color:#888;">State</label>
                  <input type="text" name="state" class="form-control"
                         value="<?php echo $state; ?>" id="state">
                </div>

                <div class="col-lg-8 form-group"><br>
                  <label style="font-size:13px;color:#888;">City</label>
                  <input type="text" name="city" class="form-control"
                         value="<?php echo $city; ?>" id="city">
                </div>

                <div class="col-lg-8 form-group"><br>
                  <label style="font-size:13px;color:#888;">Address</label>
                  <input type="text" name="address" class="form-control"
                         value="<?php echo $address; ?>" required>
                </div>

                <div class="col-lg-8 form-group"><br>
                  <label style="font-size:13px;color:#888;">Landmark</label>
                  <input type="text" name="landmark" class="form-control"
                         value="<?php echo $landmark; ?>" required>
                </div>

                <div class="col-lg-8 form-group"><br>
                  <label style="font-size:13px;color:#888;">New Password <small>(leave blank to keep current)</small></label>
                  <input type="password" name="password" class="form-control"
                         placeholder="Enter new password">
                </div>

              </center>
            </div><br>
            <div class="text-center">
              <input type="submit" value="Update Profile"
                     style="background-color:#fcbc04; outline:none; border:none; padding:10px 30px; border-radius:25px; font-weight:bold; cursor:pointer;">
              &nbsp;&nbsp;
              <a href="profile.php" style="background-color:#eee; color:#333; padding:10px 25px; border-radius:25px; text-decoration:none; font-weight:bold;">Cancel</a>
            </div>
          </form>
        </div>
      </div>
    </center>
  </section>
</main>

<?php include('footer.php'); ?>
<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<div id="preloader"></div>

<script>
function get_details() {
  var pincode = jQuery('#pincode').val();
  if(pincode == '') {
    jQuery('#city').val('');
    jQuery('#state').val('');
  } else {
    jQuery.ajax({
      url: 'get_pincode.php',
      type: 'post',
      data: 'pincode=' + pincode,
      success: function(data) {
        if(data == 'no') {
          alert('Wrong Pincode');
          jQuery('#city').val('');
          jQuery('#state').val('');
        } else {
          var getData = $.parseJSON(data);
          jQuery('#city').val(getData.city);
          jQuery('#state').val(getData.state);
        }
      }
    });
  }
}
</script>

<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>