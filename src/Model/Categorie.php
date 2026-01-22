<?php 
namespace App\Model;
use App\Core\Database;
class Categorie {
    private ?int $id;
    private ?string $nom_categorie;
    private array $produits;
    private $db;
    
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

    public function getNomCategorie(): string
    {
        return $this->nom_categorie;
    }

    public function setNomCategorie(string $nom_categorie): self
    {
        $this->nom_categorie = $nom_categorie;

        return $this;
    }

    public function getProduits(): array
    {
        return $this->produits;
    }

    public function setProduits(array $produits): self
    {
        $this->produits = $produits;

        return $this;
    }

    public function finCategorieById(){
        $query = 'SELECT nom from catergories WHERE id = ?';
        $stmt = $this->db->prepare($query);
        $stmt->execute([$this->getNomCategorie()]);
        $stmt->fetch();
    }
    
    public function findAllCategories(){
        $query = 'SELECT * FROM categories';
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_OBJ);    
        }
        public function insertCategorie(){
        $query = 'INSERT INTO produits(nom) VALUES(:nom)';
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            'nom' => $this->nom_categorie
        ]);
        }
}