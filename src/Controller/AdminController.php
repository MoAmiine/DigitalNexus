<?php 
namespace App\Controller;
use App\Model\Produit;
use App\Model\User;
class AdminController{
    public function dashboard() {
    session_start();
    if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
        header('Location: /auth/login');
        exit();
    }
        $produitModel = new Produit();
        $produitCount = $produitModel->getProduitCount();
        $totalProduits = $produitCount[0];

        $userModel = new User();
        $userCount = $userModel->getUserCount();
        $totalUsers = $userCount[0];

    require_once __DIR__ . '/../View/Admin/AdminDashbord.php';
    }

    public function addProduct(){
        require __DIR__ . '/../View/AddProduct.php';
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            echo 'hello';
        }
    }
}