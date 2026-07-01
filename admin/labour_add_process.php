<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['a_id'])) {
    header("location: login.php");
    exit;
}

include('db.php');

if (isset($_POST['submit'])) {
    $name      = mysqli_real_escape_string($conn, $_POST['name']);
    $number    = mysqli_real_escape_string($conn, $_POST['number']);
    $lang      = mysqli_real_escape_string($conn, $_POST['lang']);
    $state     = mysqli_real_escape_string($conn, $_POST['state']);
    $city      = mysqli_real_escape_string($conn, $_POST['city']);
    $wage      = mysqli_real_escape_string($conn, $_POST['wage']);
    $type      = mysqli_real_escape_string($conn, $_POST['type']);
    $exp       = mysqli_real_escape_string($conn, $_POST['exp']);
    $education = mysqli_real_escape_string($conn, $_POST['education']);
    $rating    = mysqli_real_escape_string($conn, $_POST['rating']);

    // ✅ Bydefault values
    $l_status      = 1;
    $l_emailverify = 1;
    $l_approval    = 1;
    $l_email       = '';
    $l_password    = '';
    $l_token       = '';

    // ✅ Photo upload
    $target_dir    = "Upload/";
    $target_file   = $target_dir . basename($_FILES["photo"]["name"]);
    $uploadOk      = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["photo"]["tmp_name"]);
    if ($check === false) {
        echo "<script>alert('File is not an image!')</script>";
        $uploadOk = 0;
    }

    if (file_exists($target_file)) {
        $target_file = $target_dir . time() . '_' . basename($_FILES["photo"]["name"]);
    }

    if ($_FILES["photo"]["size"] > 500000) {
        echo "<script>alert('File too large! Max 500KB allowed.')</script>";
        $uploadOk = 0;
    }

    if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
        echo "<script>alert('Only JPG, JPEG, PNG & GIF allowed!')</script>";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "<script>alert('File upload failed!'); window.location='labour_add.php';</script>";
    } else {
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
            $image = basename($target_file);

            $sql = "INSERT INTO labour_details 
                    (l_name, l_number, l_lang, l_state, l_city, l_wage, l_type, l_exp, l_education, l_rating, l_photo, l_email, l_status, l_password, l_emailverify, l_approval, l_token)
                    VALUES 
                    ('$name', '$number', '$lang', '$state', '$city', '$wage', '$type', '$exp', '$education', '$rating', '$image', '$l_email', '$l_status', '$l_password', '$l_emailverify', '$l_approval', '$l_token')";

            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Labour Added Successfully! ✅'); window.location='labour_add.php';</script>";
            } else {
                echo "<script>alert('Error: " . mysqli_error($conn) . "'); window.location='labour_add.php';</script>";
            }
        } else {
            echo "<script>alert('Error uploading file!'); window.location='labour_add.php';</script>";
        }
    }
}
?>