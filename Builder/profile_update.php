<?php
include('db.php');
session_start();

$name     = $_POST['name'];
$exp      = $_POST['exp'];
$state    = $_POST['state'];
$city     = $_POST['city'];
$landmark = $_POST['landmark'];
$id       = $_SESSION['b_id'];

// Photo upload handle karo
$photo_update = "";
if(isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
    $photo_name     = $_FILES['photo']['name'];
    $photo_tmp      = $_FILES['photo']['tmp_name'];
    $photo_ext      = strtolower(pathinfo($photo_name, PATHINFO_EXTENSION));
    $allowed        = ['jpg', 'jpeg', 'png', 'gif'];

    if(in_array($photo_ext, $allowed)) {
        $new_photo_name = $id . '_' . time() . '.' . $photo_ext;
        $upload_path    = '../admin/Upload/' . $new_photo_name;

        if(move_uploaded_file($photo_tmp, $upload_path)) {
            $photo_update = ", `b_photo`='$new_photo_name'";
        }
    }
}

$sql = "UPDATE `build_details` SET 
        `b_name`='$name',
        `b_experience`='$exp',
        `b_state`='$state',
        `b_city`='$city',
        `b_landmark`='$landmark'
        $photo_update
        WHERE b_id='$id'";

if(mysqli_query($conn, $sql)) {
    // Session update karo
    $_SESSION['b_name']  = $name;
    $_SESSION['b_city']  = $city;
    $_SESSION['b_state'] = $state;

    echo "<script>alert('Profile Updated Successfully!'); window.location='profile.php';</script>";
} else {
    echo "<script>alert('Update Failed! Try again.'); window.location='profile.php';</script>";
}
?>