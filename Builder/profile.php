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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <style>
    .profile-photo-box {
      width: 130px;
      height: 130px;
      border-radius: 50%;
      object-fit: cover;
      border: 4px solid #fcbc04;
      margin-bottom: 10px;
      display: block;
    }
    .profile-photo-placeholder {
      width: 130px;
      height: 130px;
      border-radius: 50%;
      background: #f0f0f0;
      border: 4px solid #fcbc04;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 10px;
    }
    .profile-photo-placeholder i {
      font-size: 60px;
      color: #aaa;
    }
  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <?php include('header.php') ?>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <?php include('left_menu.php') ?>
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <?php
          $sql = "SELECT * FROM build_details WHERE b_id='$id'";
          if ($result = mysqli_query($conn, $sql)) {
            if (mysqli_num_rows($result) > 0) {
          ?>

          <div class="card">
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>

            <!-- Name Box -->
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
              <h2><?php echo $row['b_name']; ?></h2>
              <h3>Builder</h3>
            </div>
          </div>

          <!-- ✅ Photo Box — Alag Card Neeche -->
          <div class="card mt-3">
            <div class="card-body d-flex flex-column align-items-center pt-4">
              <h5 class="card-title w-100">Profile Photo</h5>
              <?php if (!empty($row['b_photo'])) { ?>
                <img src="../admin/Upload/<?php echo $row['b_photo']; ?>"
                     alt="Profile Photo"
                     class="profile-photo-box">
              <?php } else { ?>
                <div class="profile-photo-placeholder">
                  <i class='bx bx-user'></i>
                </div>
              <?php } ?>
            </div>
          </div>

        </div>

        <div class="col-xl-8">
          <div class="card">
            <div class="card-body pt-3">

              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">
                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>
              </ul>

              <div class="tab-content pt-2">

                <!-- Overview Tab -->
                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Full Name</div>
                    <div class="col-lg-9 col-md-8"><?php echo $row['b_name']; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8"><?php echo $row['b_email']; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Number</div>
                    <div class="col-lg-9 col-md-8"><?php echo $row['b_number']; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Experience</div>
                    <div class="col-lg-9 col-md-8"><?php echo $row['b_experience']; ?> Years</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">State</div>
                    <div class="col-lg-9 col-md-8"><?php echo $row['b_state']; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">City</div>
                    <div class="col-lg-9 col-md-8"><?php echo $row['b_city']; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Landmark</div>
                    <div class="col-lg-9 col-md-8"><?php echo $row['b_landmark']; ?></div>
                  </div>
                </div>

                <!-- Edit Profile Tab -->
                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                  <form action="profile_update.php" method="POST" enctype="multipart/form-data">

                    <div class="row mb-3">
                      <label class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="name" type="text" class="form-control" value="<?php echo $row['b_name']; ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label class="col-md-4 col-lg-3 col-form-label">Experience</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="exp" type="text" class="form-control" value="<?php echo $row['b_experience']; ?>">
                      </div>
                    </div>

                    <!-- ✅ Photo Upload Field -->
                    <div class="row mb-3">
                      <label class="col-md-4 col-lg-3 col-form-label">Profile Photo</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="photo" type="file" class="form-control" accept="image/*">
                        <?php if (!empty($row['b_photo'])) { ?>
                          <small class="text-muted">Current: <?php echo $row['b_photo']; ?></small>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label class="col-md-4 col-lg-3 col-form-label">Pincode</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="text" name="pincode" id="pincode" class="form-control">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label class="col-md-4 col-lg-3 col-form-label"></label>
                      <div class="col-md-8 col-lg-9">
                        <input type="button" class="btn btn-primary" value="Get Details" onclick="get_details()">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label class="col-md-4 col-lg-3 col-form-label">State</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="text" class="form-control" name="state" id="state" value="<?php echo $row['b_state']; ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label class="col-md-4 col-lg-3 col-form-label">City</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="text" class="form-control" name="city" id="city" value="<?php echo $row['b_city']; ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label class="col-md-4 col-lg-3 col-form-label">Landmark</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="landmark" type="text" class="form-control" value="<?php echo $row['b_landmark']; ?>">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form>
                </div>

              <?php } ?>
              </div><!-- End Tab Content -->

            </div>
          </div>
        </div>

        <?php
          } else {
            echo "No record found";
          }
        }
        ?>

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include('footer.php') ?>
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

  <script>
    function get_details() {
      var pincode = jQuery('#pincode').val();
      if (pincode == '') {
        jQuery('#city').val('');
        jQuery('#state').val('');
      } else {
        jQuery.ajax({
          url: 'get_pincode.php',
          type: 'post',
          data: 'pincode=' + pincode,
          success: function(data) {
            if (data == 'no') {
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

</body>
</html>