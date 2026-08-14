<?php

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
        $this->username = $username;
         $this->email = $email;
          $this->password = $password;
           $this->createdAT= date('y-m-d h:i:s');
           self::$totalUsers++;
    }

    public function displayUser():void{
        echo "<p>Username: $this->username</p>";
         echo "<p>Email: $this->email</p>";

    }
}