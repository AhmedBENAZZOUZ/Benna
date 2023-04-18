<?php

session_start();

include("../Config.php");



if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //something was posted
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($password) && !is_numeric($username)) {

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
                    header("Location: ../index.php");
                    die;
                }
            }
        }

        echo "wrong username or password!";
    } else {
        echo "Must fill all  field!!";
    }
}