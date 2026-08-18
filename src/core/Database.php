<?php

namespace App\core;

use PDO;

class Database{
    public PDO $connection;

    public function __construct(){
        $dsn = "mysql:host=localhost; port=3306; dbname=php_workshop; charset = utf8mb4 ";
        
        try{
            $this->connection = new PDO($dsn , 'root' ,'');
        }
        catch (PDOException $e){
            die("database connnection failed:" . $e->getMessage());
        }
    }

    public function getConnection(): PDO{
        return $this->connection;
    }
}