<?php
if (isset($_POST["submit"])) {
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    // $password_encrypted = password_hash($password, PASSWORD_DEFAULT);
    try {
        $db = new PDO('mysql:host=localhost;dbname=benna', 'root', '');

        $query = $db->prepare('INSERT INTO client VALUES(NULL,:name,:dob,:email,:phone,:password)');

        $query->bindValue(':name', $name, PDO::PARAM_STR);
        $query->bindValue(':dob', $dob, PDO::PARAM_STR);
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->bindValue(':phone', $phone, PDO::PARAM_STR);
        $query->bindValue(':password', $password, PDO::PARAM_STR);

        $query->execute();
    } catch (PDOException $e) {
        $e->getMessage();
    }
}


header('Location: ../index.html');


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="import" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>POST TEST</title>
</head>

<body>
    <h1>Clients</h1><br><br>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">date of birth</th>
                <th scope="col">email</th>
                <th scope="col">phone</th>
                <th scope="col">password</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">
                    <?= $_POST['name']; ?>
                </th>
                <td>
                    <?= $_POST['dob']; ?>
                </td>
                <td>
                    <?= $_POST['email']; ?>
                </td>
                <td>
                    <?= $_POST['phone']; ?>
                </td>
                <td>
                    <?= $_POST['password']; ?>
                </td>
                <!-- <td>
                        <a href="updateClient.php?numClient=<?= $client['id']; ?>"> <button type="button"
                                class="btn btn-info"><i class="bi bi-pencil-fill"></i></button> </a>
                        <a href="deleteClient.php?numClient=<?= $client['id']; ?>"><button type="button"
                                class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button> </a>
                    </td> -->
            </tr>
        </tbody>
    </table>
    <!-- <a href="addClient.php">
        <button type="button" class="btn btn-warning">Add Client</button></a> -->
</body>

</html>