<?php
session_start();
unset($_SESSION['uemail']);
session_destroy();

echo "<script>window.open('index.php','_self')</script>";
exit;

?>