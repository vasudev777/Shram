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




    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->


    <!-- Categories Start -->
    <div class="container-fluid pt-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Categories</span></h2>
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="mason.php">
                    <div class="cat-item d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <img class="img-fluid" src="img/workers.png" alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>Masonry</h6>
                            <small class="text-body">
                            <?php
                                        $query = "SELECT * FROM items where i_type='mason'";
                                        $result = mysqli_query($conn, $query);
                                        if ($result) {
                                            // it return number of rows in the table.
                                            $row = mysqli_num_rows($result);

                                            echo $row;

                                            // close the result.
                                            mysqli_free_result($result);
                                        }

                                        ?> Products</small>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="welder.php">
                    <div class="cat-item img-zoom d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <img class="img-fluid" src="img/4310807.png" alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>Welding</h6>
                            <small class="text-body">
                            <?php
                                        $query = "SELECT * FROM items where i_type='welder'";
                                        $result = mysqli_query($conn, $query);
                                        if ($result) {
                                            // it return number of rows in the table.
                                            $row = mysqli_num_rows($result);

                                            echo $row;

                                            // close the result.
                                            mysqli_free_result($result);
                                        }

                                        ?> Products</small>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="plumber.php">
                    <div class="cat-item img-zoom d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <img class="img-fluid" src="img/1995507.png" alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>Plumbing</h6>
                            <small class="text-body">
                            <?php
                                        $query = "SELECT * FROM items where i_type='plumber'";
                                        $result = mysqli_query($conn, $query);
                                        if ($result) {
                                            // it return number of rows in the table.
                                            $row = mysqli_num_rows($result);

                                            echo $row;

                                            // close the result.
                                            mysqli_free_result($result);
                                        }

                                        ?> Products</small>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="Carpentry.php">
                    <div class="cat-item img-zoom d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <img class="img-fluid" src="img/carpenter.png" alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>Carpentry</h6>
                            <small class="text-body">
                            <?php
                                        $query = "SELECT * FROM items where i_type='carpentor'";
                                        $result = mysqli_query($conn, $query);
                                        if ($result) {
                                            // it return number of rows in the table.
                                            $row = mysqli_num_rows($result);

                                            echo $row;

                                            // close the result.
                                            mysqli_free_result($result);
                                        }

                                        ?> Products</small>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="Painting.php">
                    <div class="cat-item img-zoom d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <img class="img-fluid" src="img/painter.png" alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>Painting</h6>
                            <small class="text-body">
                            <?php
                                        $query = "SELECT * FROM items where i_type='painter'";
                                        $result = mysqli_query($conn, $query);
                                        if ($result) {
                                            // it return number of rows in the table.
                                            $row = mysqli_num_rows($result);

                                            echo $row;

                                            // close the result.
                                            mysqli_free_result($result);
                                        }

                                        ?>
                                 Products</small>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="Electrician.php">
                    <div class="cat-item img-zoom d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <img class="img-fluid" src="img/electrician.png" alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>Electrician</h6>
                            <small class="text-body">
                                  <?php
                                        $query = "SELECT * FROM items where i_type='Electrician'";
                                        $result = mysqli_query($conn, $query);
                                        if ($result) {
                                            // it return number of rows in the table.
                                            $row = mysqli_num_rows($result);

                                            echo $row;

                                            // close the result.
                                            mysqli_free_result($result);
                                        }

                                        ?>
                                Products</small>
                        </div>
                    </div>
                </a>
            </div>
            
        </div>
    </div>
    <!-- Categories End -->


    <!-- Products Start -->
   

  

   

    

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