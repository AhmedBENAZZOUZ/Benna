<?php
include '../Config.php';
if (isset($_POST["submit"])) {
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $password_encrypted = password_hash($password, PASSWORD_DEFAULT);
    try {
        $db = config::getConnexion();

        $query = $db->prepare('INSERT INTO client VALUES(NULL,:name,:dob,:email,:phone,:password)');

        $query->bindValue(':name', $name, PDO::PARAM_STR);
        $query->bindValue(':dob', $dob, PDO::PARAM_STR);
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->bindValue(':phone', $phone, PDO::PARAM_STR);
        $query->bindValue(':password', $password_encrypted, PDO::PARAM_STR);

        $query->execute();
    } catch (PDOException $e) {
        $e->getMessage();
    }
}

header('Location: ../index.php');

?>