<?php

/**
 * Description of categoryEdito
 *
 * @author gaeta
 */
class categoryEdito {

    public $pdo;
    public $nameCategoryEdito = '';

    public function __construct() {
//fonction de connexion a ma base de donnéer 
        //ordi formation
        $this->pdo = dataBase::getIntance();
    }

    public function listeCategoryEdito() {
        $query = 'SELECT `id`, `nameCategoryEdito` FROM `1402f_categoryEdito`';
        $req = $this->pdo->db->query($query);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    public function addCategoryEdit() {

        $query = 'INSERT INTO `1402f_categoryEdito` '
                . '(`nameCategoryEdito`) '
                . 'VALUE (:nameCategoryEdito)';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':nameCategoryEdito', $this->nameCategoryEdito, PDO::PARAM_STR);
        return $queryResult->execute();
    }

    public function modifyCategoryEdito() {
        $query = 'UPDATE `1402f_categoryEdito` SET `nameCategoryEdito`=:nameCategoryEdito WHERE `1402f_categoryEdito`.`id`=:id';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':nameCategoryEdito', $this->nameCategoryEdito, PDO::PARAM_STR);
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryResult->execute();
    }

    public function deleteCategoryEdito() {
        
      $result = $this->pdo->db->prepare('DELETE FROM `1402f_categoryEdito` WHERE `id`= :id');
        $result->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $result->execute();
        
    }

}
