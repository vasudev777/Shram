<?PHP
include('db.php');
session_start();



if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $labourid=$_SESSION['l_id'];

        $sql = "SELECT * FROM labour_fev_item where item_id='$id'";
        // echo $sql; 
         
         
         $result = mysqli_query($conn, $sql);
         
         
             if (mysqli_num_rows($result) == 1) {
                echo "<script>alert('Item is already in Fevorite List !')</script>";
                echo "<script>window.location='index.php'</script>";
                die;


             }
       
$sql1 = "INSERT INTO `labour_fev_item` (`item_id`, `l_id`) VALUES ('$id', '$labourid');";
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