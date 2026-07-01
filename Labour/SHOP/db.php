<?php
$conn = mysqli_connect(
    "sql309.infinityfree.com",  // hostname
    "if0_41838796",              // username
    "ReYfpsKureJ",             // jo password set kiya tha
    "if0_41838796_shram"         // database name
);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
