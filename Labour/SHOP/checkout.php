
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Shop-Shram</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-1 px-xl-5">
            
            <div class="col-lg-6 text-center text-lg-right">
                
                <div class="d-inline-flex align-items-center d-block d-lg-none">
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-heart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-shopping-cart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href="" class="text-decoration-none">
                    <span class="h1 text-uppercase text-primary bg-dark px-2">Shram</span>
                   
                </a>
            </div>
            <div class="col-lg-4 col-6 text-left">
                
            </div>
            
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <?php include('navbar.php'); ?>
    <!-- Navbar End -->

<?php
if (isset($_POST['submit'])) {
    $total = $_POST['total'];
$id=$_SESSION['l_id'];

// echo $total;
// echo $id;
}
?>

<!-- main code -->
<!-- Breadcrumb Start -->
<div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="index.php">Home</a>
                    <span class="breadcrumb-item active">Checkout</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->



    <!-- main -->
 <!-- Checkout Start -->
 <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                
            <?php      $sql1 = "SELECT * FROM `labour_details` WHERE l_id='$id';";
              //  echo $sql1;
                    if ($result1 = mysqli_query($conn, $sql1)){
 ?>                   <?php
 if (mysqli_num_rows($result1) > 0){
                         while ($row1 = mysqli_fetch_assoc($result1)) { 
                     ?> 
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Billing Address</span></h5>
              
                <form action ="pay.php" method="POST">
                <div class="bg-light p-30 mb-5">
                    <div class="row">
                        
                        <div class="col-md-6 form-group">
                            <label>First Name</label>
                            <input class="form-control" type="text" name="name" value="<?php echo $row1['l_name']; ?>">
                        </div>
                   
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="text" name="email">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input class="form-control" type="text" name="number" value="<?php echo $row1['l_number']; ?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address  </label>
                            <input class="form-control" type="text" placeholder="address" name="address">
                        </div>
                  
                        <div class="col-md-6 form-group">
                            <label>City</label>
                            <input class="form-control" type="text" value="<?php echo $row1['l_city']; ?>" name="city">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>State</label>
                            <input class="form-control" type="text" value="<?php echo $row1['l_state']; ?>" name="state">
                        </div>
                   
                    
                    </div>
                </div>
                <?php
                        }
                    }
                    else {
                        echo "No record found";
                    }

                    }
                    ?>
            </div>
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Order Total</span></h5>
                
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom">
                        <h6 class="mb-3">Products</h6>
                        <?php      $sql1 = "SELECT * FROM `labour_cart` WHERE l_id='$id';";
                    if ($result1 = mysqli_query($conn, $sql1)){
 ?>                   <?php
 if (mysqli_num_rows($result1) > 0){
                         while ($row1 = mysqli_fetch_assoc($result1)) { 
                     ?>  
                        <div class="d-flex justify-content-between">
                        
                        <p><?php echo $row1['cart_name']; ?></p>
                            <p>Rs.<?php echo $row1['cart_amount']; ?></p>
                        </div>
                        <?php
                        }
                    }
                    else {
                        echo "No record found";
                    }

                    }
                    ?>
                    </div>
                    <div class="border-bottom pt-3 pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6>Rs
                            <?php
                                        //$query = "SELECT SUM(cart_amount)   FROM cust_cart   where cust_id='$id'; ";
                                        $sql = "SELECT SUM(cart_amount)   FROM labour_cart   where l_id='$id';";
                                        $result = $conn->query($sql);
                                        //display data on web page
                                        while($row = mysqli_fetch_array($result)){
                                          $sum=$row['SUM(cart_amount)'];
                                            echo  $row['SUM(cart_amount)'];
                                            echo "<br>";
                                        }
?>
                            </h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">Rs.50</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5>Rs.
                            <?php
                                $total= $sum + 50;
                                echo $total;
                                ?>
                            </h5>
                        </div>
                    </div>
                </div>
              
                <div class="mb-5">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Payment</span></h5>
                    <div class="bg-light p-30">
                    <input class="form-control" type="text" value="<?php echo $total ?>" name="total" hidden>

                        <button type="submit" name="submit" class="btn btn-block btn-primary font-weight-bold py-3" >Place Order</button>
                    </div>
                                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout End -->
    <!-- main -->

    

    <?php include('footer.php');   ?>

<!-- Back to Top -->
<a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Contact Javascript File -->
<script src="mail/jqBootstrapValidation.min.js"></script>
<script src="mail/contact.js"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script>
</body>

</html>
    
