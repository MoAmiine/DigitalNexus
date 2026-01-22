<?php 
namespace App\Controller;
use App\Model\Produit;


class HomeController{
    public function Catalogue(){
           $produitModel = new Produit();
           $produits = $produitModel->showAllProduits();
           require_once __DIR__ . '/../View/Home.php';
}

}