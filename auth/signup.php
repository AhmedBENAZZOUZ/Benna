<?php
session_start();

include("../Config.php");

if (isset($_POST['submit'])) {
   //Assign the variables
   $username = $_POST['username'];
   $name = $_POST['name'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];
   $adress = $_POST['adress'];
   $password = $_POST['password'];
   $passwordRepeat = $_POST["repeatPassword"];
   //Hashing the password
   $password_encrypted = md5($password);
   // empty input control
   if (emptyInput($username, $name, $email, $phone, $adress, $password, $passwordRepeat) == false) {
      header("location: ./Auth.php?error=Must fill All fields");
      exit();
   }
   // input control : invalid username when it has number or special caracteres
   if (invalidUsername($username) == false) {
      header("location: ./Auth.php?error=Your username is invalid");
      exit();
   }
   // email input control
   if (invalidEmail($email) == false) {
      header("location: ./Auth.php?error=Your email is invalid");
      exit();
   }
   // input control : invalid phone
   if (invalidPhone($phone) == false) {
      header("location: ./Auth.php?error=This number phone is invalid");
      exit();
   }
   // input control : password and password repeat don't match
   if (passwordMatch($password, $passwordRepeat) == false) {
      header("location: ./Auth.php?error=Password don't Match");
      exit();
   }
   // input control : when the username already exists 
   if (usernameTaken($con, $username) == false) {
      header("location: ./Auth.php?error=This username already exists");
      exit();
   }
   // input control : when the email already exists
   if (emailTaken($con, $email) == false) {
      header("location: ./Auth.php?error=This email already in use");
      exit();
   }

   if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
      $image = $_FILES['image']['name'];
      $image_tmp_name = $_FILES['image']['tmp_name'];
      $image_size = $_FILES['image']['size'];
      $image_folder = '../assets/img/profile/' . $image;

      if($image_size > 2000000){
         header("Location: ./Auth.php?error=Image size too large");
         die;
      }

      $query = "insert into users (id,username,name,email,phone,adress,password,image) values (NULL,'$username','$name','$email','$phone','$adress','$password_encrypted','$image')";
      
      if (mysqli_query($con, $query)) {
         move_uploaded_file($image_tmp_name, $image_folder);
         header("Location: ./Auth.php?success=Account created successfully");
         die;
      }
   } else {
      $default_img = 'default.png';
      $query = "insert into users (id,username,name,email,phone,adress,password,image) values (NULL,'$username','$name','$email','$phone','$adress','$password_encrypted','$default_img')";

      if (mysqli_query($con, $query)) {
         header("Location: ./Auth.php?success=Account created successfully");
         die;
      }
   }
}

function emptyInput($username, $name, $email, $phone, $adress, $password, $passwordRepeat)
{
   if (empty($username) || empty($name) || empty($email) || empty($phone) || empty($adress) || empty($password) || empty($passwordRepeat)) {
      $result = false;
   } else {
      $result = true;
   }

   return $result;
}

function invalidUsername($username)
{
   if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
      $result = false;
   } else {
      $result = true;
   }
   return $result;
}

function invalidEmail($email)
{
   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $result = false;
   } else {
      $result = true;
   }
   return $result;
}

function invalidPhone($phone)
{
   if (!preg_match("/[0-9]*/", $phone)) {
      $result = false;
   } else {
      $result = true;
   }
   return $result;
}

function passwordMatch($password, $passwordRepeat)
{
   if ($password !== $passwordRepeat) {
      $result = false;
   } else {
      $result = true;
   }
   return $result;
}

function usernameTaken($con, $username)
{
   $stmt = mysqli_prepare($con, "SELECT username FROM users WHERE username = ?;");
   mysqli_stmt_bind_param($stmt, "s", $username);
   if (!mysqli_stmt_execute($stmt)) {
      $stmt = null;
      header("location: ../index.php?error=stmtfailed");
      exit();
   }
   $result = mysqli_stmt_get_result($stmt);
   $rowCount = mysqli_num_rows($result);
   if ($rowCount > 0) {
      $resultCheck = false;
   } else {
      $resultCheck = true;
   }
   return $resultCheck;
}

function emailTaken($con, $email)
{

   $stmt = mysqli_prepare($con, "SELECT username FROM users WHERE  email = ?;");
   mysqli_stmt_bind_param($stmt, "s", $email);
   if (!mysqli_stmt_execute($stmt)) {
      $stmt = null;
      header("location: ../index.php?error=stmtfailed");
      exit();
   }
   $result = mysqli_stmt_get_result($stmt);
   $rowCount = mysqli_num_rows($result);
   if ($rowCount > 0) {
      $resultCheck = false;
   } else {
      $resultCheck = true;
   }
   return $resultCheck;
}