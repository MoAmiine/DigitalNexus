<?php 

namespace App\Controller;

use App\Model\User;

class AuthController{
    private $user;

    public function __construct()
    {
        $this->user = new User();
    }
    
    public function SignUp(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $this->user = new User();
            $this->user->setEmail($_POST['email']);
            $this->user->setLastname($_POST['Lastname']);
            $this->user->setFirstname($_POST['Firstname']);
            $this->user->setPassword($_POST['password']);
            if($this->user->save()){
                header('Location: ../../../View/Login.php');
                exit();
            }
             else{
            $error = "Erreur lors de l'inscription.";
        require_once __DIR__ . '/../View/signUp.php'; 
        }
         
        }
        else {
        require_once __DIR__ . '/../View/signUp.php';   
        }

        }

public function Login() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $user = $this->user->findUserByEmail($email);

        if (!$user || !password_verify($password, $user->getPassword())) {
            echo 'Email ou mot de passe incorrect';
        } else {
            if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
            $_SESSION['user'] = [
                'id' => $user->id,
                'Firstname' => $user->Firstname,
                'Lastname' => $user->Lastname,
                'email' => $user->email
            ];
            
            header('Location: /home/Catalogue');
            exit();

        }
    } else {
        require_once './src/View/Login.php';
    }
}
public function Logout(){
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    session_destroy();
    
    header('Location: /home/Catalogue');
}
}