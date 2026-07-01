
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
    <?php include('topbar.php'); ?>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <?php include('navbar.php'); ?>
    <!-- Navbar End -->

<?php

$id=$_SESSION['cust_id'];
?>

<!-- main code -->
<!-- Breadcrumb Start -->
<div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="index.php">Home</a>
                    <span class="breadcrumb-item active">Cart</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


   


    <!-- main -->
    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                     
                    <tr>
                    <th>Photo</th>
                            <th>Products</th>
                            <th>type</th>
                            <th>Price</th>
                            
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                    <?php      $sql1 = "SELECT * FROM `cust_cart` WHERE cust_id='$id';";
                    if ($result1 = mysqli_query($conn, $sql1)){
 ?>                   <?php
 if (mysqli_num_rows($result1) > 0){
                         while ($row1 = mysqli_fetch_assoc($result1)) { 
                     ?>  
                    <tr>
                    <td class="align-middle"><img src="../admin/Upload/<?php echo $row1['cart_photo']; ?>" alt="" style="width: 50px;"></td>
                            <td class="align-middle"><?php echo $row1['cart_name']; ?></td>
                            <td class="align-middle">
                            <?php echo $row1['cart_type']; ?>
                            </td>
                            <td class="align-middle"><?php echo $row1['cart_amount']; ?></td>
                            <td><a href="cart_del.php?id=<?php echo $row1['item_id']; ?>"><i class="fa fa-times"></i></a></td>
                        </tr>
                        <?php
                        }
                    }
                    else {
                        echo "No record found";
                    }

                    }
                    ?>

                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
              
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6>Rs.
                            <?php
                                        //$query = "SELECT SUM(cart_amount)   FROM cust_cart   where cust_id='$id'; ";
                                        $sql = "SELECT SUM(cart_amount)   FROM cust_cart   where cust_id='$id';";
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
                            <form method="post" action= "checkout.php">
                            <h5>
                                <?php
                                $total= $sum + 50;
                                echo $total;
                                ?>
                            </h5>
                            <input type="text" name="total" hidden value="<?php echo $total ?>">
                        </div>
                        <button type="submit" name="submit" class="btn btn-block btn-primary font-weight-bold my-3 py-3">Proceed To Checkout</button>
                        </form>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->

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
    
