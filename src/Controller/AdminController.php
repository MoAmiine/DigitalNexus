<?php 
namespace App\Controller;
use App\Model\Categorie;
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
        $produits = $produitModel->showAllProduits();
        $totalProduits = $produitCount[0];

        $userModel = new User();
        $userCount = $userModel->getUserCount();
        $totalUsers = $userCount[0];

        

    require_once __DIR__ . '/../View/Admin/AdminDashbord.php';
    }

    public function addProduct(){
        $categorieModel = new Categorie();
        $categories = $categorieModel->findAllCategories();
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $produit = new Produit();
            $produit->setNom($_POST['nom']);
            $produit->setPrix($_POST['prix']);
            $produit->setStock($_POST['quantite']);
            $produit->setCategoriesId($_POST['id']);
            $products = [];
            array_push($products, $produit);
            $produit->insertProduit();
            
            
            header('Location: /admin/Dashboard');
            var_dump($products);
            }
            require_once __DIR__ . '/../View/Admin/AddProduct.php';
    }

    public function DeleteProduct(){
        $id = $_GET['id'];
        $produit = new Produit();
        $produit->setId($id);
        $produit->DeleteProduit();   

        header('Location: /admin/dashboard');
    }
    public function categories(){
        $categorieModel = new Categorie();
        $categories = $categorieModel->findAllCategories();
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $categorie = new Categorie();
            $categorie->setNomCategorie($_POST['nom_categorie']);
            $categorie->insertCategorie();
        }
        require_once __DIR__ . '/../View/Admin/GestionCategories.php';
    }

    public function Users(){
        $userModel = new User();
        $users = $userModel->getAllUsers();
        require_once __DIR__ . '/../View/Admin/GestionUsers.php';
    }
}