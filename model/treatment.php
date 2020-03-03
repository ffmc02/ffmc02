<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of treatment
 *
 * @author gaeta
 */
class treatment {

    public $pdo;
    public $status = '';

    public function __construct() {
//fonction de connexion a ma base de donnéer 
        //ordi formation
        $this->pdo = dataBase::getIntance();
    }
public function AddStatus() {
        $query = 'INSERT INTO `1402f_treatment` (`status`) VALUES (:status) ';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':status', $this->status, PDO::PARAM_STR);
        return $queryResult->execute();
    }
    public function listetreatment() {

        $query = 'SELECT `id`, `status`'
                . 'FROM `1402f_treatment`'
                . 'WHERE `id`';
        $req = $this->pdo->db->query($query);
        $result = $req->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function listerStatusModify() {

        $query = 'SELECT `id`AS `idStatus`, '
                . '`status` AS `Status` '
                . 'FROM `1402f_treatment` '
                . 'WHERE `id`';
        $req = $this->pdo->db->query($query);
        $result = $req->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function addStatu() {
        $query = 'INSERT INTO `1402f_treatment` (`status`) VALUES (:status)';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':status', $this->status, PDO::PARAM_STR);
        return $queryResult->execute();
    }
 public function modifyStatus() {
        $query = 'UPDATE `1402f_treatment` '
                . 'SET `status`=:status '
                . 'WHERE `id`=:id';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryResult->bindValue(':status', $this->status, PDO::PARAM_STR);
        $queryResult->fetchAll(PDO::FETCH_OBJ);
        return $queryResult->execute();
    }
    public function deleteStatus() {
        $result = $this->pdo->db->prepare('DELETE FROM `1402f_treatment` WHERE `id`= :id');
        $result->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $result->execute();
    }
}
