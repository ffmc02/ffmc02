<?php

/**
 * Description of inThePress
 *
 * @author gaeta
 */
class inThePress {

    public $pdo;
    public $Evenents = '';
    public $eventDate;
    public $nameExternalSite = '';
    public $externalSiteLinks = '';
    public $nameOfTheMedia = '';
    public $nameExternalSite1 = '';
    public $externalSiteLinks1 = '';
    public $nameOfTheMedia1 = '';
    public $nameExternalSite2 = '';
    public $externalSiteLinks2 = '';
    public $nameOfTheMedia2 = '';
    public $nameExternalSite3 = '';
    public $externalSiteLinks3 = '';
    public $nameOfTheMedia3 = '';
    public $nameExternalSite4 = '';
    public $externalSiteLinks4 = '';
    public $nameOfTheMedia4 = '';
    public $nameExternalSite5 = '';
    public $externalSiteLinks5 = '';
    public $nameOfTheMedia5 = '';
    public $titleEvents='';
    
    public function __construct() {
//fonction de connexion a ma base de donnéer 

        $this->pdo = dataBase::getIntance();
    }

    public function addPressArticle() {
        $query = 'INSERT INTO `1402f_inThePress` ( `titleEvents`, `Evenents`, `eventDate`, `nameExternalSite`, `externalSiteLinks`, `nameOfTheMedia`, `nameExternalSite1`, '
                . '`externalSiteLinks1`, `nameOfTheMedia1`, `nameExternalSite2`, `externalSiteLinks2`, `nameOfTheMedia2`, `nameExternalSite3`, `externalSiteLinks3`, '
                . '`nameOfTheMedia3`, `nameExternalSite4`, `externalSiteLinks4`, `nameOfTheMedia4`, `nameExternalSite5`, `externalSiteLinks5`, `nameOfTheMedia5`)'
                . ' VALUES '
                . '( :titleEvents, :Evenents, :eventDate, :nameExternalSite, :externalSiteLinks, :nameOfTheMedia, :nameExternalSite1, '
                . ':externalSiteLinks1, :nameOfTheMedia1, :nameExternalSite2, :externalSiteLinks2, :nameOfTheMedia2, :nameExternalSite3, :externalSiteLinks3, '
                . ':nameOfTheMedia3, :nameExternalSite4, :externalSiteLinks4, :nameOfTheMedia4, :nameExternalSite5, :externalSiteLinks5, :nameOfTheMedia5)';
        $queryResult = $this->pdo->db->prepare($query);
         $queryResult->bindValue(':titleEvents', $this->titleEvents, PDO::PARAM_STR);
        $queryResult->bindValue(':Evenents', $this->Evenents, PDO::PARAM_STR);
        $queryResult->bindValue(':eventDate', $this->eventDate, PDO::PARAM_STR);
        $queryResult->bindValue(':nameExternalSite', $this->nameExternalSite, PDO::PARAM_STR);
        $queryResult->bindValue(':externalSiteLinks', $this->externalSiteLinks, PDO::PARAM_STR);
        $queryResult->bindValue(':nameOfTheMedia', $this->nameOfTheMedia, PDO::PARAM_STR);
        $queryResult->bindValue(':nameExternalSite1', $this->nameExternalSite1, PDO::PARAM_STR);
        $queryResult->bindValue(':externalSiteLinks1', $this->externalSiteLinks1, PDO::PARAM_STR);
        $queryResult->bindValue(':nameOfTheMedia1', $this->nameOfTheMedia1, PDO::PARAM_STR);
        $queryResult->bindValue(':nameExternalSite2', $this->nameExternalSite2, PDO::PARAM_STR);
        $queryResult->bindValue(':externalSiteLinks2', $this->externalSiteLinks2, PDO::PARAM_STR);
        $queryResult->bindValue(':nameOfTheMedia2', $this->nameOfTheMedia2, PDO::PARAM_STR);
        $queryResult->bindValue(':nameExternalSite3', $this->nameExternalSite3, PDO::PARAM_STR);
        $queryResult->bindValue(':externalSiteLinks3', $this->externalSiteLinks3, PDO::PARAM_STR);
        $queryResult->bindValue(':nameOfTheMedia3', $this->nameOfTheMedia3, PDO::PARAM_STR);
        $queryResult->bindValue(':nameExternalSite4', $this->nameExternalSite4, PDO::PARAM_STR);
        $queryResult->bindValue(':externalSiteLinks4', $this->externalSiteLinks4, PDO::PARAM_STR);
        $queryResult->bindValue(':nameOfTheMedia4', $this->nameOfTheMedia4, PDO::PARAM_STR);
        $queryResult->bindValue(':nameExternalSite5', $this->nameExternalSite5, PDO::PARAM_STR);
        $queryResult->bindValue(':externalSiteLinks5', $this->externalSiteLinks5, PDO::PARAM_STR);
        $queryResult->bindValue(':nameOfTheMedia5', $this->nameOfTheMedia5, PDO::PARAM_STR);
        return $queryResult->execute();
    }

    public function getPressArticle($start=0) {
        $query='SELECT `id`,'
                . '`titleEvents`, `Evenents`, '
                . 'DATE_FORMAT(`eventDate`, \'%d/%m/%Y\')AS `eventDate`, '
                . '`nameExternalSite`, `externalSiteLinks`, `nameOfTheMedia`, `nameExternalSite1`, '
                . '`externalSiteLinks1`, `nameOfTheMedia1`, `nameExternalSite2`, `externalSiteLinks2`, `nameOfTheMedia2`, `nameExternalSite3`, `externalSiteLinks3`, '
                . '`nameOfTheMedia3`, `nameExternalSite4`, `externalSiteLinks4`, `nameOfTheMedia4`, `nameExternalSite5`, `externalSiteLinks5`, `nameOfTheMedia5` '
                . 'FROM `1402f_inThePress`'
                . 'order by eventDate  DESC '
                . 'LIMIT :start, 2';
         $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':start', $start, PDO::PARAM_INT);
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
        
    }
 public function countPressArticle() {
        $query = 'SELECT CEIL(COUNT(`id`)/2) AS `nbrPressArticle` FROM `1402f_inThePress` ';
        $queryResult = $this->pdo->db->query($query);
        return $queryResult->fetch(PDO::FETCH_OBJ);
    }
}
