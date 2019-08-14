<?php

/**
 * Description of regions
 *
 * @author ced27
 */
class regions extends connectionRegion {

    public $reg_id = '';
    public $reg_v_nom = '';
    public $reg_nb_dep = '';

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
    public function getRegion()
    {
        $query = 'SELECT * FROM `regions`';
        $result = $this->pdo->query($query);
        $listRegion = $result->fetchAll(PDO::FETCH_OBJ);
        $result->closeCursor();
        return $listRegion;
    }

   

    public function __destruct()
    {
        $this->pdo = NULL;
    }

}
