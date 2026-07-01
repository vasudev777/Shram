<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Shram-Admin</title>
  <link href="assets/img/favicon.png" rel="icon">
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>

  <?php include('header.php'); ?>
  <?php include('left_menu.php'); ?>

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Labour - Builder Booking History</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Labour Builder History</li>
        </ol>
      </nav>
    </div>

    <section class="section dashboard">
      <div class="row">
        <div class="col-12">
          <div class="card recent-sales overflow-auto">
            <div class="card-body">
              <h5 class="card-title">Labour - Builder Booking Details</h5>
              <table class="table table-borderless datatable">
                <thead>
                <?php
                  $sql = "SELECT
                            labour_details.l_name, labour_details.l_type,
                            labour_details.l_wage, labour_details.l_number,
                            labour_details.l_city,
                            build_details.b_name, build_details.b_number,
                            build_details.b_email, build_details.b_city,
                            build_details.b_experience,
                            build_labour_book.build_labour_book_id,
                            build_labour_book.build_labour_book_date,
                            build_labour_book.build_labour_book_note,
                            build_labour_book.build_labour_book_status
                          FROM build_labour_book
                          JOIN labour_details ON labour_details.l_id = build_labour_book.l_id
                          JOIN build_details ON build_details.b_id = build_labour_book.b_id
                          ORDER BY labour_details.l_name ASC, build_labour_book.build_labour_book_date DESC";

                  if ($result = mysqli_query($conn, $sql)) {
                    if (mysqli_num_rows($result) > 0) {
                ?>
                <tr>
                  <th>Labour Name</th>
                  <th>Labour Type</th>
                  <th>Wage/Day</th>
                  <th>Labour Number</th>
                  <th>Labour City</th>
                  <th>Builder Name</th>
                  <th>Builder Number</th>
                  <th>Builder Email</th>
                  <th>Builder City</th>
                  <th>Experience</th>
                  <th>Date</th>
                  <th>Note</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  while ($row = mysqli_fetch_assoc($result)) {
                    if ($row['build_labour_book_status'] == 0) {
                      $badge = 'bg-warning'; $status = 'Pending';
                    } else if ($row['build_labour_book_status'] == 1) {
                      $badge = 'bg-success'; $status = 'Accepted';
                    } else {
                      $badge = 'bg-danger'; $status = 'Rejected';
                    }
                ?>
                  <tr>
                    <td><b><?php echo $row['l_name']; ?></b></td>
                    <td><?php echo $row['l_type']; ?></td>
                    <td>₹<?php echo $row['l_wage']; ?>/day</td>
                    <td><?php echo $row['l_number']; ?></td>
                    <td><?php echo $row['l_city']; ?></td>
                    <td><b><?php echo $row['b_name']; ?></b></td>
                    <td><?php echo $row['b_number']; ?></td>
                    <td><?php echo $row['b_email']; ?></td>
                    <td><?php echo $row['b_city']; ?></td>
                    <td><?php echo $row['b_experience']; ?> yrs</td>
                    <td><?php echo $row['build_labour_book_date']; ?></td>
                    <td><?php echo $row['build_labour_book_note']; ?></td>
                    <td><span class="badge <?php echo $badge; ?>"><?php echo $status; ?></span></td>
                  </tr>
                <?php } ?>
                </tbody>
                <?php
                  } else {
                    echo "<tr><td colspan='13' style='text-align:center;color:#aaa;padding:20px;'>No records found</td></tr>";
                  }
                }
                ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main>
  <?php include('footer.php') ?>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>