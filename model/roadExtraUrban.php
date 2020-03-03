<?php

class roadExtraUrban {

    private $db;
    public $id = 1;
    public $typeRoadExtraUrban = '';
    public $pdo;

    public function __construct() {
//fonction de connexion a ma base de donnéer 
        //ordi formation
        $this->pdo = dataBase::getIntance();


        // Sinon on affiche un message d'erreur
        //il les faut pour faire les transaction (3 prochaine methode)
    }

    public function listerRoadExtraUrban() {

        $query = 'SELECT `id`, `typeRoadExtraUrban` '
                . 'FROM '
                . '1402f_roadextraurban';
        $req = $this->pdo->db->query($query);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

}
