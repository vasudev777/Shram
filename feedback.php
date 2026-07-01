<?PHP
include('db.php');



        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];
        //$photo = $_POST['photo'];

        // echo "$name";
        // echo  "<br>";
        // echo "$email";
        // echo  "<br>";
        // echo "$phone";
        // echo  "<br>";
        // echo "$message";
        // echo  "<br>";
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
$sql = "INSERT INTO cust_feedback(f_name,f_email,f_phone,f_message)values('$name','$email','$phone','$message')";
//echo $sql;
        if (mysqli_query($conn, $sql)) {
          echo "<script>alert('Thank You So Much For Feedback ! ')</script>";
          echo "<script>window.location='index.php'</script>";
        } else {
          echo "<script>alert('Feedback Not Submitted')</script>";
          echo "<script>window.location='index.php'</script>";
        }

  



?>