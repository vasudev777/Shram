<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Shram-Admin</title>
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


<?php include('header.php'); ?>
<?php include('left_menu.php'); ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Builder Details</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active">Builder</li>
      </ol>
    </nav>
  </div>

  <section class="section dashboard">
    <div class="row">
      <div class="col-12">
        <div class="card top-selling overflow-auto">
          <div class="card-body pb-0">
            <h5 class="card-title">Builder Details</h5>

            <table class="table table-borderless">
              <thead>
              <?php
                $sql = "SELECT * FROM build_details WHERE b_emailverify='1'";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0):
              ?>
              <tr>
                <th>Photo</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Experience</th>
                <th>City</th>
          
             
                <th>Operation</th>
              </tr>
              </thead>
              <tbody>
              <?php while($row = mysqli_fetch_assoc($result)): ?>
              <tr>
                <td>
                  <?php if(!empty($row['b_photo'])): ?>
                    <img src="../admin/Upload/<?php echo $row['b_photo']; ?>" style="width:45px;height:45px;border-radius:50%;object-fit:cover;">
                  <?php else: ?>
                    <div style="width:45px;height:45px;border-radius:50%;background:#eee;display:flex;align-items:center;justify-content:center;">
                      <i class="bi bi-person" style="font-size:20px;color:#aaa;"></i>
                    </div>
                  <?php endif; ?>
                </td>
                <td><?php echo $row['b_name']; ?></td>
                <td><?php echo $row['b_email']; ?></td>
                <td><?php echo $row['b_number']; ?></td>
                <td><?php echo $row['b_experience']; ?> yrs</td>
                <td><?php echo $row['b_city']; ?></td>

           

                <!-- Approval + Block/Unblock -->
                <td>
                  <?php if($row['b_approval'] == 0): ?>
                    <!-- Pending Approval -->
                    <a href="builder_approval.php?approve=<?php echo $row['b_id']; ?>" 
                       onclick="return confirm('Approve this builder?')"
                       class="badge bg-primary text-white text-decoration-none">Approve</a>
                    &nbsp;
                    <a href="builder_approval.php?reject=<?php echo $row['b_id']; ?>"
                       onclick="return confirm('Reject this builder?')"
                       class="badge bg-danger text-white text-decoration-none">Reject</a>

 <?php elseif($row['b_approval'] == 1): 
                    if($row['b_status'] == 1) { ?>
     <a href="builder_block.php?unblockid=<?php echo $row['b_id']; ?>"
       onclick="return confirm('Unblock this builder?')"
       class="badge bg-success text-white text-decoration-none">Click for Unblock</a>
                    <?php } else { ?>
    <a href="builder_block.php?blockid=<?php echo $row['b_id']; ?>"
       onclick="return confirm('Block this builder?')"
       class="badge bg-danger text-white text-decoration-none me-1">Click for Block</a>
  <?php } ?>

  <?php endif; ?>
</td>

                <td></td>
              </tr>
              <?php endwhile; ?>
              </tbody>
              <?php else: ?>
              </thead>
              <tbody>
                <tr><td colspan="9" class="text-center">No builders found</td></tr>
              </tbody>
              <?php endif; ?>
            </table>

          </div>
        </div>
      </div>
    </div>
  </section>

</main>
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