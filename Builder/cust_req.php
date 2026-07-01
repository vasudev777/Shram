<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Shram-Builder</title>
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

  <?php 
  include('header.php');  
  $id = $_SESSION['b_id'];
  ?>

  <?php include('left_menu.php'); ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Customer Request</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Builder</li>
          <li class="breadcrumb-item active">Customer Request</li>
        </ol>
      </nav>
    </div>

    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">
        <div class="row gy-4">
          <div class="col-12">
            <div class="card recent-sales overflow-auto">
              <div class="card-body">
                <h5 class="card-title">Details</h5>

                <table class="table table-borderless datatable">
                  <thead>
                  <?php
                    // ✅ Sirf pending (0) aur accepted (1) dikhao — rejected (2) nahi
                    $sql = "SELECT * FROM build_details 
                            JOIN build_cust_book ON build_details.b_id = build_cust_book.b_id 
                            JOIN cust_details ON cust_details.cust_id = build_cust_book.cust_id 
                            WHERE build_details.b_id='$id' 
                            AND build_cust_book.build_book_status != '2'";

                    if ($result = mysqli_query($conn, $sql)) {
                      if (mysqli_num_rows($result) > 0) {
                  ?>
                    <tr>
                      <th scope="col">Name</th>
                      <th scope="col">Number</th>
                      <th scope="col">Email</th>
                      <th scope="col">City</th>
                      <th scope="col">Note</th>
                      <th scope="col">Date</th>
                      <th scope="col" colspan="2">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                      while ($row = mysqli_fetch_assoc($result)) {
                        $status = $row['build_book_status'];
                  ?>
                    <tr>
                      <th scope="row"><?php echo $row['cust_name']; ?></th>
                      <td><?php echo $row['cust_number']; ?></td>
                      <td><?php echo $row['cust_email']; ?></td>
                      <td><?php echo $row['cust_city']; ?></td>
                      <td><?php echo $row['build_book_note']; ?></td>
                      <td><?php echo $row['build_book_date']; ?></td>

                      <?php if ($status == '0') { ?>
                        <!-- ✅ Pending — dono buttons dikhao -->
                        <td>
                          <a href="javascript:void(0)" 
                             onclick="rejectRequest(<?php echo $row['build_book_id']; ?>)">
                            <span class="badge bg-danger">Reject</span>
                          </a>
                        </td>
                        <td>
                          <a href="cust_req_process.php?blockid=<?php echo $row['build_book_id']; ?>">
                            <span class="badge bg-success">Accept</span>
                          </a>
                        </td>

                      <?php } else if ($status == '1') { ?>
                        <!-- ✅ Accepted — sirf badge dikhao -->
                        <td colspan="2" style="text-align:center;">
                          <span class="badge bg-success">✅ Accepted</span>
                        </td>
                      <?php } ?>
                    </tr>
                  <?php } ?>
                  </tbody>

                  <?php
                    } else {
                      echo "<tr><td colspan='8' style='text-align:center;color:#aaa;padding:20px;'>No pending requests found</td></tr>";
                    }
                  }
                  ?>
                </table>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main>

  <?php include('footer.php') ?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i>
  </a>

  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/js/main.js"></script>

  <!-- ✅ Reject Popup Script -->
  <script>
  function rejectRequest(id) {
    var reason = prompt("Please enter reason for rejection:");

    if (reason === null) {
      // Cancel dabaya — kuch mat karo
      return;
    }

    if (reason.trim() === "") {
      alert("Please enter a reason!");
      return;
    }

    window.location = "cust_req_process.php?unblockid=" + id + "&reason=" + encodeURIComponent(reason);
  }
  </script>

</body>
</html>