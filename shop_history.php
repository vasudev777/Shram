<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Shram</title>
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
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

<?php include('header.php'); ?>

<main id="main">

  <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/breadcrumbs-bg.jpg');">
    <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
      <h2>Shop History</h2>
      <ol>
        <li><a href="index.php">Home</a></li>
        <li>Customer</li>
        <li><a href="cust_history.php">History</a></li>
        <li>Shop History</li>
      </ol>
    </div>
  </div>

  <section id="services" class="services section-bg">
    <div class="container" data-aos="fade-up">
      <div class="row gy-4">
        <div class="col-12">
          <div class="card recent-sales overflow-auto">
            <div class="card-body">
              <table class="table table-borderless datatable">
                <thead>

                <?php
                $cust_id = $_SESSION['cust_id'];

                // Payment ID se group karo
                $sql = "SELECT * FROM cust_item_history WHERE cust_id='$cust_id' ORDER BY order_date DESC, order_time DESC";
                $result = mysqli_query($conn, $sql);

                $orders = [];
                while($row = mysqli_fetch_assoc($result)) {
                    $pid = $row['payment_id'];
                    if(!isset($orders[$pid])) {
                        $orders[$pid] = [
                            'payment_id'     => $row['payment_id'],
                            'payment_amount' => $row['payment_amount'],
                            'payment_mode'   => $row['payment_mode'],
                            'payment_status' => $row['payment_status'],
                            'address'        => $row['address'],
                            'city'           => $row['city'],
                            'state'          => $row['state'],
                            'order_date'     => $row['order_date'],
                            'order_time'     => $row['order_time'],
                            'items'          => []
                        ];
                    }
                    $orders[$pid]['items'][] = $row['item_id'];
                }

                if(count($orders) > 0):
                ?>

                <tr>
                  <th scope="col">Payment ID</th>
                  <th scope="col">Items</th>
                  <th scope="col">Amount</th>
                  <th scope="col">Mode</th>
                  <th scope="col">Date</th>
                  <th scope="col">Delivery</th>
                  <th scope="col">Status</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach($orders as $order):
                  // Items fetch karo
                  $itemNames = [];
                  foreach($order['items'] as $item_id) {
                      $ir   = mysqli_query($conn, "SELECT i_name FROM items WHERE i_id='$item_id'");
                      $itm  = mysqli_fetch_assoc($ir);
                      if($itm) $itemNames[] = $itm['i_name'];
                  }
                ?>
                <tr>
                  <td><?php echo $order['payment_id']; ?></td>
                  <td><?php echo implode(', ', $itemNames); ?></td>
                  <td>₹<?php echo $order['payment_amount']; ?></td>
                  <td><?php echo $order['payment_mode']; ?></td>
                  <td><?php echo date('d M Y', strtotime($order['order_date'])); ?></td>
                  <td><?php echo $order['city']; ?>, <?php echo $order['state']; ?></td>
                  <td>
                    <?php if($order['payment_status'] == 'Completed'): ?>
                      <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Paid</span>
                    <?php else: ?>
                      <span class="badge bg-warning"><i class="bi bi-clock me-1"></i> Pending</span>
                    <?php endif; ?>
                  </td>
                </tr>
                <?php endforeach; ?>

                </tbody>
                <?php else: ?>
                </thead>
                <?php endif; ?>

              </table>

              <?php if(count($orders) == 0): ?>
                <p style="text-align:center;color:#aaa;padding:30px;">No orders found!</p>
              <?php endif; ?>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</main>

<?php include('footer.php'); ?>

<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<div id="preloader"></div>

<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>