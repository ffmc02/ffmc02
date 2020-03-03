<?php
/**
 * Description of partner
 *
 * @author gaeta
 */
class partner {
    public $pdo;
    public $picture='';
    public $namePartner='';
    public $linkExternalSite='';
    public $nameLink='';
    public $endOfPartnership='';
    public $id=0;
    
    public function __construct() {
        $this->pdo = dataBase::getIntance();
    }
    public function addPartner() {
        $query='INSERT INTO `1402f_partner` ('
                . '`picture`, '
                . ' `namePartner`, '
                . '`linkExternalSite`, '
                . '`nameLink`, '
                . '`EndOfPartnership`) '
                . 'VALUE(:picture, '
                . ':namePartner, '
                . ':linkExternalSite, '
                . ':nameLink, '
                . ':endOfPartnership)';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':picture', $this->picture, PDO::PARAM_STR);
        $queryResult->bindValue(':namePartner', $this->namePartner, PDO::PARAM_STR);
        $queryResult->bindValue(':linkExternalSite', $this->linkExternalSite, PDO::PARAM_STR);
        $queryResult->bindValue(':nameLink', $this->nameLink, PDO::PARAM_STR);
        $queryResult->bindValue(':endOfPartnership', $this->endOfPartnership, PDO::PARAM_STR);
        return $queryResult->execute();
    }
    public function getPartner(){
         $query ='SELECT `id`, `picture`, `namePartner`, `linkExternalSite`, `nameLink` FROM `1402f_partner` '
                 . 'WHERE `EndOfPartnership`>=now()';
         $req = $this->pdo->db->query($query);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }
    public function modifyPartners(){
        $query='UDAPTE `1402f_partner` '
                . 'SET `picture` = :picture, '
                . '`namePartner` = :namePartner, '
                . '`linkExternalSite` = :linkExternalSite, '
                . '`nameLink` = :nameLink '
                . 'WHERE `1402f_partner`.`id` = :id ';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':picture', $this->picture, PDO::PARAM_STR);
        $queryResult->bindValue(':namePartner', $this->namePartner, PDO::PARAM_STR);
        $queryResult->bindValue(':linkExternalSite', $this->linkExternalSite, PDO::PARAM_STR);
        $queryResult->bindValue(':nameLink', $this->nameLink, PDO::PARAM_STR);
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryResult->execute();
    }
       public function deletePartner() {
        $result = $this->pdo->db->prepare('DELETE FROM `1402f_partner` WHERE `id`= :id');
        $result->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $result->execute();
    }
}
