<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of categories
 *
 * @author ced27
 */
class categories extends connectionBdd {

    public $cat_id = '';
    public $cat_nom = '';
    public $cat_parent = '';

    /**
     * Construction de la connexion à la BDD
     */
    public function __construct()
    {
        parent::__construct();
        $this->dbConnect();
    }
    
    public function getAllCat() {
        $query = 'SELECT * FROM `categories`';
        $result = $this->pdo->query($query);
        $getAllCat = $result->fetchAll(PDO::FETCH_OBJ);
        $result->closeCursor();
        return $getAllCat;
    }
    
    
    
    
    
    
    public function __destruct() {
        $this->pdo = NULL;
    }


}
