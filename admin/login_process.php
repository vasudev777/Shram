<?php
 include('db.php');
 session_start();
 $username = $_POST['username'] ?? '';
 $password = $_POST['password'] ?? '';
 
 $stmt = mysqli_prepare($conn, "SELECT * FROM admin WHERE a_userid = ? AND a_password = ?");
 mysqli_stmt_bind_param($stmt, "ss", $username, $password);
 mysqli_stmt_execute($stmt);
 $result = mysqli_stmt_get_result($stmt);
 mysqli_stmt_close($stmt);
 
 if (mysqli_num_rows($result) == 1) {
     while ($row = mysqli_fetch_array($result)) {
         $_SESSION['a_id'] = $row['a_id'];
         $_SESSION['a_name'] = $row['a_name'];
         $_SESSION['a_userid'] = $row['a_userid'];
         $_SESSION['a_password'] = $row['a_password'];
         header("location: index.php");
     }
 } else {
     echo "<script>alert('Error')</script>";
     echo "<script>window.location='login.php'</script>";
 } 
?>
