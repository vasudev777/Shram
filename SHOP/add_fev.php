<?PHP
include('db.php');
session_start();



if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $buildid=$_SESSION['b_id'];
  $cuid=$_SESSION['cust_id'];
        $sql = "SELECT * FROM cust_fev_item where item_id='$id' and cust_id='$cuid'";
        // echo $sql; 
         
       
         $result = mysqli_query($conn, $sql);
         
         
             if (mysqli_num_rows($result) == 1) {
                echo "<script>alert('Item is already in Fevorite List !')</script>";
                echo "<script>window.location='index.php'</script>";
                die;


             }
       
$sql1 = "INSERT INTO `cust_fev_item` (`item_id`, `cust_id`) VALUES ('$id', '$cuid');";
//echo $sql1;
        if (mysqli_query($conn, $sql1)) {
          echo "<script>alert('Added Into favorite ! ')</script>";
          echo "<script>window.location='fev.php'</script>";
        } else {
          echo "<script>alert('error')</script>";
            header("location:index.php");
        }

  


}
?>