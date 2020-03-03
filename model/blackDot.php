<?php

/**
 * Description of blackDot
 * création lecture modification supression des point noirs 
 * 
 * @author gaeta
 */
class blackDot {

    public $pdo;
    public $title = '';
    public $idExtraUrban = 0;
    public $idCategoryDanger = 0;
    public $idUser = 0;
    public $idUrban = 0;
    public $idDangerPosition = 0;
    public $idTreatment = 0;
    public $gpsCoordinates = '';
    public $id = 0;
    public $nbrBlackDoturban = 0;
    public $nbrBlackDotExtraUrban = 0;

    public function __construct() {
//fonction de connexion a ma base de donnéer 
        //ordi formation
        $this->pdo = dataBase::getIntance();


        // Sinon on affiche un message d'erreur
        //il les faut pour faire les transaction (3 prochaine methode)
    }

    public function lastInsertId() {
        return $this->pdo->db->lastInsertId();
    }

    //je recuperre le dernier ID inserrer
//ajout d'un point noir 
    public function addBlackDot() {


        $query = 'INSERT INTO `1402f_blackdot` (`title`, `registerDate`, `gpsCoordinates`, `id_1402f_extraUrban`, `id_1402f_categoryDanger`, `id_1402f_user`, '
                . '`id_1402f_urban`, `id_1402f_dangerPosition`) VALUES (:title, CURDATE(), :gpsCoordinates, :idExtraUrban, :idCategoryDanger,  :idUser, :idUrban,  :idDangerPosition)';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':title', $this->title, PDO::PARAM_STR);
        $queryResult->bindValue(':gpsCoordinates', $this->gpsCoordinates, PDO::PARAM_STR);
        $queryResult->bindValue(':idExtraUrban', $this->idExtraUrban, PDO::PARAM_INT);
        $queryResult->bindValue(':idCategoryDanger', $this->idCategoryDanger, PDO::PARAM_INT);
        $queryResult->bindValue(':idUser', $this->idUser, PDO::PARAM_INT);
        $queryResult->bindValue(':idUrban', $this->idUrban, PDO::PARAM_INT);
        $queryResult->bindValue(':idDangerPosition', $this->idDangerPosition, PDO::PARAM_INT);
        return $queryResult->execute();
    }

    public function listeBlackdotUrban($start = 0) {
        $query = 'SELECT `1402f_blackdot`.`id` AS `idBdUrban`, '
                . '`1402f_blackdot`.`title`, '
                . 'DATE_FORMAT(`1402f_blackdot`. `registerDate`,\'%d/%m/%Y\') '
                . 'AS `datedenregistrement`, '
                . '`1402f_blackdot`.`id_1402f_urban`, '
                . '`1402f_blackdot`.`gpsCoordinates`, '
                . '`1402f_blackdot`.`id_1402f_user`, '
                . '`1402f_blackdot`.`id_1402f_dangerPosition`, '
                . '`1402f_blackdot`.`id_1402f_categoryDanger`, '
                . '`1402f_blackdot`.`id_1402f_treatment`, '
                . '`1402f_urban`.`streetNumber`, '
                . '`1402f_urban`.`nameStreet`, '
                . '`1402f_urban`.`zipCode`, '
                . '`1402f_urban`.`city`, '
                . '`1402f_urban`.`id_1402f_Street`, '
                . '`1402f_street`.`typeStreet`, '
                . '`1402f_user`.`pseudo`, '
                . '`1402f_user`.`email`, '
                . '`1402f_dangerposition`.`typeDangerPosition`, '
                . '`1402f_categorydanger`.`typeCategoryDanger`, '
                . '`1402f_treatment`.`status`, '
                . '`1402f_treatment`.`id` AS `idStatus`, '
                . '`1402f_picture`.`id_1402f_blackdot`, '
                . '`1402f_other`.`otherText`, '
                . '`1402f_other`.`id_1402f_blackdot` AS `idBlackDotOther`, '
                . '`1402f_other`.`id_1402f_otherTypes`, '
                . '`1402f_picture`.`PictureName` '
                . 'FROM `1402f_blackdot` '
                . 'LEFT JOIN `1402f_user` '
                . 'ON `1402f_user`.`id`=`1402f_blackdot`.`id_1402f_user` '
                . 'LEFT JOIN `1402f_dangerposition` '
                . 'ON `1402f_dangerposition`.`id`=`1402f_blackdot`.`id_1402f_dangerPosition` '
                . 'LEFT JOIN `1402f_categorydanger` '
                . 'ON `1402f_categorydanger`.`id`=`1402f_blackdot`.`id_1402f_categoryDanger` '
                . 'LEFT JOIN `1402f_urban` '
                . 'ON `1402f_urban`.`id`=`1402f_blackdot`.`id_1402f_urban` '
                . 'LEFT JOIN `1402f_street` '
                . 'ON `1402f_street`.`id`=`1402f_urban`.`id_1402f_Street` '
                . 'LEFT JOIN `1402f_treatment` '
                . 'ON `1402f_treatment`.`id`=`1402f_blackdot`.`id_1402f_treatment` '
                . 'LEFT JOIN `1402f_picture` '
                . 'ON `1402f_blackdot`.`id`=`1402f_picture`.`id_1402f_blackdot` '
                . 'LEFT JOIN `1402f_other`'
                . 'ON `1402f_blackdot`.`id`=`1402f_other`.`id_1402f_blackdot` '
                . 'WHERE `id_1402f_treatment`!=16 '
                . ' order by `id_1402f_urban` DESC '
                . 'LIMIT :start, 3';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':start', $start, PDO::PARAM_INT);
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }

    public function countBlackDotUrban() {
        $query = 'SELECT CEIL(COUNT(`1402f_blackdot`.`id`)/3) AS `nbrBlackDoturban` FROM `1402f_blackdot`';
        $queryResult = $this->pdo->db->query($query);
        return $queryResult->fetch(PDO::FETCH_OBJ);
    }

    public function listeBlackdotExtraUrban($start = 0) {
        $query = 'SELECT (`1402f_blackdot`.`id`) AS `idExtra`, '
                . '`1402f_blackdot`.`title`, '
                . 'DATE_FORMAT(`1402f_blackdot`. `registerDate`,\'%d/%m/%Y\') AS `datedenregistrement`, '
                . '`1402f_blackdot`.`gpsCoordinates`, '
                . '`1402f_blackdot`.`id_1402f_extraUrban`, '
                . '`1402f_blackdot`.`id_1402f_urban`, '
                . '`1402f_blackdot`.`id_1402f_user`, '
                . '`1402f_blackdot`.`id_1402f_dangerPosition`, '
                . '`1402f_blackdot`.`id_1402f_treatment`, '
                . '`1402f_roadextraurban`.`typeRoadExtraUrban`, '
                . '`1402f_extraurban`.`roatNumber`, '
                . '`1402f_extraurban`.`directionOf`, '
                . '`1402f_extraurban`.`comingFrom`, '
                . '`1402f_extraurban`.`mileagePoint`, '
                . '`1402f_user`.`pseudo`, '
                . '`1402f_user`.`email`, '
                . '`1402f_dangerposition`.`typeDangerPosition`, '
                . '`1402f_treatment`.`status`, '
                . '`1402f_treatment`.`id` AS `idStatus`, '
                . '`1402f_picture`.`PictureName`, '
                . '`1402f_picture`.`id_1402f_blackdot`,'
                . '`1402f_other`.`otherText`, '
                . '(`1402f_other`.`id_1402f_blackdot`) AS `idBlackDotOther`, '
                . '`1402f_other`.`id_1402f_otherTypes`, '
                . '`1402f_categorydanger`.`typeCategoryDanger` '
                . 'FROM `1402f_blackdot` '
                . 'LEFT JOIN `1402f_categorydanger` '
                . 'ON `1402f_categorydanger`.`id`= `1402f_blackdot`.`id_1402f_categoryDanger` '
                . 'LEFT JOIN `1402f_extraurban` '
                . 'ON `1402f_extraurban`.`id`=`1402f_blackdot`.`id_1402f_extraUrban` '
                . 'LEFT JOIN `1402f_roadextraurban` '
                . 'ON `1402f_roadextraurban`.`id`=`1402f_extraurban`.`id_1402f_roadExtraUrban` '
                . 'LEFT JOIN `1402f_user` '
                . 'ON `1402f_user`.`id`=`1402f_blackdot`.`id_1402f_user` '
                . 'LEFT JOIN `1402f_dangerposition` '
                . 'ON `1402f_dangerposition`.`id`=`1402f_blackdot`.`id_1402f_dangerPosition` '
                . 'LEFT JOIN `1402f_treatment` '
                . 'ON `1402f_treatment`.`id`=`1402f_blackdot`.`id_1402f_treatment` '
                . 'LEFT JOIN `1402f_picture` '
                . 'ON `1402f_blackdot`.`id`=`1402f_picture`.`id_1402f_blackdot` '
                . 'LEFT JOIN `1402f_other`'
                . 'ON `1402f_blackdot`.`id`= `1402f_other`.`id_1402f_blackdot` '
                . 'WHERE `id_1402f_treatment`!=16 '
                . 'order by `id_1402f_extraUrban` DESC '
                . 'LIMIT :start, 3';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':start', $start, PDO::PARAM_INT);
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }

    public function countBlackDotExtraUrban() {
        $query = 'SELECT CEIL(COUNT(`id_1402f_extraUrban`)/3) AS `nbrBlackDotExtraUrban` FROM `1402f_blackdot` WHERE `id_1402f_extraUrban` ';
        $queryResult = $this->pdo->db->query($query);
        return $queryResult->fetch(PDO::FETCH_OBJ);
    }

    public function listerBlackDotBytitle() {
        $query = 'SELECT `1402f_blackdot`.`id`, '
                . '`1402f_blackdot`.`title`, '
                . '`1402f_treatment`.`status` '
                . 'FROM `1402f_blackdot`'
                . 'LEFT JOIN `1402f_treatment` '
                . 'ON `1402f_treatment`.`id`=`1402f_blackdot`.`id_1402f_treatment` '
                . 'WHERE `1402f_blackdot`.`id`';
        $req = $this->pdo->db->query($query);
        $result = $req->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function modifyStatusBlackDot() {
        $query = 'UPDATE `1402f_blackdot` '
                . 'SET `id_1402f_treatment` = :idTreatment '
                . 'WHERE `1402f_blackdot`.`id`=:id ';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':idTreatment', $this->idTreatment, PDO::PARAM_INT);
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryResult->execute();
    }

