<?php

/**
 * Description of regions
 *
 * @author ced27
 */
class departements extends connectionRegion {

    public $dep_reg_id = '';
    public $dep_nom = '';
    public $dep_id = '';
    public $reg_id = '';

    /**
     * Construction de la connexion à la BDD
     */
    public function __construct()
    {
        parent::__construct();
        $this->dbConnect();
    }

    /**
     * Affichage de toutes les régions
     */
    public function getRegionById()
    {
        
        $query = 'SELECT * FROM departements WHERE dep_reg_id=:reg_id';
        $result = $this->pdo->prepare($query);
        $result->bindValue(':reg_id', $this->reg_id);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_OBJ);
    }

    public function __destruct()
    {
        $this->pdo = NULL;
    }

}
