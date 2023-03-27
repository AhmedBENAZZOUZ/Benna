<?php

class SignupController extends Signup
{
   private string $username;
   private string $name;
   private string $email;
   private string $password;
   private string $passwordRepeat;

   public function __construct(string $username, string $name, string $email, string $password, string $passwordRepeat)
   {
      $this->username = $username;
      $this->name = $name;
      $this->email = $email;
      $this->password = $password;
      $this->passwordRepeat = $passwordRepeat;

   }

   public function signupUser()
   {
      if($this->emptyInput() == false){
         header("location: ../index.php?error=emptyinput");
         exit();
      }
      if($this->invalidUsername() == false){
         header("location: ../index.php?error=invalidusername");
         exit();
      }
      if ($this->invalidEmail() == false) {
         header("location: ../index.php?error=invalidemail");
         exit();
      }
      if ($this->passwordMatch() == false) {
         header("location: ../index.php?error=passwordmatch");
         exit();
      }
      if ($this->usernameTaken() == false) {
         header("location: ../index.php?error=usernameoremailtaken");
         exit();
      }

      $this->setUser($this->username,$this->name,$this->email,$this->password);
   }
   private function emptyInput()
   {
      if (empty($this->username) || empty($this->name) || empty($this->email) || empty($this->password) || empty($this->passwordRepeat)) {
         $result = false;
      } else {
         $result = true;
      }

      return $result;
   }

   private function invalidUsername()
   {
      if (!preg_match("/^[a-zA-Z0-9]*$/", $this->username)) {
         $result = false;
      } else {
         $result = true;
      }
      return $result;
   }

   private function invalidEmail()
   {
      if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
         $result = false;
      } else {
         $result = true;
      }
      return $result;
   }

   private function passwordMatch()
   {
      if ($this->password !== $this->passwordRepeat) {
         $result = false;
      } else {
         $result = true;
      }
      return $result;
   }

   private function usernameTaken()
   {
      if (!$this->checkUser($this->username, $this->email)) {
         $result = false;
      } else {
         $result = true;
      }
      return $result;
   }
}