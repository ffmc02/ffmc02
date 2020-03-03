<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of articles
 *
 * @author gaeta
 */
class articles {

    public $pdo;
    public $title = '';
    public $articleDescription = '';
    public $video = '';
    public $picture = '';
    public $idcategoryArticle = 0;
    public $idauthor = 0;
    public $linkExternalSite = '';
    public $dateEvent = '';
    public $nameLinkExternal = '';
    public $id=0;
    public $nbrArticle=0;

    public function __construct() {
//fonction de connexion a ma base de donnéer 
        
        $this->pdo = dataBase::getIntance();
    }

    public function addArticles() {
        $query = 'INSERT INTO `1402f_article` '
                . '(`title`, '
                . '`dateEvent`, '
                . '`articleDescription`, `video`, `picture`, '
                . '`linkExternalSite`, `nameLinkExternal`, '
                . '`id_categoryArticle`, `id_author` )'
                . 'VALUE (:title, :dateEvent, :articleDescription, :video, :picture, :linkExternalSite, :nameLinkExternal, :idcategoryArticle, :idauthor )';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':title', $this->title, PDO::PARAM_STR);
        $queryResult->bindValue(':dateEvent', $this->dateEvent, PDO::PARAM_STR);
        $queryResult->bindValue(':articleDescription', $this->articleDescription, PDO::PARAM_STR);
        $queryResult->bindValue(':video', $this->video, PDO::PARAM_STR);
        $queryResult->bindValue(':picture', $this->picture, PDO::PARAM_STR);
        $queryResult->bindValue(':linkExternalSite', $this->linkExternalSite, PDO::PARAM_STR);
        $queryResult->bindValue(':nameLinkExternal', $this->nameLinkExternal, PDO::PARAM_STR);
        $queryResult->bindValue(':idcategoryArticle', $this->idcategoryArticle, PDO::PARAM_INT);
        $queryResult->bindValue(':idauthor', $this->idauthor, PDO::PARAM_INT);
        return $queryResult->execute();
    }

    public function listerArticle($start=0) {
        $query = 'SELECT `1402f_article`.`id`, `1402f_article`.`linkExternalSite`, `1402f_article`.`nameLinkExternal`, `1402f_article`.`title`, '
                . 'DATE_FORMAT(`dateEvent`, \'%d/%m/%Y\')AS `dateEvent`, '
                . '`1402f_article`.`linkExternalSite`, '
                . '`1402f_article`.`articleDescription`, `1402f_article`.`video`, '
                . '`1402f_article`.`picture`, `1402f_article`.`id_categoryArticle`, `1402f_user`.`pseudo`, `1402f_categoryArticle`.`nameCategoryArticle`, '
                . '`1402f_categoryArticle`.`id` AS `idCategory` '
                . 'FROM `1402f_article`'
                . 'JOIN `1402f_user`'
                . 'ON `1402f_user`.`id`= `1402f_article`.`id_author` '
                . 'JOIN `1402f_categoryArticle` '
                . 'ON `1402f_categoryArticle`.`id` = `1402f_article`.`id_categoryArticle`'
                . 'WHERE `1402f_article`.`id` '
                . 'order by `1402f_article`.`id`  DESC '
                . 'LIMIT :start, 3';
           $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':start', $start, PDO::PARAM_INT);
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }

    public function modifyArticle() {
        $query = 'UPDATE `1402f_article` '
                . 'SET `title` = :title, '
                . '`dateEvent` = :dateEvent, '
                . '`articleDescription` = :articleDescription, '
                . '`video` = :video, '
                . '`linkExternalSite` = :linkExternalSite, '
                . '`nameLinkExternal` = :nameLinkExternal, '
                . '`id_categoryArticle` = :idcategoryArticle '
                . 'WHERE `1402f_article`.`id`= :id';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':title', $this->title, PDO::PARAM_STR);
        $queryResult->bindValue(':dateEvent', $this->dateEvent, PDO::PARAM_STR);
        $queryResult->bindValue(':articleDescription', $this->articleDescription, PDO::PARAM_STR);
        $queryResult->bindValue(':video', $this->video, PDO::PARAM_STR);
        $queryResult->bindValue(':linkExternalSite', $this->linkExternalSite, PDO::PARAM_STR);
        $queryResult->bindValue(':nameLinkExternal', $this->nameLinkExternal, PDO::PARAM_STR);
        $queryResult->bindValue(':idcategoryArticle', $this->idcategoryArticle, PDO::PARAM_INT);
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryResult->execute();
    }
     public function countArticle() {
        $query = 'SELECT CEIL(COUNT(`id`)/3) AS `nbrArticle` FROM `1402f_article` ';
        $queryResult = $this->pdo->db->query($query);
        return $queryResult->fetch(PDO::FETCH_OBJ);
    }
    public function deleteAricle() {
        $result = $this->pdo->db->prepare('DELETE FROM `1402f_article` WHERE `id`= :id');
        $result->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $result->execute();
    }
}
