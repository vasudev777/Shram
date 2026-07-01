<?php
session_start();
unset($_SESSION['b_id']);
session_destroy();

echo "<script>window.open('login.php','_self')</script>";
exit;

?>l