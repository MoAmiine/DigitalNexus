<?php

namespace App\Controller;

use App\Model\Produit;

class PanierController
{
    public int $produit_id;


    public function getClientId(): int
    {
        return $this->produit_id;
    }

    public function setClientId(int $produit_id): self
    {
        $this->produit_id = $produit_id;

        return $this;
    }
    public function addProduitToPanier()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['user']['id'])) {
        header('Location: /auth/login');
        exit();
        }

        $this->produit_id = $_GET['id'];
        
        if (!isset($_SESSION['panier'])) {
            $_SESSION['panier']  = [];
            }
            if (isset($_SESSION['panier'][$this->produit_id])) {
                $_SESSION['panier'][$this->produit_id]++;
                } else {
                    $_SESSION['panier'][$this->produit_id] = 1;
                    }
        header('Location: /panier/showPanierProduct');
        exit();
    }
    public function showPanierProduct(){
        if (session_status() === PHP_SESSION_NONE){
            session_start();
        }
        $items = $_SESSION['panier'] ?? [];
        $productsInCart = [];

        if (!empty($items)){
            $produitModel = new Produit;
            $ids = array_keys($items);
            $productsInCart = $produitModel->findByIds($ids);
        }
        require_once __DIR__ . '/../View/Panier.php';
    }
    public function deleteProduitFromPanier(){
                if (session_status() === PHP_SESSION_NONE){
            session_start();
        }
        $id_a_supprimer = $_GET['id'];
        unset($_SESSION['panier'][$id_a_supprimer]);
        
        header('Location: /panier/showPanierProduct');
    }
}
