<?php

/**
 * Description of other
 *
 * @author gaeta
 */
class other {

    public $id = 0;
    public $idBlackDot = 0;
    public $idOtherTypes = 0;
    public $other = '';

    public function __construct() {
//fonction de connexion a ma base de donnéer 
        //ordi formation
        $this->pdo = dataBase::getIntance();
        // Sinon on affiche un message d'erreur
        //il les faut pour faire les transaction (3 prochaine methode)
    }

    public function addOther() {
        $query = 'INSERT INTO `1402f_other` (`otherText`, `id_1402f_blackdot`, `id_1402f_otherTypes`) VALUES (:other, :idBlackDot, :idOtherTypes)';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':other', $this->other, PDO::PARAM_STR);
        $queryResult->bindValue(':idBlackDot', $this->idBlackDot, PDO::PARAM_INT);
        $queryResult->bindValue(':idOtherTypes', $this->idOtherTypes, PDO::PARAM_INT);
        return  $queryResult->execute();
    }

}
