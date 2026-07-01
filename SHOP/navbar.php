
<?php  session_start();  
 include('../db.php');
?>

<div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                    <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                    <div class="navbar-nav w-100">
                        
                        <a href="mason.php" class="nav-item nav-link">Masonry</a>
                        <a href="welder.php" class="nav-item nav-link">Welding</a>
                        <a href="plumber.php" class="nav-item nav-link">Plumbing</a>
                        <a href="Carpentry.php" class="nav-item nav-link">Carpentry</a>
                        <a href="Painting.php" class="nav-item nav-link">Painting</a>
                        <a href="Electrician.php" class="nav-item nav-link">Electrician</a>
                        
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <span class="h1 text-uppercase text-dark bg-light px-2">Multi</span>
                        <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">Shop</span>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.php" class="nav-item nav-link active">Home</a>
                            <a href="cart.php" class="nav-item nav-link">Cart</a>
                            <a href="fev.php" class="nav-item nav-link">favorite</a>
                            
          <?php                  if (isset($_SESSION['uemail'])){ 
            $name=$_SESSION['cust_name'];  
            include('db.php');
            $id = $_SESSION['cust_id'];
            $sql = "SELECT * FROM cust_details where cust_id=$id";
//                    echo "$sql";
            if ($result = mysqli_query($conn, $sql)) {
                if (mysqli_num_rows($result) > 0) {

                    while ($row = mysqli_fetch_assoc($result)) {
                      $custid = $row['cust_id'];

                      $name = $row['cust_name'];
                      $number = $row['cust_number'];
                      $email = $row['cust_email'];
                      $state = $row['cust_state'];
                      $city = $row['cust_city'];
                      $address = $row['cust_address'];
                      $landmark = $row['cust_landmark'];
                      $password = $row['cust_password'];
                      $status = $row['cust_status'];
                      if($status == 0 )
                      {
                          
                          echo "<script>window.location='logout.php'</script>";  
                      } 
                    }
                } else {
                    echo "No record found";
                }

            }

            ?>
          
                            <a href="#" class="nav-item nav-link">Hello, <?php echo $name; ?></a>
                            <?php
          }
            else {
            
           echo "<script>window.location='../login.php'</script>";
               
            }

                        ?>

                    
          
                        </div>
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                            <a href="fev.php" class="btn px-0">
                                <i class="fas fa-heart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">
                                <?php
                                        $query = "SELECT * FROM cust_fev_item where cust_id=$id";
                                        $result = mysqli_query($conn, $query);
                                        if ($result) {
                                            // it return number of rows in the table.
                                            $row = mysqli_num_rows($result);

                                            echo $row;

                                            // close the result.
                                            mysqli_free_result($result);
                                        }?>
                            </span>
                            </a>
                            <a href="cart.php" class="btn px-0 ml-3">
                                <i class="fas fa-shopping-cart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">
                                <?php
                                        $query = "SELECT * FROM cust_cart where cust_id=$id";
                                        $result = mysqli_query($conn, $query);
                                        if ($result) {
                                            // it return number of rows in the table.
                                            $row = mysqli_num_rows($result);

                                            echo $row;

                                            // close the result.
                                            mysqli_free_result($result);
                                        }?>
                            </span>
                            </a>
                            
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    