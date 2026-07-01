<?PHP
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['a_id'])) {
    header("location: login.php");
    exit;
}

include('db.php');

if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $type = $_POST['type'];
        $amount = $_POST['amt'];
        $note = $_POST['note'];
        //$photo = $_POST['photo'];

        // echo "$name";
        // echo  "<br>";
        // echo "$type";
        // echo  "<br>";
        // echo "$amount";
        // echo  "<br>";
        // echo "$note";
        // echo  "<br>";
        // // echo "$city";
        // echo  "<br>";
        // echo "$wage";
        // echo  "<br>";
        // echo "$type";
        // echo  "<br>";
        // echo "$education";
        // echo  "<br>";
        // echo "$rating";
        // echo  "<br>";
        // //echo "$photo";
        // echo  "<br>";

        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES["photo"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
          $check = getimagesize($_FILES["photo"]["tmp_name"]);
          if($check !== false) {
           // echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
          } else {
            echo "File is not an image.";
            $uploadOk = 0;
          }
        }
        
        // Check if file already exists
        if (file_exists($target_file)) {
          echo "Sorry, file already exists.";
          $uploadOk = 0;
        }
        
        // Check file size
        if ($_FILES["photo"]["size"] > 500000) {
          echo "Sorry, your file is too large.";
          $uploadOk = 0;
        }
        
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
          echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
          $uploadOk = 0;
        }
        
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
          echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
          if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
           // echo "The file ". htmlspecialchars( basename( $_FILES["photo"]["name"])). " has been uploaded.";
          } else {
            echo "Sorry, there was an error uploading your file.";

          }
        }
 $image = htmlspecialchars( basename( $_FILES["photo"]["name"]));

$sql = "INSERT INTO items(i_name,i_type,i_amount,i_note,i_photo,i_rating)values ('$name','$type','$amount','$note','$image','1')";
//echo $sql;
        if (mysqli_query($conn, $sql)) {
          echo "<script>alert('data Inserted')</script>";
          echo "<script>window.location='add_item.php'</script>";
        } else {
          echo "<script>alert('data Not Inserted')</script>";
            header("location:add_item.php");
        }

  


 }
?>