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
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>

<?php include('header.php'); ?>
<?php include('left_menu.php'); ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Labour Details</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active">Labour</li>
      </ol>
    </nav>
  </div>

  <section class="section dashboard">
    <div class="row">
      <div class="col-12">
        <div class="card top-selling overflow-auto">
          <div class="card-body pb-0">
            <h5 class="card-title">Labour Details</h5>

            <table class="table table-borderless">
              <thead>
              <?php
                // Sirf email verified labour dikhao
                $sql    = "SELECT * FROM labour_details WHERE l_emailverify='1'";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0):
              ?>
              <tr>
                <th>Photo</th>
                <th>Name</th>
                <th>Number</th>
                <th>Type</th>
                <th>Education</th>
                <th>City</th>
                <th>Wage</th>
                <th>Operation</th>
              </tr>
              </thead>
              <tbody>
              <?php while($row = mysqli_fetch_assoc($result)): ?>
              <tr>
                <td>
                  <?php if(!empty($row['l_photo'])): ?>
                    <img src="Upload/<?php echo $row['l_photo']; ?>" style="width:45px;height:45px;border-radius:50%;object-fit:cover;">
                  <?php else: ?>
                    <i class="bi bi-person-circle" style="font-size:35px;color:#aaa;"></i>
                  <?php endif; ?>
                </td>
                <td><?php echo $row['l_name']; ?></td>
                <td><?php echo $row['l_number']; ?></td>
                <td><?php echo $row['l_type']; ?></td>
                <td><?php echo $row['l_education']; ?></td>
                <td><?php echo $row['l_city']; ?></td>
                <td>₹<?php echo $row['l_wage']; ?>/day</td>
                <td>
                  <?php if($row['l_approval'] == 0): ?>
                    <!-- Pending — Approve/Reject -->
                    <a href="labour_approval.php?approve=<?php echo $row['l_id']; ?>"
                       onclick="return confirm('Approve this labour?')"
                       class="badge bg-primary text-white text-decoration-none me-1">Approve</a>
                    <a href="labour_approval.php?reject=<?php echo $row['l_id']; ?>"
                       onclick="return confirm('Reject this labour?')"
                       class="badge bg-danger text-white text-decoration-none">Reject</a>

                  <?php elseif($row['l_approval'] == 1): 
                                       if($row['l_status'] == 0) { ?>
     <a href="labour_block.php?unblockid=<?php echo $row['l_id']; ?>"
       onclick="return confirm('Unblock this Labour?')"
       class="badge bg-success text-white text-decoration-none">Click for Unblock</a>
                    <?php } else { ?>
    <a href="labour_block.php?blockid=<?php echo $row['l_id']; ?>"
       onclick="return confirm('Block this Labour?')"
       class="badge bg-danger text-white text-decoration-none me-1">Click for Block</a>
  <?php } ?>

                  <?php endif; ?>
                </td>
              </tr>
              <?php endwhile; ?>
              </tbody>
              <?php else: ?>
              </thead>
              <tbody>
                <tr><td colspan="8" class="text-center py-3">No labour found</td></tr>
              </tbody>
              <?php endif; ?>
            </table>

          </div>
        </div>
      </div>
    </div>
  </section>

</main>

<?php include('footer.php'); ?>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
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