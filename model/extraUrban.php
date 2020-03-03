<?php

/**
 * Description of extraUrban
 *
 * @author gaeta
 */
class extraUrban {

    public $pdo;
    public $roatNumber = '';
    public $directionOf = '';
    public $comingFrom = '';
    public $mileagePoint=0;
    public $idroadExtraUrban = 0;

    public function __construct() {
//fonction de connexion a ma base de donnéer 
        //ordi formation
        $this->pdo = dataBase::getIntance();


        // Sinon on affiche un message d'erreur
        //il les faut pour faire les transaction (3 prochaine methode)
    }

    //ajout de la localisation du point noir hors agglomération
    public function addExtraUrban() {
        $query = 'INSERT INTO `1402f_extraurban` '
                . '(`roatNumber`, '
                . '`directionOf`, '
                . '`comingFrom`, '
                . '`mileagePoint`, '
                . '`id_1402f_roadExtraUrban`)'
                . 'VALUES '
                . '(:roatNumber, '
                . ':directionOf, '
                . ':comingFrom, '
                . ':mileagePoint, '
                . ':idroadExtraUrban)';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':roatNumber', $this->roatNumber, PDO::PARAM_STR);
        $queryResult->bindValue(':directionOf', $this->directionOf, PDO::PARAM_STR);
        $queryResult->bindValue(':comingFrom', $this->comingFrom, PDO::PARAM_STR);
        $queryResult->bindValue(':mileagePoint', $this->mileagePoint, PDO::PARAM_INT);
        $queryResult->bindValue(':idroadExtraUrban', $this->idroadExtraUrban, PDO::PARAM_INT);
        return $queryResult->execute();
//        return $this->pdo->db->lastInsertId();
        
    }

    public function lastInsertId() {
        return $this->pdo->db->lastInsertId();
    }
}
