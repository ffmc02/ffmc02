<?php

/**
 * Description of eventCategory
 *
 * @author gaeta
 */
class eventCategory {

    public $pdo;
    public $id = 0;
    public $nameCategoryEvents = '';

    public function __construct() {
//fonction de connexion a ma base de donnéer 
        //ordi formation
        $this->pdo = dataBase::getIntance();


        // Sinon on affiche un message d'erreur
        //il les faut pour faire les transaction (3 prochaine methode)
    }

    public function listeEventCategory() {
        $query = 'SELECT `id`, `nameCategoryEvents` FROM `1402f_eventCategory` ';
        $req = $this->pdo->db->query($query);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    public function addCategoryEvent() {

        $query = 'INSERT INTO `1402f_eventCategory` '
                . '(`nameCategoryEvents`) '
                . 'VALUE (:nameCategoryEvents)';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':nameCategoryEvents', $this->nameCategoryEvents, PDO::PARAM_STR);
        return $queryResult->execute();
    }

    public function modifyCategoryEvent() {
        $query = 'UPDATE `1402f_eventCategory` SET `nameCategoryEvents`=:nameCategoryEvents WHERE `1402f_eventCategory`.`id`=:id';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':nameCategoryEvents', $this->nameCategoryEvents, PDO::PARAM_STR);
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryResult->execute();
    }

    public function deleteCategoryEvent() {

        $result = $this->pdo->db->prepare('DELETE FROM `1402f_eventCategory` WHERE `id`= :id');
        $result->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $result->execute();
    }

}
