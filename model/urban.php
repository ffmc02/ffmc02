<?php

//class des positions Urbain des points noir 
/**
 * Description of urban
 *
 * @author gaeta
 */
class urban {

    public $pdo;
    public $streetNumber = '';
    public $nameStreet = '';
    public $zipCode = 00000;
    public $city = '';
    public $idStreet = 0;

    public function __construct() {
//fonction de connexion a ma base de donnéer 
        //ordi formation
        $this->pdo = dataBase::getIntance();


        // Sinon on affiche un message d'erreur
        //il les faut pour faire les transaction (3 prochaine methode)
    }

    //methode d'une localistion en ville
    public function addUrban() {
        $query = 'INSERT INTO `1402f_urban` '
                . '(`streetNumber`, '
                . ' `nameStreet`, '
                . ' `zipCode`, '
                . ' `city`, '
                . ' `id_1402f_Street`) '
                . ' VALUES '
                . ' (:streetNumber, '
                . ' :nameStreet, '
                . ' :zipCode, '
                . ' :city, '
                . ' :idStreet)';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':streetNumber', $this->streetNumber, PDO::PARAM_STR);
        $queryResult->bindValue(':nameStreet', $this->nameStreet, PDO::PARAM_STR);
        $queryResult->bindValue(':zipCode', $this->zipCode, PDO::PARAM_STR);
        $queryResult->bindValue(':city', $this->city, PDO::PARAM_STR);
        $queryResult->bindValue(':idStreet', $this->idStreet, PDO::PARAM_INT);
        return $queryResult->execute();
//        return $this->pdo->db->lastInsertId();
    }

    public function lastInsertId() {
        return $this->pdo->db->lastInsertId();
    }
}
