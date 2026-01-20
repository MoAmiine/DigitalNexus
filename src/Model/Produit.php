<?php 
namespace App\Model;
use App\Core\Database;
use App\Model\Categorie;
use PDO;

class Produit {
    private int $id;
    private string $nom;
    private int $stock;
    private int $categories_id;
    private float $prix;
    private PDO $db;
    public ?string $categorie_nom = null;


    public function __construct()
    {
        $this->db = Database::dbConnect();
    }
    

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getStock(): int
    {
        return $this->stock;
    }

    public function setStock(int $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getCategoriesId(): Categorie
    {
        return $this->categories_id;
    }

    public function setCategoriesId(Categorie $categories_id): self
    {
        $this->categories_id = $categories_id;

        return $this;
    }
    public function getPrix(): float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }
    public function getCategorie() {
        return $this->categorie_nom ?? 'Non classé';
    }

    public function showAllProduits(){
        $query  ='SELECT p.*, c.nom AS categorie_nom 
              FROM produits p 
              LEFT JOIN categories c ON p.categories_id = c.id';
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
    }
}