<?php

/**
 * connection à la base de données
 */
class connectionRegion {

    protected $pdo;
    private $host = '';
    private $login = '';
    private $password = '';
    private $dbName = '';

    public function __construct() {
        $this->host = HOST;
        $this->login = LOGIN;
        $this->password = PASSWORD;
        $this->dbName = DBNAME;
    }

    /**
     * Méthode permetant la connexion à la BDD
     * @return database
     */
    protected function dbConnect() {
        try {
            $this->pdo = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbName . ';charset=UTF8;', $this->login, $this->password);
        } catch (Exception $e) {
            echo 'erreur : ' . $e->getMessage() . '<br>';
            echo 'N° : ' . $e->getCode();
            die('fin du script');
        }
    }

    /**
     * fermeture de la connexion à la base de données
     */
    public function __destruct() {
        $this->pdo = NULL;
    }

}
