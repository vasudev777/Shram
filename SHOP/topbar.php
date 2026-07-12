<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once('../db.php');
$id = $_SESSION['cust_id'] ?? 0;

$fev_count = 0;
$cart_count = 0;

if ($id > 0 && isset($conn)) {
    // Count Favorite items
    $query = "SELECT * FROM cust_fev_item where cust_id=$id";
    if ($result = mysqli_query($conn, $query)) {
        $fev_count = mysqli_num_rows($result);
        mysqli_free_result($result);
    }
    
    // Count Cart items
    $query = "SELECT * FROM cust_cart where cust_id=$id";
    if ($result = mysqli_query($conn, $query)) {
        $cart_count = mysqli_num_rows($result);
        mysqli_free_result($result);
    }
}
?>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-1 px-xl-5">
            
            <div class="col-lg-6 text-center text-lg-right">
                
                <div class="d-inline-flex align-items-center d-block d-lg-none">
                    <a href="fev.php" class="btn px-0 ml-2">
                        <i class="fas fa-heart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;"><?php echo $fev_count; ?></span>
                    </a>
                    <a href="cart.php" class="btn px-0 ml-2">
                        <i class="fas fa-shopping-cart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;"><?php echo $cart_count; ?></span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href="../index.php" class="text-decoration-none">
                    <span class="h1 text-uppercase text-primary bg-dark px-2">Shram</span>
                   
                </a>
            </div>
            <div class="col-lg-4 col-6 text-left">
                
            </div>
            
        </div>
    </div>
    <!-- Topbar End -->