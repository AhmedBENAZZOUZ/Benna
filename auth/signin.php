<?php
include '../Config.php';
include '../classes/signin.class.php';
include '../classes/signin-contr.class.php';

if (isset($_POST["submit"])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
     
    $signin = new SigninController($username,$password);

    $signin->signinUser();

    header('Location: ../index.php?error=none');
}