<?php
if (isset($_POST["submit"])) {
    echo 'it works';
    // $name = $_POST['name'];
    // $dob = $_POST['dob'];
    // $email = $_POST['email'];
    // $phone = $_POST['phone'];
    // $password = $_POST['password'];
    // $password_encrypted = password_hash($password, PASSWORD_DEFAULT);
    // try {
    //     $db = new PDO('mysql:host=localhost;dbname=benna', 'root', '');

    //     $query = $db->prepare('INSERT INTO client VALUES(NULL,:name,:dob,:email,:phone,:password)');

    //     $query->bindValue(':name', $name, PDO::PARAM_STR);
    //     $query->bindValue(':dob', $dob, PDO::PARAM_STR);
    //     $query->bindValue(':email', $email, PDO::PARAM_STR);
    //     $query->bindValue(':phone', $phone, PDO::PARAM_STR);
    //     $query->bindValue(':password', $password, PDO::PARAM_STR);

    //     $query->execute();
    // } catch (PDOException $e) {
    //     $e->getMessage();
    // }
}

// header('Location: ../index.html');

?>