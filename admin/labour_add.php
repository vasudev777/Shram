<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Shram-Admin</title>
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

  <?php include('header.php'); ?>
  <?php include('left_menu.php'); ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Add Labour</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Labour</li>
          <li class="breadcrumb-item active">Add Labour</li>
        </ol>
      </nav>
    </div>

    <section class="section">
      <div class="row">
        <div class="col-lg-8">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Labour Insertion</h5>

              <form action="labour_add_process.php" method="POST" enctype="multipart/form-data">

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Number</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="+91" name="number" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Language</label>
                  <div class="col-sm-10">
                    <input type="text" name="lang" class="form-control" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Pincode</label>
                  <div class="col-sm-10">
                    <input type="text" name="pincode" id="pincode" class="form-control" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <input type="button" class="btn btn-primary" value="Get Details" onclick="get_details()">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">State</label>
                  <div class="col-sm-10">
                    <input type="text" name="state" id="state" class="form-control" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">City</label>
                  <div class="col-sm-10">
                    <input type="text" name="city" id="city" class="form-control" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Wage</label>
                  <div class="col-sm-10">
                    <input type="text" name="wage" class="form-control" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Type</label>
                  <div class="col-sm-10">
                    <select class="form-select" name="type" required>
                      <option value="">Type Of Labour</option>
                      <option value="mason">Mason</option>
                      <option value="Carpentor">Carpentor</option>
                      <option value="Electrician">Electrician</option>
                      <option value="Plumber">Plumber</option>
                      <option value="Painter">Painter</option>
                      <option value="Welder">Welder</option>
                      <option value="Helper">Helper</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Experience</label>
                  <div class="col-sm-10">
                    <input type="text" name="exp" class="form-control" required>
                  </div>
                </div>

                <!-- ✅ Education — illiterate bydefault selected -->
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Education</label>
                  <div class="col-sm-10">
                    <select class="form-select" name="education" required>
                      <option value="illiterate" selected>Illiterate</option>
                      <option value="literate">Literate</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Rating</label>
                  <div class="col-sm-10">
                    <input type="text" name="rating" value="0" class="form-control" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Profile Photo</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" name="photo" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>

              </form>

            </div>
          </div>
        </div>
      </div>
    </section>

  </main>

  <?php include('footer.php') ?>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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

  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/js/main.js"></script>

</body>
</html>