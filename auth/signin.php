<?php

session_start();

include("../Config.php");



if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //something was posted
    $username = $_POST['username'];
    $password = $_POST['password'];
    

    if (emptyInput($username, $password)==false) {
        header("location: ./Auth.php?error=Must fill all fields");
        exit();
    }
    //read from database
    $query = "select * from users where username = '$username' OR email = '$username' limit 1";
    $result = mysqli_query($con, $query);
    

    if ($result) {
        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            $password_encrypted = md5($password);
            if ($user_data['password'] == $password_encrypted) {

                $_SESSION['id'] = $user_data['id'];
                $_SESSION['username'] = $user_data['username'];
                $_SESSION['name'] = $user_data['name'];
                $_SESSION['email'] = $user_data['email'];
                $_SESSION['phone'] = $user_data['phone'];
                $_SESSION['adress'] = $user_data['adress'];
                $_SESSION['password'] = $user_data['password'];
                $_SESSION['image'] = $user_data['image'];
                header("Location: ../index.php");
                die;
            }
        }
    } else {

        echo "user not found";
    }
}

function emptyInput($username, $password)
{
    if (empty($username) || empty($password)) {
        $result = false;
    } else {
        $result = true;
    }

    return $result;
}