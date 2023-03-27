<?php

class SigninController extends Signin
{
    private int $id;
    private string $username;
    private string $password;

    public function __construct(string $username, string $password)
    {
        $this->username = $username;
        $this->password = $password;

    }

    public function signinUser()
    {
        if ($this->emptyInput() == false) {
            header("Location : ../index.php?error=emptyinput");
            exit();
        }

        $this->getUser($this->username, $this->password);
    }
    private function emptyInput()
    {
        if (empty($this->username) || empty($this->password)) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }
}