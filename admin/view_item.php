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
          <li class="breadcrumb-item active">Item</li>
          <li class="breadcrumb-item active">Item Details</li>
        </ol>
      </nav>
    </div>

    <!-- ✅ Delete process -->
    <?php
    if (isset($_GET['deleteid'])) {
        $delId  = $_GET['deleteid'];
        $delSql = "DELETE FROM items WHERE i_id='$delId'";
        if (mysqli_query($conn, $delSql)) {
            echo "<script>alert('Item Deleted Successfully!')</script>";
            echo "<script>window.location='view_item.php'</script>";
        } else {
            echo "<script>alert('Error Deleting Item!')</script>";
        }
    }
    ?>

    <section class="section dashboard">
      <div class="row">
        <div class="col-12">
          <div class="card top-selling overflow-auto">

            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start"><h6>Filter</h6></li>
                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body pb-0">
              <h5 class="card-title">Details</h5>

              <table class="table table-borderless">
                <thead>
                <?php
                  $sql = "SELECT * FROM items";
                  if ($result = mysqli_query($conn, $sql)) {
                    if (mysqli_num_rows($result) > 0) {
                ?>
                <tr>
                  <th scope="col">Photo</th>
                  <th scope="col">Name</th>
                  <th scope="col">Type</th>
                  <th scope="col">Amount</th>
                  <th scope="col">Rating</th>
                  <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                  <tr>
                    <th scope="row">
                      <img src="Upload/<?php echo $row['i_photo']; ?>" alt="" style="width:50px;height:50px;object-fit:cover;border-radius:8px;">
                    </th>
                    <td><?php echo $row['i_name']; ?></td>
                    <td><?php echo $row['i_type']; ?></td>
                    <td>₹<?php echo $row['i_amount']; ?></td>
                    <td><?php echo $row['i_rating']; ?></td>
                    <!-- ✅ Delete Button -->
                    <td>
                      <a href="javascript:void(0)"
                         onclick="confirmDelete(<?php echo $row['i_id']; ?>)">
                        <span class="badge bg-danger">Delete</span>
                      </a>
                    </td>
                  </tr>
                <?php } ?>
                </tbody>

                <?php
                  } else {
                    echo "<tr><td colspan='6' style='text-align:center;color:#aaa;padding:20px;'>No items found</td></tr>";
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

  <!-- ✅ Delete Confirm -->
  <script>
  function confirmDelete(id) {
    if (confirm("Are you sure you want to delete this item?")) {
      window.location = "view_item.php?deleteid=" + id;
    }
  }
  </script>

</body>
</html>