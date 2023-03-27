<?php

class Signin extends config
{
    protected function getUser($username, $password)
    {
        $stmt = $this->getConnexion()->prepare('SELECT password FROM users WHERE username = ? OR email = ?;');

        if (!$stmt->execute(array($username, $password))) {
            $stmt = null;
            header('Location : ../index.php?error=stmtFailed');
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header('Location : ../index.php?error=usernotfound');
            exit();
        }

        $password_encrypted = $stmt->fetchAll();
        $checkPassword = password_verify($password,$password_encrypted[0]["password"]);

        if ($checkPassword == false) {
            $stmt = null;
            header('Location : ../index.php?error=wrongpassword');
            exit();
        }elseif ($checkPassword == true){
            $stmt = $this->getConnexion()->prepare('SELECT * FROM users WHERE username = ? OR email = ? AND password = ?;');
        }

        if (!$stmt->execute(array($username,$username, $password))) {
            $stmt = null;
            header('Location : ../index.php?error=stmtFailed');
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header('Location : ../index.php?error=usernotfound');
            exit();
        }

        $user = $stmt->fetchAll();

        session_start();

        $_SESSION["id"]=$user[0]["id"];
        $_SESSION["username"]=$user[0]["username"];

        $stmt = null;
    }
}