<?php
include '../Config.php';
if (isset($_POST["submit"])) {
    $username = $_POST['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $pwdrepeat = $_POST["repeatPassword"];
    $password_encrypted = password_hash($password, PASSWORD_DEFAULT);
    try {
        $db = config::getConnexion();

        $query = $db->prepare('INSERT INTO client VALUES(NULL,:username,:name,:email,:password)');

        $query->bindValue(':username', $username, PDO::PARAM_STR);
        $query->bindValue(':name', $name, PDO::PARAM_STR);
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->bindValue(':password', $password_encrypted, PDO::PARAM_STR);

        $query->execute();
    } catch (PDOException $e) {
        $e->getMessage();
    }
}

header('Location: ../index.php');

?>