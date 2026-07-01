<?php
include('db.php');
session_start();

$name  = $_POST['name'];
$wage  = $_POST['wage'];
$lang  = $_POST['lang'];
$type  = $_POST['type'];
$state = $_POST['state'];
$city  = $_POST['city'];
$phone = $_POST['phone'];
$id    = $_SESSION['l_id'];

// Photo upload handle karo
$photo_update = "";
if(isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
    $photo_name = $_FILES['photo']['name'];
    $photo_tmp  = $_FILES['photo']['tmp_name'];
    $photo_ext  = strtolower(pathinfo($photo_name, PATHINFO_EXTENSION));
    $allowed    = ['jpg', 'jpeg', 'png', 'gif'];

    if(in_array($photo_ext, $allowed)) {
        $new_photo_name = 'labour_' . $id . '_' . time() . '.' . $photo_ext;
        $upload_path    = '../admin/Upload/' . $new_photo_name;

        if(move_uploaded_file($photo_tmp, $upload_path)) {
            $photo_update = ", `l_photo`='$new_photo_name'";
        }
    }
}

$sql = "UPDATE `labour_details` SET 
        `l_name`='$name',
        `l_number`='$phone',
        `l_lang`='$lang',
        `l_state`='$state',
        `l_city`='$city',
        `l_wage`='$wage',
        `l_type`='$type'
        $photo_update
        WHERE l_id='$id'";

if(mysqli_query($conn, $sql)) {
    // Session update karo
    $_SESSION['l_name']  = $name;
    $_SESSION['l_city']  = $city;
    $_SESSION['l_state'] = $state;
    $_SESSION['l_type']  = $type;
    $_SESSION['l_wage']  = $wage;

    echo "<script>alert('Profile Updated Successfully!'); window.location='profile.php';</script>";
} else {
    echo "<script>alert('Update Failed! Try again.'); window.location='profile.php';</script>";
}
?>