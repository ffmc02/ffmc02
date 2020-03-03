<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of positionDanger
 *
 * @author Jonard G
 */
class positionDanger {


    public $id = 0;
    public $typeDangerPosition = '';
    public $pdo;
    public function __construct() {
//fonction de connexion a ma base de donnéer 
        //ordi formation
        $this->pdo = dataBase::getIntance();


        // Sinon on affiche un message d'erreur
        //il les faut pour faire les transaction (3 prochaine methode)
    }
public function addPositionDanger(){
    $query='INSERT INTO `1402f_dangerposition` (`typeDangerPosition`) VALUES (:typeDangerPosition)';
     $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':typeDangerPosition', $this->typeDangerPosition, PDO::PARAM_STR);
        return $queryResult->execute();
}

public function listerPositionDanger() {
        $query = 'SELECT `id`, `typeDangerPosition` '
                . 'FROM '
                . '`1402f_dangerposition` ';
        $req = $this->pdo->db->query($query);
        $result = $req->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    public function modifyDangerPosition(){ 
        $query='UPDATE `1402f_dangerposition` SET `typeDangerPosition` = :typeDangerPosition WHERE `id` = :id';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryResult->bindValue(':typeDangerPosition', $this->typeDangerPosition, PDO::PARAM_STR);
        $queryResult->fetchAll(PDO::FETCH_OBJ);
        return $queryResult->execute();
    }
    public function  deletePosition(){
        $result = $this->pdo->db->prepare('DELETE FROM `1402f_dangerposition` WHERE `id`= :id');
        $result->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $result->execute();
    }
}
