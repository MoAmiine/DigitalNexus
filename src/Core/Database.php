<?php 
namespace App\Core;
use PDO;
use PDOException;

class Database{
    private string $username = 'root';
    private string $password = '';
    private PDO $pdo;

    public function __construct()
    {
        try{
        $this->pdo = new PDO('mysql:host=localhost;dbname=gestion_roles', $this->username, $this->password);
        }catch(PDOException $e){
            echo 'no'. $e->getMessage();
        }
    }
}