//modification d'un point noir urban
    public function modifyBlackDot() {
        $query = 'UPDATE `1402f_blackdot` '
                . 'SET `title` = :title '
                . 'WHERE `1402f_blackdot`.`id`=:id ';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':title', $this->title, PDO::PARAM_STR);
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryResult->execute();
    }
public function listeBlackdotExtraUrbanArchive($start = 0) {
        $query = 'SELECT (`1402f_blackdot`.`id`) AS `idExtra`, '
                . '`1402f_blackdot`.`title`, '
                . 'DATE_FORMAT(`1402f_blackdot`. `registerDate`,\'%d/%m/%Y\') AS `datedenregistrement`, '
                . '`1402f_blackdot`.`gpsCoordinates`, '
                . '`1402f_blackdot`.`id_1402f_extraUrban`, '
                . '`1402f_blackdot`.`id_1402f_urban`, '
                . '`1402f_blackdot`.`id_1402f_user`, '
                . '`1402f_blackdot`.`id_1402f_dangerPosition`, '
                . '`1402f_blackdot`.`id_1402f_treatment`, '
                . '`1402f_roadextraurban`.`typeRoadExtraUrban`, '
                . '`1402f_extraurban`.`roatNumber`, '
                . '`1402f_extraurban`.`directionOf`, '
                . '`1402f_extraurban`.`comingFrom`, '
                . '`1402f_extraurban`.`mileagePoint`, '
                . '`1402f_user`.`pseudo`, '
                . '`1402f_user`.`email`, '
                . '`1402f_dangerposition`.`typeDangerPosition`, '
                . '`1402f_treatment`.`status`, '
                . '`1402f_treatment`.`id` AS `idStatus`, '
                . '`1402f_picture`.`PictureName`, '
                . '`1402f_picture`.`id_1402f_blackdot`,'
                . '`1402f_other`.`otherText`, '
                . '(`1402f_other`.`id_1402f_blackdot`) AS `idBlackDotOther`, '
                . '`1402f_other`.`id_1402f_otherTypes`, '
                . '`1402f_categorydanger`.`typeCategoryDanger` '
                . 'FROM `1402f_blackdot` '
                . 'LEFT JOIN `1402f_categorydanger` '
                . 'ON `1402f_categorydanger`.`id`= `1402f_blackdot`.`id_1402f_categoryDanger` '
                . 'LEFT JOIN `1402f_extraurban` '
                . 'ON `1402f_extraurban`.`id`=`1402f_blackdot`.`id_1402f_extraUrban` '
                . 'LEFT JOIN `1402f_roadextraurban` '
                . 'ON `1402f_roadextraurban`.`id`=`1402f_extraurban`.`id_1402f_roadExtraUrban` '
                . 'LEFT JOIN `1402f_user` '
                . 'ON `1402f_user`.`id`=`1402f_blackdot`.`id_1402f_user` '
                . 'LEFT JOIN `1402f_dangerposition` '
                . 'ON `1402f_dangerposition`.`id`=`1402f_blackdot`.`id_1402f_dangerPosition` '
                . 'LEFT JOIN `1402f_treatment` '
                . 'ON `1402f_treatment`.`id`=`1402f_blackdot`.`id_1402f_treatment` '
                . 'LEFT JOIN `1402f_picture` '
                . 'ON `1402f_blackdot`.`id`=`1402f_picture`.`id_1402f_blackdot` '
                . 'LEFT JOIN `1402f_other`'
                . 'ON `1402f_blackdot`.`id`= `1402f_other`.`id_1402f_blackdot` '
//                . 'WHERE `id_1402f_treatment`==16 '
                . 'order by `id_1402f_extraUrban` DESC '
//                . 'LIMIT :start, 3'
                ;
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':start', $start, PDO::PARAM_INT);
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }
       public function listeBlackdotUrbanArchive($start = 0) {
        $query = 'SELECT `1402f_blackdot`.`id` AS `idBdUrban`, '
                . '`1402f_blackdot`.`title`, '
                . 'DATE_FORMAT(`1402f_blackdot`. `registerDate`,\'%d/%m/%Y\') '
                . 'AS `datedenregistrement`, '
                . '`1402f_blackdot`.`id_1402f_urban`, '
                . '`1402f_blackdot`.`gpsCoordinates`, '
                . '`1402f_blackdot`.`id_1402f_user`, '
                . '`1402f_blackdot`.`id_1402f_dangerPosition`, '
                . '`1402f_blackdot`.`id_1402f_categoryDanger`, '
                . '`1402f_blackdot`.`id_1402f_treatment`, '
                . '`1402f_urban`.`streetNumber`, '
                . '`1402f_urban`.`nameStreet`, '
                . '`1402f_urban`.`zipCode`, '
                . '`1402f_urban`.`city`, '
                . '`1402f_urban`.`id_1402f_Street`, '
                . '`1402f_street`.`typeStreet`, '
                . '`1402f_user`.`pseudo`, '
                . '`1402f_user`.`email`, '
                . '`1402f_dangerposition`.`typeDangerPosition`, '
                . '`1402f_categorydanger`.`typeCategoryDanger`, '
                . '`1402f_treatment`.`status`, '
                . '`1402f_treatment`.`id` AS `idStatus`, '
                . '`1402f_picture`.`id_1402f_blackdot`, '
                . '`1402f_other`.`otherText`, '
                . '`1402f_other`.`id_1402f_blackdot` AS `idBlackDotOther`, '
                . '`1402f_other`.`id_1402f_otherTypes`, '
                . '`1402f_picture`.`PictureName` '
                . 'FROM `1402f_blackdot` '
                . 'LEFT JOIN `1402f_user` '
                . 'ON `1402f_user`.`id`=`1402f_blackdot`.`id_1402f_user` '
                . 'LEFT JOIN `1402f_dangerposition` '
                . 'ON `1402f_dangerposition`.`id`=`1402f_blackdot`.`id_1402f_dangerPosition` '
                . 'LEFT JOIN `1402f_categorydanger` '
                . 'ON `1402f_categorydanger`.`id`=`1402f_blackdot`.`id_1402f_categoryDanger` '
                . 'LEFT JOIN `1402f_urban` '
                . 'ON `1402f_urban`.`id`=`1402f_blackdot`.`id_1402f_urban` '
                . 'LEFT JOIN `1402f_street` '
                . 'ON `1402f_street`.`id`=`1402f_urban`.`id_1402f_Street` '
                . 'LEFT JOIN `1402f_treatment` '
                . 'ON `1402f_treatment`.`id`=`1402f_blackdot`.`id_1402f_treatment` '
                . 'LEFT JOIN `1402f_picture` '
                . 'ON `1402f_blackdot`.`id`=`1402f_picture`.`id_1402f_blackdot` '
                . 'LEFT JOIN `1402f_other`'
                . 'ON `1402f_blackdot`.`id`=`1402f_other`.`id_1402f_blackdot` '
//                . 'WHERE `id_1402f_treatment` ==16 '
                . ' order by `id_1402f_urban` DESC '
//                . 'LIMIT :start, 3 '
                ;
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':start', $start, PDO::PARAM_INT);
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }
}
