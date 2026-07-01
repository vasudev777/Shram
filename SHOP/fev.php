
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
                         <th>Details</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                    <?php      $sql1 = "SELECT *FROM items JOIN cust_fev_item ON items.i_id = cust_fev_item.item_id JOIN cust_details ON cust_fev_item.cust_id = cust_details.cust_id where cust_details.cust_id='$id';";
                   // echo $sql1;
                    if ($result1 = mysqli_query($conn, $sql1)){
 ?>                   <?php
 if (mysqli_num_rows($result1) > 0){
                         while ($row1 = mysqli_fetch_assoc($result1)) { 
                     ?>  
                    <tr>
                    <td class="align-middle"><img src="../admin/Upload/<?php echo $row1['i_photo']; ?>" alt="" style="width: 50px;"></td>
                            <td class="align-middle"><?php echo $row1['i_name']; ?></td>
                            <td class="align-middle">
                            <?php echo $row1['i_type']; ?>
                            </td>
                            <td class="align-middle"><?php echo $row1['i_amount']; ?></td>
                          <td><a href="fev_del.php?id=<?php echo $row1['fev_id']; ?>"><i class="fa fa-times"></i></a></td>
                        <td><a href="product_details.php?id=<?php echo $row1['item_id']; ?>"><i class="far fa-arrow-alt-circle-right"></i></a></td>
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
    
