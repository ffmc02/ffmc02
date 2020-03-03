<?php

/**
 * Description of editot
 *
 * @author gaeta
 */
class editot {

    public $pdo;
    public $title = '';
    public $edito = '';
    public $author = 0;
    public $categoryEdito = 0;
    public $nbrEdito = 0;
    public $subtitle = '';
    public $picture = '';
    public $subtitle1 = '';
    public $subsections1 = '';
    public $picture1 = '';
    public $subtitle2 = '';
    public $subsections2 = '';
    public $picture2 = '';
    public $subtitle3 = '';
    public $subsections3 = '';
    public $picture3 = '';

    public function __construct() {
//fonction de connexion a ma base de donnéer 
        //ordi formation
        $this->pdo = dataBase::getIntance();
    }

    public function addEdito() {
        $query = 'INSERT INTO `1402f_edito` '
                . '(`title`, '
                . '`subtitle`, '
                . '`edito`, '
                . '`picture`, '
                . '`subtitle1`, `subsections1`, '
                . '`picture1`, '
                . '`subtitle2`, `subsections2`, `picture2`, '
                . '`subtitle3`, `subsections3`, `picture3`, '
                . '`author`, `categoryEdito`)'
                . 'VALUES (:title, '
                . ':subtitle, '
                . ':edito, '
                . ' :picture, '
                . ':subtitle1, :subsections1, :picture1, '
                . ':subtitle2, :subsections2, :picture2, '
                . ':subtitle3, :subsections3, :picture3, '
                . ':author, :categoryEdito )';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':title', $this->title, PDO::PARAM_STR);
        $queryResult->bindValue(':subtitle', $this->subtitle, PDO::PARAM_STR);
        $queryResult->bindValue(':edito', $this->edito, PDO::PARAM_STR);
        $queryResult->bindValue(':picture', $this->picture, PDO::PARAM_STR);
        $queryResult->bindValue(':subtitle1', $this->subtitle1, PDO::PARAM_STR);
        $queryResult->bindValue(':subsections1', $this->subsections1, PDO::PARAM_STR);
        $queryResult->bindValue(':picture1', $this->picture1, PDO::PARAM_STR);
        $queryResult->bindValue(':subtitle2', $this->subtitle2, PDO::PARAM_STR);
        $queryResult->bindValue(':subsections2', $this->subsections2, PDO::PARAM_STR);
        $queryResult->bindValue(':picture2', $this->picture2, PDO::PARAM_STR);
        $queryResult->bindValue(':subtitle3', $this->subtitle3, PDO::PARAM_STR);
        $queryResult->bindValue(':subsections3', $this->subsections3, PDO::PARAM_STR);
        $queryResult->bindValue(':picture3', $this->picture3, PDO::PARAM_STR);
        $queryResult->bindValue(':author', $this->author, PDO::PARAM_INT);
        $queryResult->bindValue(':categoryEdito', $this->categoryEdito, PDO::PARAM_INT);
        return $queryResult->execute();
    }

    public function listerEdito($start = 0) {
        $query = 'SELECT `1402f_edito`.`id`, `1402f_edito`.`title`, `1402f_edito`.`edito`, '
                . 'DATE_FORMAT(`dateRegistreur`, \'%d/%m/%Y\')AS `datefr`,'
                . '`1402f_edito`.`subtitle`, '
                . '`1402f_edito`.`subtitle1`, '
                . '`1402f_edito`.`subtitle2`, '
                . '`1402f_edito`.`subtitle3`, '
                . '`1402f_edito`.`subsections1`, '
                . '`1402f_edito`.`subsections2`, '
                . '`1402f_edito`.`subsections3`, '
                . '`1402f_edito`.`picture`, '
                . '`1402f_edito`.`picture1`, '
                . '`1402f_edito`.`picture2`, '
                . '`1402f_edito`.`picture3`, '
                . '`1402f_user`.`pseudo`, '
                . '`1402f_edito`.`categoryEdito` AS `idCategoryEdito`, '
                . '`1402f_categoryEdito`.`nameCategoryEdito` '
                . 'FROM `1402f_edito` '
                . 'JOIN `1402f_user` '
                . 'ON `1402f_user`.`id`= `1402f_edito`.`author` '
                . 'JOIN `1402f_categoryEdito` '
                . 'ON `1402f_categoryEdito`.`id`= `1402f_edito`.`categoryEdito` '
//                . 'LIMIT :start, 1'
                . 'order by `id` DESC';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':start', $start, PDO::PARAM_INT);
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }

    public function countEdito() {
        $query = 'SELECT CEIL(COUNT(`id`)/1) AS `nbrEdito` FROM `1402f_edito` ';
        $queryResult = $this->pdo->db->query($query);
        return $queryResult->fetch(PDO::FETCH_OBJ);
    }

    public function modifyEdito() {
        $query = 'UPDATE `1402f_edito`'
                . 'SET `title`=:title, `subtitle`=:subtitle, `edito`=:edito, '
                . '`subtitle1`=:subtitle1, `subsections1`=:subsections1, '
                . '`subtitle2`=:subtitle2, `subsections2`=:subsections2, '
                . '`subtitle3`=:subtitle3, `subsections3`=:subsections3,'
                . '`categoryEdito`=:categoryEdito '
                . 'WHERE  `1402f_edito`.`id`=:id';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryResult->bindValue(':title', $this->title, PDO::PARAM_STR);
        $queryResult->bindValue(':subtitle', $this->subtitle, PDO::PARAM_STR);
        $queryResult->bindValue(':edito', $this->edito, PDO::PARAM_STR);
        $queryResult->bindValue(':subtitle1', $this->subtitle1, PDO::PARAM_STR);
        $queryResult->bindValue(':subsections1', $this->subsections1, PDO::PARAM_STR);
        $queryResult->bindValue(':subtitle2', $this->subtitle2, PDO::PARAM_STR);
        $queryResult->bindValue(':subsections2', $this->subsections2, PDO::PARAM_STR);
        $queryResult->bindValue(':subtitle3', $this->subtitle3, PDO::PARAM_STR);
        $queryResult->bindValue(':subsections3', $this->subsections3, PDO::PARAM_STR);
        $queryResult->bindValue(':categoryEdito', $this->categoryEdito, PDO::PARAM_INT);
        return $queryResult->execute();
    }

    public function deleteEdito() {
        $result = $this->pdo->db->prepare('DELETE FROM `1402f_edito` WHERE `id`= :id');
        $result->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $result->execute();
    }

}
