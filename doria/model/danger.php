<?php

/**
 * Description of danger
 * gestion de la table danger
 * @author gaeta
 */
class danger {

    public $id = 0;
    public $typeDanger = '';
    public $pdo;

    public function __construct() {
//fonction de connexion a ma base de donnéer 
        //ordi formation
        $this->pdo = dataBase::getIntance();


        // Sinon on affiche un message d'erreur
        //il les faut pour faire les transaction (3 prochaine methode)
    }

    public function addDanger() {
        $query = 'INSERT INTO `1402f_danger` (`typeDanger`) VALUES (:typeDanger)';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':typeDanger', $this->typeDanger, PDO::PARAM_STR);
        return $queryResult->execute();
    }

    public function listeDanger() {
        $query = 'SELECT `id`, `typeDanger` FROM `1402f_danger`';
        $req = $this->pdo->db->query($query);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

}
