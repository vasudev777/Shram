
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

$id=$_SESSION['l_id'];
?>

<!-- main code -->
<!-- Breadcrumb Start -->
<div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="index.php">Home</a>
                    <span class="breadcrumb-item active">favorite list</span>
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
                    <?php      $sql1 = "SELECT *FROM items JOIN labour_fev_item ON items.i_id = labour_fev_item.item_id JOIN labour_details ON labour_fev_item.l_id = labour_details.l_id where labour_details.l_id='$id';";
                   // echo $sql1;
                    if ($result1 = mysqli_query($conn, $sql1)){
 ?>                   <?php
 if (mysqli_num_rows($result1) > 0){
                         while ($row1 = mysqli_fetch_assoc($result1)) { 
                     ?>  
                    <tr>
                    <td class="align-middle"><img src="../../admin/Upload/<?php echo $row1['i_photo']; ?>" alt="" style="width: 50px;"></td>
                            <td class="align-middle"><?php echo $row1['i_name']; ?></td>
                            <td class="align-middle">
                            <?php echo $row1['i_type']; ?>
                            </td>
                            <td class="align-middle"><?php echo $row1['i_amount']; ?></td>
                            <td><a href="fev_del.php?id=<?php echo $row1['fev_id']; ?>"><i class="fa fa-times"></i></a></td>
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
    
