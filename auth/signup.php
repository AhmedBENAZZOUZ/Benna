<?php
session_start();

include("../Config.php");


if (isset($_POST['submit'])) {
   //something was posted
   $username = $_POST['username'];
   $name = $_POST['name'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $passwordRepeat = $_POST["repeatPassword"];

   if (!empty($username) && !empty($name) && !empty($email) && !empty($password) && !empty($passwordRepeat) && ($password == $passwordRepeat)) {

      //save to database
      // $password_encrypted = password_hash($password, PASSWORD_DEFAULT);
      $query = "insert into users values (NULL,'$username','$name','$email','$password')";

      mysqli_query($con, $query);

      header("Location: ./Auth.php");
      die;
   } else {
      echo "Please enter some valid information!";
   }
}