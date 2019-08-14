<?php

/**
 * Description of produits
 * Classe permettant d'interagir avec la table "produit"
 * @author ced27
 */
class produits extends connectionBdd {

    public $id = '';
    public $pro_cat_id = '';
    public $ref = '';
    public $label = '';
    public $description = '';
    public $pro_prix = '';
    public $stock = '';
    public $color = '';
    public $extension = '';
    public $pro_d_ajout = '';
    public $pro_d_modif = '';
    public $bloque = '';
/**
 * Construction de la connexion à la BDD
 */
    public function __construct() {
        parent::__construct();
        $this->dbConnect();
    }
/**
 * méthode permettant l'affichage de tous les produits de la base de données
 * @return type boolean
 */
    public function listProduct() {
        $query = 'SELECT * FROM `produits`';
        $result = $this->pdo->query($query);
        $allproduct = $result->fetchAll(PDO::FETCH_OBJ);

        $result->closeCursor();
        return $allproduct;
    }
/**
 * Méthode affichant un produit en fonction de son id passée dans l'url
 * @return type Boolean
 */
    public function getProductById() {
        $query = 'SELECT * FROM `produits` '
                . 'WHERE `pro_id` = :pro_id';
        $getProductById = $this->pdo->prepare($query);
        $getProductById->bindValue(':pro_id', $this->pro_id, PDO::PARAM_INT);
        $getProductById->execute();

        if (is_object($getProductById)) {
            $isObjectResult = $getProductById->fetch(PDO::FETCH_OBJ);
        }
        $getProductById->closeCursor();
        return $isObjectResult;
    }
    
    /**
     * méthode permettant la modification d'un produit
     * @return type Boolean
     */
    public function updateProduct() {
  
         $query = 'UPDATE `produits` SET `pro_ref` = :ref, `pro_libelle` = :label, `pro_description` = :descrip, `pro_photo` = :extension, `pro_couleur` = :color, `pro_bloque` = :bloque, `pro_d_modif` = NOW(), `pro_stock` = :pro_stock WHERE `pro_id` = :id';
        $result = $this->pdo->prepare($query);
        $result->bindvalue(':id', $this->id, PDO::PARAM_INT);
        $result->bindvalue(':ref', $this->ref, PDO::PARAM_STR);
        $result->bindvalue(':label', $this->label, PDO::PARAM_STR);
        $result->bindvalue(':descrip', $this->description, PDO::PARAM_STR);
        $result->bindvalue(':extension', $this->extension, PDO::PARAM_STR);
        $result->bindvalue(':color', $this->color, PDO::PARAM_STR);
        $result->bindvalue(':pro_stock', $this->stock, PDO::PARAM_INT);
        $result->bindvalue(':bloque', $this->bloque, PDO::PARAM_STR);
        // $result->bindvalue(':pro_d_modif', NOW(), PDO::PARAM_STR);
        return $result->execute();
    }

    public function __destruct() {
        $this->pdo = NULL;
    }

}

