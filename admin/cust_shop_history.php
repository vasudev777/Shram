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
      <h1>Customer Shop History</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Customer Shop History</li>
        </ol>
      </nav>
    </div>

    <section class="section dashboard">
      <div class="row">
        <div class="col-12">
          <div class="card recent-sales overflow-auto">
            <div class="card-body">
              <h5 class="card-title">Details</h5>

              <table class="table table-borderless datatable">
                <thead>
                <?php
                  // ✅ Teeno tables JOIN
                  $sql = "SELECT 
                            cust_details.cust_name,
                            cust_details.cust_number,
                            cust_details.cust_email,
                            cust_item_history.payment_id,
                            cust_item_history.payment_amount,
                            cust_item_history.payment_mode,
                            cust_item_history.payment_status,
                            cust_item_history.address,
                            cust_item_history.city,
                            cust_item_history.state,
                            cust_item_history.order_date,
                            cust_item_history.order_time,
                            items.i_name,
                            items.i_type,
                            items.i_amount,
                            items.i_photo
                          FROM cust_item_history
                          JOIN cust_details ON cust_details.cust_id = cust_item_history.cust_id
                          JOIN items ON items.i_id = cust_item_history.item_id
                          ORDER BY cust_item_history.order_date DESC, cust_item_history.order_time DESC";

                  if ($result = mysqli_query($conn, $sql)) {
                    if (mysqli_num_rows($result) > 0) {
                ?>
                <tr>
                  <th>Customer</th>
                  <th>Number</th>
                  <th>Email</th>
                  <th>Payment ID</th>
                  <th>Total Amount</th>
                  <th>Method</th>
                  <th>Address</th>
                  <th>Order Date</th>
                  <th>Order Time</th>
                  <th>Status</th>
                  <th>Item Photo</th>
                  <th>Item Name</th>
                  <th>Type</th>
                  <th>Item Price</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                  <tr>
                    <td><b><?php echo $row['cust_name']; ?></b></td>
                    <td><?php echo $row['cust_number']; ?></td>
                    <td><?php echo $row['cust_email']; ?></td>
                    <td><small><?php echo $row['payment_id']; ?></small></td>
                    <td><b>₹<?php echo $row['payment_amount']; ?></b></td>
                    <td><?php echo $row['payment_mode']; ?></td>
                    <td><?php echo $row['address'].', '.$row['city'].', '.$row['state']; ?></td>
                    <td><?php echo $row['order_date']; ?></td>
                    <td><?php echo $row['order_time']; ?></td>
                    <td><span class="badge bg-success"><?php echo $row['payment_status']; ?></span></td>
                    <td>
                      <img src="Upload/<?php echo $row['i_photo']; ?>"
                           alt="<?php echo $row['i_name']; ?>"
                           style="width:50px;height:50px;object-fit:cover;border-radius:8px;">
                    </td>
                    <td><?php echo $row['i_name']; ?></td>
                    <td><?php echo $row['i_type']; ?></td>
                    <td>₹<?php echo $row['i_amount']; ?></td>
                  </tr>
                <?php } ?>
                </tbody>

                <?php
                  } else {
                    echo "<tr><td colspan='14' style='text-align:center;color:#aaa;padding:20px;'>No records found</td></tr>";
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