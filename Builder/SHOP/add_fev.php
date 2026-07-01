<?PHP
include('db.php');
session_start();



if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $buildid=$_SESSION['b_id'];

        $sql = "SELECT * FROM build_fev_item where item_id='$id' and b_id='$buildid'";
        // echo $sql; 
         
         
         $result = mysqli_query($conn, $sql);
         
         
             if (mysqli_num_rows($result) == 1) {
                echo "<script>alert('Item is already in Fevorite List !')</script>";
                echo "<script>window.location='index.php'</script>";
                die;


             }
       
$sql1 = "INSERT INTO `build_fev_item` (`item_id`, `b_id`) VALUES ('$id', '$buildid');";
//echo $sql1;
        if (mysqli_query($conn, $sql1)) {
          echo "<script>alert('Added Into favorite ! ')</script>";
          echo "<script>window.location='index.php'</script>";
        } else {
          echo "<script>alert('error')</script>";
            header("location:index.php");
        }

  


}
?>