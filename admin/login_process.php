<?php
 include('db.php');
 session_start();
 $username = $_POST['username'] ?? '';
 $password = $_POST['password'] ?? '';
 
 $stmt = mysqli_prepare($conn, "SELECT * FROM admin WHERE a_userid = ?");
 mysqli_stmt_bind_param($stmt, "s", $username);
 mysqli_stmt_execute($stmt);
 $result = mysqli_stmt_get_result($stmt);
 mysqli_stmt_close($stmt);
 
 if ($result && mysqli_num_rows($result) == 1) {
     $row = mysqli_fetch_assoc($result);
     
     // Authenticate using standard PHP BCrypt password_verify or fallback MD5 hex match
     $is_authenticated = false;
     if (password_verify($password, $row['a_password'])) {
         $is_authenticated = true;
     } elseif (md5($password) === $row['a_password']) {
         $is_authenticated = true;
         
         // Auto-upgrade MD5 hash to secure BCrypt hash in DB
         $new_hash = password_hash($password, PASSWORD_DEFAULT);
         $update_stmt = mysqli_prepare($conn, "UPDATE admin SET a_password = ? WHERE a_id = ?");
         mysqli_stmt_bind_param($update_stmt, "si", $new_hash, $row['a_id']);
         mysqli_stmt_execute($update_stmt);
         mysqli_stmt_close($update_stmt);
     }
     
     if ($is_authenticated) {
         $_SESSION['a_id'] = $row['a_id'];
         $_SESSION['a_name'] = $row['a_name'];
         $_SESSION['a_userid'] = $row['a_userid'];
         $_SESSION['a_password'] = $row['a_password'];
         header("location: index.php");
         exit;
     }
 }
 
 // Login failed
 echo "<script>alert('Invalid Username or Password')</script>";
 echo "<script>window.location='login.php'</script>";
?>
