<?php

class Signup extends config
{
    protected function setUser($username, $name, $email, $password)
    {
        $stmt = $this->getConnexion()->prepare('INSERT INTO users VALUES(NULL,?,?,?,?);');
        
        $password_encrypted = password_hash($password, PASSWORD_DEFAULT);

        if (!$stmt->execute(array($username, $name, $email, $password_encrypted))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }
    protected function checkUser($username, $email)
    {
        $stmt = $this->getConnexion()->prepare('SELECT username FROM users WHERE username = ? OR email = ?;');

        if (!$stmt->execute(array($username, $email))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        if ($stmt->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }
        return $resultCheck;
    }
}