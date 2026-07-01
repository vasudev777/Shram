<?php 
include('db.php');
$product_id = $_GET['id'];
$sql1 = "SELECT * FROM `items` WHERE i_id='$product_id';";
if ($result1 = mysqli_query($conn, $sql1)){
?>                   <?php
if (mysqli_num_rows($result1) > 0){
     while ($row1 = mysqli_fetch_assoc($result1)) { 

?>


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



<!-- main code -->
<!-- Breadcrumb Start -->
<div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="index.php">Home</a>
                    <span class="breadcrumb-item active"><?php echo $row1['i_name']; ?></span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


     <!-- Shop Detail Start -->
     <div class="container-fluid pb-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 mb-30">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner bg-light">
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="../admin/Upload/<?php echo $row1['i_photo']; ?> " alt="Image">
                        </div>
                                            </div>
                   </div>
            </div>

            <div class="col-lg-7 h-auto mb-30">
                <div class="h-100 bg-light p-30">
                    <h3><?php echo $row1['i_name']; ?></h3>
                    <div class="d-flex mb-3">
                        <div class="text-primary mr-2">
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star-half-alt"></small>
                            <small class="far fa-star"></small>
                        </div>
                        <small class="pt-1">(99 Reviews)</small>
                    </div>
                    <h3 class="font-weight-semi-bold mb-4">Rs.<?php echo $row1['i_amount']; ?></h3>
                    <br><br><br>
                   <form action="add_cart.php" method="POST">
                    <div class="d-flex align-items-center mb-4 pt-2">
<input type="text" name="itemid" hidden value="<?php echo $row1['i_id']; ?>" >
<input type="text" name="itemprice" hidden value="<?php echo $row1['i_amount']; ?>" >
<input type="text" name="itemname" hidden value="<?php echo $row1['i_name']; ?>" >
<input type="text" name="itemphoto" hidden value="<?php echo $row1['i_photo']; ?>" >
<input type="text" name="itemtype" hidden value="<?php echo $row1['i_type']; ?>" > 
<button  type="submit" class="btn btn-primary px-3" name="submit"><i class="fa fa-shopping-cart mr-1"></i> Add To
                            Cart</button>
                    </div>
                    </form>
                    <div class="d-flex pt-2">
                        <strong class="text-dark mr-2">Share on:</strong>
                        <div class="d-inline-flex">
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-pinterest"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="bg-light p-30">
                    <div class="nav nav-tabs mb-4">
                        <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1">Description</a>
                        
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <h4 class="mb-3">Product Description</h4>
                            <p><?php echo $row1['i_note']; ?></p>
                             </div>
                 
               
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->
    <!-- main code -->

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
    
