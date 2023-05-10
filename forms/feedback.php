<?php

include '../Config.php';

session_start();

$user_id = $_SESSION['id'];
$username = $_SESSION['username'];

$query = "SELECT * FROM `users` WHERE id = '$user_id';";
$select_profile = mysqli_query($con, $query);
$fetch_profile = mysqli_fetch_assoc($select_profile);
$email_user=$fetch_profile['email'];

if (!isset($user_id)) {
    header('location:../auth/Auth.php');
}
if (isset($_POST['submit'])) {
    $subject = $_POST['subject'];
  
    $message = $_POST['message'];
    $query_feed = "insert into feedback values (NULL,'$subject','$message','$email_user');";
    $feedback = mysqli_query($con, $query_feed);

    header('location:../index.php');
}