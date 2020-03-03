<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of categoryArticle
 *
 * @author gaeta
 */
class categoryArticle {
    public $nameCategoryArticle='';
    public $pdo;

    public function __construct() {
//fonction de connexion a ma base de donnéer 
        //ordi formation
        $this->pdo = dataBase::getIntance();
    }

    public function listerCategoryArticle() {
        $query = 'SELECT `id`, `nameCategoryArticle` FROM `1402f_categoryArticle` ';
        $req = $this->pdo->db->query($query);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }
    public function addCategoryArticle(){
         $query = 'INSERT INTO `1402f_categoryArticle` '
                . '(`nameCategoryArticle`) '
                . 'VALUE (:nameCategoryArticle)';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':nameCategoryArticle', $this->nameCategoryArticle, PDO::PARAM_STR);
        return $queryResult->execute();
    }
    public function modifyCategoryArticle() {
        $query = 'UPDATE `1402f_categoryArticle` SET `nameCategoryArticle`=:nameCategoryArticle WHERE `1402f_categoryArticle`.`id`=:id';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':nameCategoryArticle', $this->nameCategoryArticle, PDO::PARAM_STR);
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryResult->execute();
    }

    public function deleteCategoryArticle() {
        
      $result = $this->pdo->db->prepare('DELETE FROM `1402f_categoryArticle` WHERE `id`= :id');
        $result->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $result->execute();
        
    }
}
