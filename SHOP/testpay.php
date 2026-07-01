<!DOCTYPE html>
<html>
<head>
    <title>Razorpay Test</title>
</head>
<body>

<h2>Pay ₹90</h2>

<button id="pay-btn">Pay Now</button>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>

var options = {
    "key": "rzp_test_SnKUc2kJp777L7",
    "amount": "900",
    "currency": "INR",
    "name": "Shram",
    "description": "Test Payment",

    "handler": function (response){
        alert("Payment Successful");
        window.location.href="success1.php";
    }
};

var rzp1 = new Razorpay(options);

document.getElementById('pay-btn').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}

</script>

</body>
</html>