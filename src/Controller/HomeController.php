<?php 
namespace App\Controller;
use App\Model\Produit;


class HomeController{
    public function Catalogue(){
           $produits = new Produit();
           $produits->showAllProduits();

           require_once './src/View/Home.php';
}
}