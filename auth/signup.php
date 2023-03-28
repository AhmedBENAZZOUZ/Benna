<?php
include '../Config.php';
include '../classes/signup.class.php';
include '../classes/signup-contr.class.php';

if (isset($_POST["submit"])) {
    $username = $_POST['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordRepeat = $_POST["repeatPassword"];

    $signup = new SignupController($username,$name,$email,$password,$passwordRepeat);

    $signup->signupUser();

    header('Location: ../index.php');
}

// try {
//     $db = config::getConnexion();

//     $query = $db->prepare('INSERT INTO users VALUES(NULL,:username,:name,:email,:password)');

//     $query->bindValue(':username', $client->setusername($username), PDO::PARAM_STR);
//     $query->bindValue(':name', $name, PDO::PARAM_STR);
//     $query->bindValue(':email', $email, PDO::PARAM_STR);
//     $query->bindValue(':password', $password_encrypted, PDO::PARAM_STR);

//     $query->execute();
// } catch (PDOException $e) {
//     $e->getMessage();
// }


// This div is for error message : 

// $_SERVER['SCRIPT_NAME'];

// <div class="alert alert-warning alert-dismissible fade show" role="alert">
//   <strong>Holy guacamole!</strong> You should check in on some of those fields below.
//   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
//     <span aria-hidden="true">&times;</span>
//   </button>
// </div