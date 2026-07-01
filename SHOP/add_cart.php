<?PHP
include('db.php');
session_start();



if (isset($_POST['submit'])) {
        $itemid = $_POST['itemid'];
        $itemname = $_POST['itemname'];
        $itemamount = $_POST['itemprice'];
        $itemphoto = $_POST['itemphoto'];
        $itemtype = $_POST['itemtype'];
        //$photo = $_POST['photo'];

        $name=$_SESSION['cust_name'];
        // echo "$name";
        // echo  "<br>";
         $id=$_SESSION['cust_id'];
        // echo "$id";
        // echo  "<br>";


        $sql = "SELECT * FROM cust_cart where item_id='$itemid' and cust_id='$id'";
        // echo $sql; 
         
         
         $result = mysqli_query($conn, $sql);
         
         
             if (mysqli_num_rows($result) == 1) {
                echo "<script>alert('Item is already in Cart !')</script>";
                echo "<script>window.location='index.php'</script>";
                die;
        
             }
       
$sql1 = "INSERT INTO `cust_cart` (`item_id`, `cust_id`, `cart_name`, `cart_amount`, `cart_photo`, `cart_type`) VALUES ('$itemid', '$id', '$itemname', '$itemamount', '$itemphoto', '$itemtype');";
//echo $sql1;
        if (mysqli_query($conn, $sql1)) {
          echo "<script>alert('Added Into Cart ! ')</script>";
          echo "<script>window.location='index.php'</script>";
        } else {
          echo "<script>alert('error')</script>";
            header("location:index.php");
        }

  


}
?>