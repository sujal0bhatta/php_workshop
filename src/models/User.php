<?php

namespace App\models;

use App\core\Database;

class User{
    private int $id;
    private string $username;
    private string $email;
    private string $password;
    private string $createdAt;
    private string $bio;

    private static int $nextId =1;
    private static int $totalUsers =1;

    public function __construct(string $username, string $email, string $password){
        $this->id = self::$nextId++;
        $this->setUserName($username);
         $this->setEmail($email);
          $this->setPassword($password);
           $this->createdAT= date('y-m-d h:i:s');
           self::$totalUsers++;
    }

    public function setUserName(string $username):bool{
        if((strlen($username)<3)||strlen($username)>30){
            echo "the username length should be in range of 3-30 characters";
            return false;
        }
        if(!preg_match('/^[a-zA-Z0-9_]+$/',$username)){
            echo "the username only contain alphabets, numbers and underscores";
            return false;
        }
        $this->username = $username;
        return true;
    }

    public function setEmail(string $email):bool{
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            echo "the email is not valid";
            return false;
        }
        $this->email = $email;
        return true;
    }


    public function setPassword(string $password):bool{
        if(strlen($password)<6){
            echo "password length must be greater than 6 characters";
            return false;
        }
        $this->password = password_hash($password , PASSWORD_DEFAULT);
        return true;

    }

    public static function create(string $username, string $email, string $password): int|false{
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
        $result = $stmt->execute([
            "username" => trim(strtolower($username)),
            "email" => trim(strtolower($email)),
            "password" => password_hash($password, PASSWORD_DEFAULT)
        ]);
        return $result ? (int)$pdo->lastInsertID():false;
    }

    public function displayUser():void{
        echo "<p>Username: $this->username</p>";
         echo "<p>Email: $this->email</p>";
         echo "<p>Password : $this->password</p>";

    }
}