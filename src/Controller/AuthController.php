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
            $this->user->save();
                header('Location: /auth/login');
        }
           else{ 
        require_once __DIR__ . '/../View/signUp.php'; }
        }
         
        


        

public function Login() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $user = $this->user->findUserByEmail($email);

        if (!$user || !password_verify($password, $user->getPassword())) {
            $error = 'email ou mot de pass invalide';
            require_once __DIR__ . '/../View/Login.php';
            exit();
        } else {
            if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
            $_SESSION['user'] = [
                'id' => $user->id,
                'Firstname' => $user->Firstname,
                'Lastname' => $user->Lastname,
                'email' => $user->email,
                'role' => $user->role
            ];
            if($_SESSION['user']['role'] == 'client'){
            header('Location: /home/Catalogue');
            exit();
            }
            else if($_SESSION['user']['role']){
            header('Location: /admin/dashboard');
            }

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