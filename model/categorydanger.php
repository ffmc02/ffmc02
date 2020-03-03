<?php

class categorydanger {

    public $id = 1;
    public $typeCategoryDanger = '';
    public $idDanger = 0;
    public $pdo;

//$bdd = new PDO('mysql:host=sql01.ouvaton.coop;dbname=08394_user', '08394_user', 'Fede022017-');
    public function __construct() {
//fonction de connexion a ma base de donnéer 
        //ordi formation
        $this->pdo = dataBase::getIntance();


        // Sinon on affiche un message d'erreur
        //il les faut pour faire les transaction (3 prochaine methode)
    }

    public function addTypeDanger() {
        $query = 'INSERT INTO `1402f_categorydanger` (`typeCategoryDanger`, `id_1402f_danger`) '
                . 'VALUES '
                . '(:typeCategoryDanger, :idDanger)';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':typeCategoryDanger', $this->typeCategoryDanger, PDO::PARAM_STR);
        $queryResult->bindValue(':idDanger', $this->idDanger, PDO::PARAM_INT);
        return $queryResult->execute();
    }

    /**
     * methode pour liste déroulante signalisation manquanre
     * @return type
     */
    public function listerTypeDanger() {
        $query = 'SELECT `id`, `typeCategoryDanger` '
                . 'FROM `1402f_categorydanger`';
        $req = $this->pdo->db->query($query);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    public function SignlingDangerListe() {
        $query = 'SELECT `id`, `typeCategoryDanger` '
                . 'FROM `1402f_categorydanger`'
                . 'WHERE `id_1402f_danger`=3';
        $req = $this->pdo->db->query($query);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * methode pour liste déroulante infrastructure
     * @return type
     */
    public function infrastureDangerListe() {
        $query = 'SELECT `id`, `typeCategoryDanger` '
                . 'FROM `1402f_categorydanger`'
                . 'WHERE `id_1402f_danger`=4';
        $req = $this->pdo->db->query($query);
        $result = $req->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    /**
     * methode pour liste déroulante chaussée glissante
     * @return type
     */
    public function roadDangerListe() {
        $query = 'SELECT `id`, `typeCategoryDanger` '
                . 'FROM `1402f_categorydanger`'
                . 'WHERE `id_1402f_danger`=5';
        $req = $this->pdo->db->query($query);
        $result = $req->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function modifyDangerType() {
        $query = 'UPDATE `1402f_categorydanger` '
                . 'SET `typeCategoryDanger`=:typeCategoryDanger '
                . 'WHERE `id`=:id';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryResult->bindValue(':typeCategoryDanger', $this->typeCategoryDanger, PDO::PARAM_STR);
        $queryResult->fetchAll(PDO::FETCH_OBJ);
        return $queryResult->execute();
    }
    public function deleteDanger() {
        $result = $this->pdo->db->prepare('DELETE FROM `1402f_categorydanger` WHERE `id`= :id');
        $result->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $result->execute();
    }
}
