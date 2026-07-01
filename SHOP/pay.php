<?php
include('../db.php');
session_start();

// POST se data aaya check karo
if(isset($_POST['name'])) {
    $_SESSION['pay_name']    = $_POST['name'];
    $_SESSION['pay_email']   = $_POST['email'];
    $_SESSION['pay_number']  = $_POST['number'];
    $_SESSION['pay_address'] = $_POST['address'];
    $_SESSION['pay_city']    = $_POST['city'];
    $_SESSION['pay_state']   = $_POST['state'];
    $_SESSION['pay_total']   = $_POST['total'];
}

$name    = $_SESSION['pay_name']    ?? '';
$email   = $_SESSION['pay_email']   ?? '';
$number  = $_SESSION['pay_number']  ?? '';
$address = $_SESSION['pay_address'] ?? '';
$city    = $_SESSION['pay_city']    ?? '';
$state   = $_SESSION['pay_state']   ?? '';
$total   = $_SESSION['pay_total']   ?? 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shram - Payment</title>
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <style>
    .pay-box {
      max-width: 500px;
      margin: 50px auto;
      background: #fff;
      border-radius: 15px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
      padding: 35px 30px;
    }
    .pay-detail {
      background: #fff9e6;
      border-radius: 10px;
      padding: 15px 20px;
      margin-bottom: 20px;
      border-left: 4px solid #fcbc04;
    }
    .pay-detail p { margin: 6px 0; color: #555; font-size: 14px; }
    .btn-pay {
      background: #fcbc04;
      color: #000;
      font-weight: bold;
      border: none;
      padding: 14px;
      border-radius: 25px;
      width: 100%;
      font-size: 16px;
      cursor: pointer;
      transition: 0.3s;
    }
    .btn-pay:hover { background: #f0a500; }
  </style>
</head>
<body>

<?php include('navbar.php'); ?>

<div class="pay-box">
  <h3 style="text-align:center;color:#333;margin-bottom:20px;">💳 Complete Payment</h3>

  <!-- Order Summary -->
  <div class="pay-detail">
    <p>👤 <b>Name:</b> <?php echo $name; ?></p>
    <p>📧 <b>Email:</b> <?php echo $email; ?></p>
    <p>📱 <b>Number:</b> <?php echo $number; ?></p>
    <p>📍 <b>Address:</b> <?php echo $address; ?>, <?php echo $city; ?>, <?php echo $state; ?></p>
    <p style="font-size:17px;color:#000;margin-top:10px;">💰 <b>Total: ₹<?php echo $total; ?></b></p>
  </div>

  <!-- Pay Button -->
  <button class="btn-pay" id="rzp-button">
    🚀 Pay ₹<?php echo $total; ?> Now
  </button>

  <p style="text-align:center;margin-top:15px;font-size:12px;color:#aaa;">
    🔒 Secured by Razorpay
  </p>
</div>

<!-- Razorpay -->
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
var options = {
    key: "rzp_test_SnYyCiVFFiZhv3",
    amount: <?php echo $total * 100; ?>,
    currency: "INR",
    name: "Shram",
    description: "Shop Purchase",
    image: "https://shram.rf.gd/assets/img/favicon1.png",
    
 
    
    handler: function(response) {
        // Success — form submit karo
        var form = document.createElement('form');
        form.method = 'POST';
        form.action = 'payment_success.php';

        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'razorpay_payment_id';
        input.value = response.razorpay_payment_id;
        form.appendChild(input);

        document.body.appendChild(form);
        form.submit();
    },
    prefill: {
        name: "<?php echo addslashes($name); ?>",
        email: "<?php echo addslashes($email); ?>",
        contact: "<?php echo addslashes($number); ?>"
    },
    theme: { color: "#fcbc04" },
    modal: {
        ondismiss: function() {
            alert('Payment cancelled!');
        }
    }
};

var rzp = new Razorpay(options);

document.getElementById('rzp-button').onclick = function(e) {
    rzp.open();
    e.preventDefault();
};
</script>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
</body>
</html>