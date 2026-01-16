<?php 
namespace App\Core;
use PDO;
use PDOException;

class Database{
    
    public static function dbConnect(){
        try{
        $conn = new PDO('mysql:localhost=host;dbname=gestion_roles', 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
        }catch(PDOException $e){
            die ("erreur" . $e->getMessage()); 
        }
    }
}