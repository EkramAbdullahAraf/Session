<?php
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        die("Invalid email format");
    }

    $profile_picture = $_FILES['profile_picture']['name'];
    $tmp_profile_picture = $_FILES['profile_picture']['tmp_name'];


    $timestamp = time();
    $profile_picture_filename = $timestamp . '_' . $profile_picture;


    move_uploaded_file($tmp_profile_picture, 'uploads/' . $profile_picture_filename);

    $data = array($name, $email, $profile_picture_filename);
    $file = fopen('users.csv', 'a');
    fputcsv($file, $data);
    fclose($file);

    session_start();
    setcookie('user', $name, time() + 3600);

    header("Location: display_users.php");
    exit;
}

